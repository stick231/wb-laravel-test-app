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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('g_number', 50);
            $table->string('supplier_article', 50);
            $table->string('tech_size', 50);
            $table->string('warehouse_name', 100);
            $table->string('oblast', 100);
            $table->string('odid', 50);
            $table->string('subject', 50);
            $table->string('category', 50);
            $table->string('brand', 50);

            $table->bigInteger('barcode');
            $table->unsignedBigInteger('income_id');
            $table->foreign('income_id')
                    ->references('id')
                    ->on('incomes')
                    ->onDelete('cascade');
            $table->bigInteger('nm_id');

            $table->string('total_price', 20);
            $table->integer('discount_percent');
            
            $table->dateTime('date');
            $table->date('last_change_date');
            
            $table->boolean('is_cancel');
            $table->dateTime('cancel_dt')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
