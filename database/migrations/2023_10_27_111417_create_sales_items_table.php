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
        Schema::create('sales_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->index();
            $table->unsignedBigInteger('stock_id')->index();
            $table->unsignedBigInteger('sales_id')->index();
            $table->integer('quantity');
            $table->decimal('amount');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('discount_percentage', 5, 2)->default(0);
            $table->integer('return_quantity')->default(0);
            $table->enum('status', ['sold', 'cart'])->default('cart');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stock_management')->onDelete('cascade');
            $table->foreign('sales_id')->references('id')->on('sales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_items');
    }
};
