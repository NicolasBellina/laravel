<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

// Routes pour le profil utilisateur
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Routes pour les propriétés
Route::resource('properties', PropertyController::class);

// Routes pour les locataires
Route::resource('tenants', TenantController::class);

Route::get('tenants/{tenant}', [TenantController::class, 'show'])->name('tenants.show');

require __DIR__.'/auth.php'; 
