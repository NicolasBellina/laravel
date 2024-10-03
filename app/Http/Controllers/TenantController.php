<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Property;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        return view('tenants.index', compact('tenants'));
    }

    public function create()
    {
        $properties = Property::all(); // Récupère toutes les propriétés pour le formulaire
        return view('tenants.create', compact('properties'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'name' => 'required|max:255',
            'phone' => 'required|max:15',
            'email' => 'required|email|unique:tenants,email',
            'address' => 'required|max:255',
            'bank_account' => 'required|max:255',
        ]);

        Tenant::create($validated);

        return redirect()->route('tenants.index')->with('success', 'Locataire créé avec succès.');
    }

    public function edit(Tenant $tenant)
    {
        $properties = Property::all();
        return view('tenants.edit', compact('tenant', 'properties'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'name' => 'required|max:255',
            'phone' => 'required|max:15',
            'email' => 'required|email|unique:tenants,email,' . $tenant->id,
            'address' => 'required|max:255',
            'bank_account' => 'required|max:255',
        ]);

        $tenant->update($validated);

        return redirect()->route('tenants.index')->with('success', 'Locataire mis à jour avec succès.');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenants.index')->with('success', 'Locataire supprimé avec succès.');
    }
}
