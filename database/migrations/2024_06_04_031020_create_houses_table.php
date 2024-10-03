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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('neighborhood_id')->constrained('neighborhoods')->onDelete('cascade');
            $table->smallInteger('for_settlement')->nullable();
            $table->smallInteger('vacant_house')->nullable();
            $table->smallInteger('stores')->nullable();

            // A.1 Jenis Kawasan Lokasi Rumah Yang Ditempati							
            $table->smallInteger('rail')->nullable();
            $table->smallInteger('river')->nullable();
            $table->smallInteger('sutet')->nullable();
            $table->smallInteger('bridge')->nullable();

            //rawan bencana
            $table->smallInteger('flood')->nullable();
            $table->smallInteger('tidal_flood')->nullable();
            $table->smallInteger('landslide')->nullable();
            $table->smallInteger('other')->nullable();

            //A.2 Kepemilikan Rumah
            $table->smallInteger('owned')->nullable();
            $table->smallInteger('not_owned')->nullable();
            $table->smallInteger('lease')->nullable();

            $table->decimal('APBD', 15, 2)->nullable();
            $table->decimal('APBD_prov', 15, 2)->nullable();
            $table->decimal('APBN', 15, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }

};