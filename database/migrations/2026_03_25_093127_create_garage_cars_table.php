<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('garage_cars', function (Blueprint $table) {
            $table->id();
            $table->string('make');
            $table->string('year');
            $table->string('owner');
            $table->string('country');
            $table->string('era');
            $table->text('story');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garage_cars');
    }
};
