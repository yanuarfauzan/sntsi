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
        Schema::create('total', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->integer('value_rail')->nullable();
            $table->integer('value_river')->nullable();
            $table->integer('value_sutet')->nullable();
            $table->integer('value_bridge')->nullable();
            $table->integer('value_latrine')->nullable();
            $table->integer('value_septic_tank')->nullable();
            $table->integer('value_ipal')->nullable();
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total');
    }
};
