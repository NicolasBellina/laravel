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

        try {
            Tenant::create($validated);
            return redirect()->route('tenants.index')->with('success', 'Locataire créé avec succès.');
        } catch (\Exception $e) {
            // Affiche l'erreur réelle
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la création du locataire : ' . $e->getMessage()]);
        }
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

        try {
            $tenant->update($validated);
            return redirect()->route('tenants.index')->with('success', 'Locataire mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la mise à jour du locataire.']);
        }
    }

    public function destroy(Tenant $tenant)
    {
        try {
            $tenant->delete();
            return redirect()->route('tenants.index')->with('success', 'Locataire supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la suppression du locataire.']);
        }
    }

    public function show(Tenant $tenant)
    {
        return view('tenants.show', compact('tenant'));
    }
}