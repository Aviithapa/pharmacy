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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Supplier name
            $table->string('contact_name')->nullable(); // Contact person's name (nullable)
            $table->string('email')->unique(); // Email address (unique)
            $table->string('phone')->nullable(); // Phone number (nullable)
            $table->text('address')->nullable(); // Address (nullable)
            $table->string('pan_number')->nullable(); //
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
