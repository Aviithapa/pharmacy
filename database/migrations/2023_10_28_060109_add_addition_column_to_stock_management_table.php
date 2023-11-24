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
        Schema::table('stock_management', function (Blueprint $table) {
            //
            $table->enum('status', ['active', 'in-active'])->default('active');
            $table->integer('remaining_quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stock_management', function (Blueprint $table) {
            //
            $table->dropColumn('status');
            $table->dropColumn('remaining_quantity');
        });
    }
};
