<?php

namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;

class HomeController
{
    public function index(){
        return view('users.home');
    }
}
