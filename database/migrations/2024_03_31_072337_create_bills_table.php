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
        Schema::create('bills', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('bill_id',100)->unique();
            $table->string('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->timestamps();
            $table->tinyInteger('status')->default(1);  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
        
    }
};
