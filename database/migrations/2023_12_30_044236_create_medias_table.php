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
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('original_name');
            $table->string('mime_type')->nullable();
            $table->string('path');
            $table->string('collection')->nullable();
            $table->string('disk')->nullable();
            $table->enum('type', ['COMPANY_DOCUMENT', 'LOGO', 'SUPPLIER_BILL', 'OTHER'])->default('OTHER');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('receiving_management_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiving_management_id')->references('id')->on('receiving_management')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};