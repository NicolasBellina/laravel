<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('address');
            $table->decimal('area_m2', 10, 2)->nullable(); // Ajout de la colonne pour les m²
            $table->decimal('volume_m3', 10, 2)->nullable(); // Ajout de la colonne pour les m³
            $table->integer('bedrooms')->default(0); // Ajout de la colonne pour le nombre de chambres
            $table->integer('bathrooms')->default(0); // Ajout de la colonne pour le nombre de salles de bain

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
}
