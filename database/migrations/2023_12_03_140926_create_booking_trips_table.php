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
        Schema::create('booking_trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained();
            $table->enum('type_chambre', ['single', 'double', 'triple', 'quadruple']);
            $table->enum('formule', ['petit-dejeuner', 'demi-pension', 'pension-complete']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_trips');
    }
};
