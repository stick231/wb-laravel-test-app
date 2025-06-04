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
        Schema::create('sales', function (Blueprint $table) {
            $table->bigInteger('g_number');
            $table->date('date');
            $table->date('last_change_date');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->integer('barcode');
            $table->string("total_price");
            $table->string("discount_percent");
            $table->boolean("is_supply");
            $table->boolean("is_realization");
            $table->string("promo_code_discount")->nullable();
            $table->string("warehouse_name");
            $table->string("country_name");
            $table->string("oblast_okrug_name");
            $table->string('region_name');
            $table->unsignedBigInteger("income_id");
            $table->foreign('income_id')     
              ->references('id')           
              ->on('incomes')                  
              ->onDelete('cascade'); 
            $table->string('sale_id');
            $table->string('odid')->nullable();
            $table->string('spp');
            $table->string('for_pay', 20)->nullable(); // Длина 20 для запаса
            $table->string('finished_price', 20)->nullable();
            $table->string('price_with_disc', 20)->nullable();
            $table->unsignedBigInteger('nm_id')->nullable();
            $table->string('subject', 16)->nullable();
            $table->string('category', 16)->nullable();
            $table->string('brand', 16)->nullable();
            $table->string('is_storno', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
