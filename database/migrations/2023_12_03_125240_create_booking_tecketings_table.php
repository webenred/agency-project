<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_tecketings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained();
            $table->enum('flight_type', ['aller-retour', 'aller-simple']);
            $table->string('departure_airport');
            $table->string('arrived_airport');
            $table->string('compagnie');
            $table->enum('class', ['Economie', 'Affaires', 'Première']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_tecketings');
    }
};
