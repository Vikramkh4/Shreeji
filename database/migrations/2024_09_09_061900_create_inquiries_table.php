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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the user making the inquiry
            $table->string('email'); // Email address of the user
            $table->string('phone'); // Phone number of the user
            $table->text('address'); // Address of the user
            $table->text('message'); // Additional message from the user
            $table->json('products'); // Store products (as JSON, including product name and quantity)
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
