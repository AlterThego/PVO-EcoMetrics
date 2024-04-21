<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fish_production_areas', function (Blueprint $table) {
            $table->unique(['fish_production_id', 'barangay_id', 'year'], 'land_area');

            $table->id();

            $table->unsignedBigInteger('fish_production_id');
            $table->foreign('fish_production_id')->references('id')->on('fish_productions')->onUpdate('cascade');

            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade');

            $table->unsignedBigInteger('barangay_id');
            $table->foreign('barangay_id')->references('id')->on('barangays')->onUpdate('cascade');

            $table->integer('year');
            $table->decimal('land_area', 10, 2);
            // Add other columns as needed
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish_production_areas');
    }
};
