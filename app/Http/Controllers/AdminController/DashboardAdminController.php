<?php

namespace App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardAdminController extends Controller
{
    // public function check_logged(){

    //     if(Auth::guard('admins')->check()){
    //         return redirect()->route('admin.dashboard');
    //     }
    //     return redirect()->route('admin.login');
    // }

    public function dashboard(){
        //dd("5555555");
        //binding data with view and controller for laravel 11
        $data = Auth::guard('admins')->user();
        return view('admin.dashboard')->with([
            'data' => $data
        ]);
    }
}
