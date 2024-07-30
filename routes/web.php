<?php

use App\Http\Controllers\AdminController\AuthController;
use App\Http\Controllers\AdminController\DashboardAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController\HomeController;
use App\Http\Middleware\AlreadyLoggedIn;
use App\Http\Middleware\AuthCheck;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

//Home page
//Route::get('/', [HomeController::class,'index'])->name('user.home');

Route::group(['prefix' => '/'], function(){
    Route::get('/',[HomeController::class,'index'])->name('user.home');
});

// Route::group(['prefix' => 'product'], function(){â

// });s

Route::group(['prefix' => 'admins'],function(){
    Route::get('/',[DashboardAdminController::class,'dashboard'])->middleware('authcheck')->name('admin.dashboard');
    Route::get('/login',[AuthController::class,'login'])->name('admin.login');
    Route::post('/login',[AuthController::class,'authenticate'])->name('admin.auth');
    Route::get('/register',[AuthController::class,'register'])->name('admin.register');
    Route::post('/register',[AuthController::class,'auth_register'])->name('admin.auth-register');
    Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');
});
//Route::get('/admins',[AuthController::class,'admin'])->name('admin.login');