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
        Schema::create('animal_type', function (Blueprint $table) {

            $table->unique(['type']);
            $table->id();

            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animal')->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('type', 20)->nullable();
            
            $table->timestamps();

            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_type');
    }
};
