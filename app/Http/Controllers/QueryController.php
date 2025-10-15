<?php

namespace App\Http\Controllers;

use App\Models\Query;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueryController extends Controller
{
    /**
     * Display a listing of the queries.
     */
    public function index()
    {
        // Regular users see only their own queries
        if (!Auth::user()->hasRole('administrator')) {
            $queries = Query::where('user_id', Auth::id())->paginate(10);
        } else {
            // Admins see all queries
            $queries = Query::paginate(10);
        }
        
        return view('queries.index', compact('queries'));
    }

    /**
     * Show the form for creating a new query.
     */
    public function create()
    {
        return view('queries.create');
    }

    /**
     * Store a newly created query in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Query::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->route('queries.index')
            ->with('success', 'Query submitted successfully.');
    }

    /**
     * Display the specified query.
     */
    public function show(Query $query)
    {
        // Check if user is authorized to view this query
        if (!Auth::user()->hasRole('administrator') && $query->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('queries.show', compact('query'));
    }

    /**
     * Show the form for assigning a query.
     */
    public function assign(Query $query)
    {
        // Only admins can assign queries
        if (!Auth::user()->hasRole('administrator')) {
            abort(403, 'Unauthorized action.');
        }
        
        $users = User::whereHas('roles', function($q) {
            $q->whereIn('slug', ['administrator', 'botanist']);
        })->get();
        
        return view('queries.assign', compact('query', 'users'));
    }

    /**
     * Update the query assignment.
     */
    public function updateAssignment(Request $request, Query $query)
    {
        $request->validate([
            'assigned_to' => 'required|exists:users,id',
        ]);

        $query->update([
            'assigned_to' => $request->assigned_to,
            'status' => 'assigned',
        ]);

        return redirect()->route('queries.index')
            ->with('success', 'Query assigned successfully.');
    }

    /**
     * Show the form for resolving a query.
     */
    public function resolve(Query $query)
    {
        // Check if user is authorized to resolve this query
        if (!Auth::user()->hasRole('administrator') && $query->assigned_to !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('queries.resolve', compact('query'));
    }

    /**
     * Update the query resolution.
     */
    public function updateResolution(Request $request, Query $query)
    {
        $request->validate([
            'resolution' => 'required|string',
        ]);

        $query->update([
            'resolution' => $request->resolution,
            'status' => 'resolved',
        ]);

        return redirect()->route('queries.index')
            ->with('success', 'Query resolved successfully.');
    }
}
