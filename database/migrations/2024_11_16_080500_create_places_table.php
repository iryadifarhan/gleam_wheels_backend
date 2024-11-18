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
        Schema::create('places', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the place
            $table->string('location'); // Location as a string
            $table->decimal('rating', 3, 2)->default(0); // Rating, max 99.99
            $table->json('features')->nullable(); // Array of features as JSON
            $table->string('img_source'); // Path or URL to the image
            $table->integer('pricing')->default(0); // Pricing scale
            $table->integer('queue')->default(0); // Current queue count
            $table->integer('capacity')->default(0); // Maximum capacity
            $table->decimal('range')->default(0); // Maximum capacity
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
