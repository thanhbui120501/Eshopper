<?php

namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('users.home');
    }
}
