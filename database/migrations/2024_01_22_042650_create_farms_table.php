<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->unique(['municipality_id', 'farm_name']);

            $table->id();

            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('level', ['Provincial', 'Municipal']);
            $table->string('farm_name', 50);
            $table->decimal('farm_area', 10, 2);
            $table->enum('farm_sector', ['Government', 'Commercial']);
            $table->enum('farm_type', ['Animal and Fishery Breeding', 'Cattle', 'Poultry', 'Piggery']);
            $table->integer('year_established');
            $table->integer('year_closed')->nullable();
            $table->timestamps();

            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farms');
    }
};
