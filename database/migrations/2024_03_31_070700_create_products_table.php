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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('product_id',100)->unique();
            $table->string('product_name',250)->unique();
            $table->string('description',250);
            $table->integer('price');
            $table->string('image');
            $table->string('color');
            $table->string('material');
            $table->string('uses');
            $table->integer('gender');
            $table->integer('size');
            $table->integer('evaluate');
            $table->integer('điscount');
            $table->unsignedBigInteger('product_type_id');
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->integer('inventory');
            $table->integer('sold');
            $table->timestamps();
            $table->tinyInteger('status')->default(1);   

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('products');
    }
};
