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
        Schema::create('stock', function (Blueprint $table) {
            $table->date('date');
            $table->date('last_change_date');

            $table->string('supplier_article'); 
            $table->string('tech_size');
            $table->string('subject');
            $table->string('category');
            $table->string('brand');
            $table->string('warehouse_name');
            
            $table->bigInteger('barcode');
            $table->integer('quantity');
            $table->integer('quantity_full');
            $table->integer('in_way_to_client');
            $table->integer('in_way_from_client');
            $table->bigInteger('nm_id');
            $table->bigInteger('sc_code');
            
            $table->boolean('is_supply');
            $table->boolean('is_realization');
            
            $table->string('price');
            $table->string('discount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
