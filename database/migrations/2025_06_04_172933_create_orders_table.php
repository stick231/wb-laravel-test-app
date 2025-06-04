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
            $table->string('g_number');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('warehouse_name');
            $table->string('oblast');
            $table->string('odid');
            $table->string('subject');
            $table->string('category');
            $table->string('brand');

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
