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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('user_id',100)->unique();
            $table->string('fullname',100);
            $table->tinyInteger('gender');
            $table->string('phone',20);
            $table->string('email',100);
            $table->string('password',20);
            $table->integer('purchased_product');
            $table->string('address',50)->nullable();
            $table->string('province',50)->nullable();
            $table->string('district',50)->nullable();
            $table->string('ward',50)->nullable();
            $table->string('fulladdress',250)->nullable();           
            $table->integer('assess_time')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('status')->default(1);
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('admin_id',100)->unique();
            $table->string('fullname',100);
            $table->string('avatar',250);
            $table->tinyInteger('gender');
            $table->string('phone',20);
            $table->string('email',100);
            $table->string('password',20);
            $table->string('address',50)->nullable();
            $table->string('province',50)->nullable();
            $table->string('district',50)->nullable();
            $table->string('ward',50)->nullable();
            $table->string('fulladdress',250)->nullable();           
            $table->integer('assess_time')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('status')->default(1);            
        });
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');     
        Schema::dropIfExists('admins'); 
        Schema::dropIfExists('sessions'); 
    }
};
