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

        $this->createTableWithCreatedBy('suppliers');
        $this->createTableWithCreatedBy('receiving_management');
        $this->createTableWithCreatedBy('stock_management');
        $this->createTableWithCreatedBy('customer');
        $this->createTableWithCreatedBy('sales');
        $this->createTableWithCreatedBy('sales_items');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->dropForeignKeyIfExists('sales_items', 'sales_items_created_by_foreign');
        $this->dropColumnIfExists('sales_items', 'created_by');

        $this->dropForeignKeyIfExists('sales', 'sales_created_by_foreign');
        $this->dropColumnIfExists('sales', 'created_by');

        $this->dropForeignKeyIfExists('customer', 'customer_created_by_foreign');
        $this->dropColumnIfExists('customer', 'created_by');

        $this->dropForeignKeyIfExists('stock_management', 'stock_management_created_by_foreign');
        $this->dropColumnIfExists('stock_management', 'created_by');

        $this->dropForeignKeyIfExists('receiving_management', 'receiving_management_created_by_foreign');
        $this->dropColumnIfExists('receiving_management', 'created_by');

        $this->dropForeignKeyIfExists('suppliers', 'suppliers_created_by_foreign');
        $this->dropColumnIfExists('suppliers', 'created_by');
    }

    protected function createTableWithCreatedBy($tableName)
    {
        Schema::table($tableName, function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Drop a foreign key constraint if it exists.
     *
     * @param string $tableName
     * @param string $constraintName
     * @return void
     */
    protected function dropForeignKeyIfExists($tableName, $constraintName)
    {
        if (Schema::hasTable($tableName)) {
            $table = Schema::getConnection()->getDoctrineSchemaManager()->listTableDetails($tableName);
            $foreignKeys = $table->getForeignKeys();

            foreach ($foreignKeys as $foreignKey) {
                if ($foreignKey->getName() === $constraintName) {
                    $table->removeForeignKey($foreignKey->getName());
                }
            }
        }
    }

    /**
     * Drop a column if it exists.
     *
     * @param string $tableName
     * @param string $columnName
     * @return void
     */
    protected function dropColumnIfExists($tableName, $columnName)
    {
        if (Schema::hasColumn($tableName, $columnName)) {
            Schema::table($tableName, function (Blueprint $table) use ($columnName) {
                $table->dropColumn($columnName);
            });
        }
    }
};
