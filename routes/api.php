<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/admins', function (Request $request) {
    return $request->admin();
})->middleware('auth:sanctum');
