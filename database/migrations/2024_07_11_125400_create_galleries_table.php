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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();// Primary key, auto-incrementing ID
            $table->string('title')->nullable(); // Column for image title (nullable)
            $table->string('category')->nullable(); // Column for storing image category
            $table->text('description')->nullable(); //
            $table->string('image')->nullable(); // Column for storing image file paths
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
