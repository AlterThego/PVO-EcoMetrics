<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('farm_supplies', function (Blueprint $table) {
            $table->unique(['barangay_id', 'establishment_name']);

            $table->id();

            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade');

            $table->unsignedBigInteger('barangay_id');
            $table->foreign('barangay_id')->references('id')->on('barangays')->onUpdate('cascade');

            $table->string('establishment_name', 20);
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
        Schema::dropIfExists('farm_supplies');
    }
};
