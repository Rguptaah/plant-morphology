<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Habitat;
use App\Models\Leaf;
use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = Plant::where('status', 'approved')->paginate(10);
        return view('plants.index', compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $habitats = Habitat::all();
        $leaves = Leaf::all();
        $flowers = Flower::all();
        return view('plants.create', compact('habitats', 'leaves', 'flowers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plant_name' => 'required|unique:plants|max:255',
        ]);

        $plant = Plant::create([
            'plant_name' => $request->plant_name,
            'created_by' => Auth::id(),
            'status' => 'pending',
        ]);

        if ($request->has('habitats')) {
            $plant->habitats()->attach($request->habitats);
        }

        if ($request->has('leaves')) {
            $plant->leaves()->attach($request->leaves);
        }

        if ($request->has('flowers')) {
            $plant->flowers()->attach($request->flowers);
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant submitted for approval successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Plant $plant)
    // {
    //     return view('plants.show', compact('plant'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant)
    {
        $habitats = Habitat::all();
        $leaves = Leaf::all();
        $flowers = Flower::all();
        return view('plants.edit', compact('plant', 'habitats', 'leaves', 'flowers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        $request->validate([
            'plant_name' => 'required|max:255|unique:plants,plant_name,' . $plant->id,
        ]);

        $plant->update([
            'plant_name' => $request->plant_name,
            'status' => 'pending',
            'approved_by' => null,
            'rejection_reason' => null,
        ]);

        if ($request->has('habitats')) {
            $plant->habitats()->sync($request->habitats);
        }

        if ($request->has('leaves')) {
            $plant->leaves()->sync($request->leaves);
        }

        if ($request->has('flowers')) {
            $plant->flowers()->sync($request->flowers);
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant updated and submitted for approval successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        $plant->delete();
        return redirect()->route('plants.index')
            ->with('success', 'Plant deleted successfully.');
    }

    /**
     * Display a listing of pending plants.
     */
    public function pending()
    {
        $plants = Plant::where('status', 'pending')->paginate(10);
        return view('plants.pending', compact('plants'));
    }

    /**
     * Approve a plant submission.
     */
    public function approve(Plant $plant)
    {
        $plant->update([
            'status' => 'approved',
            'approved_by' => Auth::id(),
            'rejection_reason' => null,
        ]);

        return redirect()->route('plants.pending')
            ->with('success', 'Plant approved successfully.');
    }

    /**
     * Reject a plant submission.
     */
    public function reject(Request $request, Plant $plant)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:255',
        ]);

        $plant->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        return redirect()->route('plants.pending')
            ->with('success', 'Plant rejected successfully.');
    }


    /**
     * Display plant details for frontend.
     */

    // public function details(Plant $plant)
    // {
    //     if ($plant->status !== 'approved') {
    //         abort(404);
    //     }
    //     return view('plant-detail', compact('plant'));
    // }

    public function show($slug)
    {
        // Normally fetch from DB using $slug
        // Example static detail:
        $plant = [
            'scientific_name' => 'Datura inoxia Mill.',
            'sanskrit_name' => 'Dhattura',
            'synonyms' => 'Datura velutinosa V.R.Fuentes in Revista Jard. Bot. Nac. Univ. Habana 1: 53 (1980 publ. 1981)',
            'etymology_datura' => 'vernacular East Indian name',
            'etymology_inoxia' => 'harmless, not having prickles',
            'family' => 'Solanaceae',
            'genus' => 'Datura',
            'species' => 'Datura inoxia Mill.',
            'image' => 'images/datura_inoxia.jpg'
        ];

        return view('plant-detail', compact('plant'));
    }

    public function details($id)
    {
        $plant = Plant::findOrFail($id);
        return view('plants.more-details', compact('plant'));
    }

}
