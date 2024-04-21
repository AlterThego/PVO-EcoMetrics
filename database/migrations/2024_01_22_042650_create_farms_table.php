<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->unique(['barangay_id', 'farm_name']);

            $table->id();

            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade');

            $table->unsignedBigInteger('barangay_id');
            $table->foreign('barangay_id')->references('id')->on('barangays')->onUpdate('cascade');

            $table->enum('level', ['Provincial', 'Municipal']);
            $table->string('farm_name', 50);
            $table->decimal('farm_area', 10, 2);
            $table->enum('farm_sector', ['Government', 'Commercial']);
   
            $table->unsignedBigInteger('farm_type_id');
            $table->foreign('farm_type_id')->references('id')->on('farm_type')->onUpdate('cascade');

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
