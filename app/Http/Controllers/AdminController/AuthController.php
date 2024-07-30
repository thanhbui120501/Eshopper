<?php

namespace App\Http\Controllers\AdminController;

use App\Models\admin;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Carbon\Carbon;
use PhpParser\Node\Stmt\TryCatch;

use function Laravel\Prompts\alert;

class AuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function authenticate(Request $request):RedirectResponse{
        
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],               
        ]);
       

        $remember = $request->has('remember_token') ? true : false;
       
        if(Auth::guard('admins')->attempt([
            'email' => $request->email,
            'password' => $request->password,],
            $remember,)){ 
            
            $request->session()->regenerate();
         
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' =>'The provided credentials do not match our records.'
         ])->onlyInput('email');
    }
    
    public function register(){
        return view('admin.register');
    }

    public function auth_register(RegisterRequest $request):RedirectResponse{
        //validate
        // dd(1111);
        dd($request);
        $data = $request->all();    
        $data['password'] = Hash::make($request->password);
        $data['admin_id'] = "Ad.".Carbon::now()->format('d.m.y.h.i.s');

        
        
        try{
            Admin::create($data);          
        }catch(\Throwable $e){
            return response()->json([
                'error' => $e
            ]);
        }
        
        
        return redirect()->route('admin.login');
    }

    public function logout(Request $request): RedirectResponse{
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
