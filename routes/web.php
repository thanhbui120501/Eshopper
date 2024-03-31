<?php

use App\Http\Controllers\AdminController\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController\HomeController;
//Home page
Route::get('/', [HomeController::class,'index'])->name('user.home');

Route::group(['prefix' => '/users'], function(){

});

Route::group(['prefix' => '/product'], function(){

});

Route::group(['prefix' => 'admin'],function(){
    Route::get('/login',[AuthController::class,'login'])->name('admin.login');
});