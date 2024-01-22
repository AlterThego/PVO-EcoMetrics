<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('level', ['provincial', 'municipal']);
            $table->string('farm_name', 50);
            $table->decimal('farm_area', 10, 2);
            $table->enum('farm_sector', ['government', 'commercial']);
            $table->enum('farm_type', ['animal_and_fishery_breeding', 'cattle', 'poultry', 'piggery']);
            $table->integer('year_established');
            $table->integer('year_closed')->nullable();
            $table->timestamps();
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
