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
        Schema::create('stock_management', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiving_id');
            $table->unsignedBigInteger('medicine_id');
            $table->date('expiry_date');
            $table->date('mfg_date');
            $table->string('cost_price');
            $table->string('selling_price');
            $table->integer('quantity')->default(0);
            $table->integer('addition')->default(0);
            $table->string('price_per_unit')->default(0);
            $table->string('total_price');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('receiving_id')->references('id')->on('receiving_management')->onDelete('cascade');
            $table->foreign('medicine_id')->references('id')->on('medicine')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_management');
    }
};
