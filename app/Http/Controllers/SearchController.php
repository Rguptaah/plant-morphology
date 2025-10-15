<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Query;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // This is already handled by the auth middleware in routes
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $results = [];

        if (!$searchTerm) {
            return view('search.results', [
                'searchTerm' => '',
                'plants' => collect(),
                'queries' => collect(),
                'users' => collect(),
            ]);
        }

        // Search plants
        $plants = Plant::where('plant_name', 'like', "%{$searchTerm}%");
        
        // Only show approved plants to regular users
        if (!auth()->user()->hasRole('administrator') && !auth()->user()->hasRole('reviewer')) {
            $plants = $plants->where('status', 'approved');
        }
        
        $plants = $plants->paginate(10, ['*'], 'plants_page');

        // Search queries - only for the user who created them or admins/assigned users
        $queries = Query::where('subject', 'like', "%{$searchTerm}%")
            ->orWhere('description', 'like', "%{$searchTerm}%");
            
        if (!auth()->user()->hasRole('administrator')) {
            $queries = $queries->where(function($query) {
                $query->where('user_id', auth()->id())
                    ->orWhere('assigned_to', auth()->id());
            });
        }
        
        $queries = $queries->paginate(10, ['*'], 'queries_page');

        // Search users - only for administrators
        $users = collect();
        if (auth()->user()->hasRole('administrator')) {
            $users = User::where('name', 'like', "%{$searchTerm}%")
                ->orWhere('email', 'like', "%{$searchTerm}%")
                ->paginate(10, ['*'], 'users_page');
        }

        return view('search.results', [
            'searchTerm' => $searchTerm,
            'plants' => $plants,
            'queries' => $queries,
            'users' => $users,
        ]);
    }
}
