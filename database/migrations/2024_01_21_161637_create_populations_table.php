<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('populations', function (Blueprint $table) {
            $table->unique(['municipality_id', 'census_year']);

            $table->id();
            $table->integer('census_year');
            $table->integer('population_count');

            $table->unsignedBigInteger('municipality_id');


            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade');

            $table->timestamps();

            $table->softDeletes(); 
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('populations');
    }
};
