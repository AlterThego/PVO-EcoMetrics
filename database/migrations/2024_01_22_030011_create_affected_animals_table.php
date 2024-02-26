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
        Schema::create('affected_animals', function (Blueprint $table) {

            $table->unique(['municipality_id', 'animal_id', 'year']);

            $table->id();

            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animal')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('year');
            $table->integer('count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affected_animals');
    }
};
