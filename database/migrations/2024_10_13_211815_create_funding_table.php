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
        Schema::create('funding', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('neighborhood_id')->nullable();
            $table->integer('year')->nullable();
            $table->enum('source', ['APBD', 'APBD_prov', 'APBN'])->nullable();
            $table->enum('type', ['rail', 'river', 'sutet', 'bridge', 'latrine', 'septic_tank', 'ipal'])->nullable();
            $table->integer('nominal')->nullable();
            $table->integer('volume')->nullable();
            $table->integer('achieve')->nullable();
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funding');
    }
};
