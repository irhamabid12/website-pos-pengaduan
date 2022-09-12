<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('/login');
    }

    public function authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
 
        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }else{
            return redirect('login')->with(['noAkun' => 'Akun tidak terdaftar!']);
        }
        
        $check = DB::table('users')->where('username', $request->uername)->count();

        
        
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
