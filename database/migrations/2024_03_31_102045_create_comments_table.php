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
        Schema::create('comments', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->timestamps();
            $table->tinyInteger('status')->default(0);  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
