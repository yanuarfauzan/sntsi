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
        Schema::create('waters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('neighborhood_id')->constrained('neighborhoods')->onDelete('cascade');

            // Sumber Air Minum										
            $table->smallInteger('bottled_water')->nullable();
            $table->smallInteger('refill_water')->nullable();
            $table->smallInteger('piped_water_supply')->nullable(); //PDAM
            $table->smallInteger('drilled_well')->nullable();
            $table->smallInteger('protected_well')->nullable();
            $table->smallInteger('unprotected_well')->nullable();
            $table->smallInteger('protected_spring')->nullable();
            $table->smallInteger('unprotected_spring')->nullable();
            $table->smallInteger('nature')->nullable(); // Air sungai/Danau/Kolam/ Waduk
            $table->smallInteger('rainwater')->nullable();
            $table->smallInteger('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waters');
    }
};
