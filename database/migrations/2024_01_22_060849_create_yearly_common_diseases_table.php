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
        Schema::create('yearly_common_diseases', function (Blueprint $table) {
            $table->unique(['disease_id', 'year'], 'disease_count');

            $table->id();

            $table->unsignedBigInteger('disease_id');
            $table->foreign('disease_id')->references('id')->on('diseases')->onUpdate('cascade');

            $table->integer('year');
            $table->integer('disease_count');
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
        Schema::dropIfExists('yearly_common_diseases');
    }
};
