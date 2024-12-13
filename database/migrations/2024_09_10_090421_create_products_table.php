<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Product name
            $table->text('description'); // Product description
            $table->string('brandname'); // Brand name
            $table->string('ytlink')->nullable(); // YouTube link
            $table->json('photos')->nullable(); // Product photos as JSON array
            $table->decimal('price', 10, 2); // Price
            $table->text('review')->nullable(); // Product review
            $table->string('category');// Product category
             $table->json('colors')->change();
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
