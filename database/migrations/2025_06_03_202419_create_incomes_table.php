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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('income_id');
            $table->string('number')->nullable(); 
            $table->date('date');
            $table->date('last_change_date')->nullable();
            $table->string('supplier_article');
            $table->string('tech_size')->nullable();
            $table->integer('barcode')->nullable(); 
            $table->integer('quantity');
            $table->string('total_price'); 
            $table->date('date_close')->nullable();
            $table->string('warehouse_name'); 
            $table->bigInteger('nm_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
