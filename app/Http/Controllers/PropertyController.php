<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'address' => 'required',
            'area_m2' => 'required|numeric',
            'volume_m3' => 'required|numeric',
            'bedrooms' => 'required|integer', // Ajoutez cette ligne
            'bathrooms' => 'required|integer', // Ajoutez cette ligne
        ]);

        Property::create($validated);

        return redirect()->route('properties.index')->with('success', 'Bien immobilier créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'address' => 'required',
            'area_m2' => 'required|numeric',
            'volume_m3' => 'required|numeric',
        ]);

        $property->update($validated);

        return redirect()->route('properties.index')->with('success', 'Bien immobilier mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Bien immobilier supprimé avec succès.');
    }
}