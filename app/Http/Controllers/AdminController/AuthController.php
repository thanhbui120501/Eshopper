<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;

class AuthController
{
    public function login(){
        return view('admin.login');
    }
}
