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
        Schema::create('sanitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('neighborhood_id')->constrained('neighborhoods')->onDelete('cascade');

            $table->smallInteger('latrine')->nullable();
            $table->smallInteger('septic_tank')->nullable();
            $table->smallInteger('ipal')->nullable(); // Instalasi Pengolahan Air Limbah (IPAL)
            
            $table->smallInteger('no_toilet')->nullable();
            $table->smallInteger('no_septic_tank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanitations');
    }
};
