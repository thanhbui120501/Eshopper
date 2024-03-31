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
        Schema::create('bills_detail', function (Blueprint $table) {
            $table->id();     
            $table->string('bill_id');
            $table->foreign('bill_id')->references('bill_id')->on('bills');
            $table->string('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');     
            $table->integer('quantity');
            $table->timestamps();
            $table->tinyInteger('status')->default(1);  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills_detail');
    }
};
