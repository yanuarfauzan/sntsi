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
        Schema::create('neighborhoods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->foreignId('village_id')->constrained('villages')->onDelete('cascade');
            $table->string('housing')->nullable();
            $table->smallInteger('rt')->nullable();
            $table->smallInteger('rw')->nullable();

            //kepala rumah tangga & kk
            $table->smallInteger('krt')->nullable();
            $table->smallInteger('kk')->nullable();

            $table->smallInteger('population')->nullable();
            // pemukiman kumuh
            $table->boolean('is_slum')->default(0);
            $table->smallInteger('number_of_houses')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neighborhoods');
    }
};
