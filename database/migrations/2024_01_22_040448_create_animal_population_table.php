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
        Schema::create('animal_population', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animal')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('animal_type_id');
            $table->foreign('animal_type_id')->references('id')->on('animal_type')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('year');
            $table->integer('animal_population_count');
            $table->decimal('volume', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_population');
    }
};
