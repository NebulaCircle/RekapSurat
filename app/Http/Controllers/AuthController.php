<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function loginPage()
    {
         return view('auth.login');
    }
    public function loginCheck()
    {
       Request()->validate([
        'username'=>'required',
        'password'=>'required',
       ]);
       
       $remember =  Request()->remember ? true:false;
       $checkAdmin = array_merge(Request()->except('_token'),['role'=>'admin']);
       $checkUser = array_merge(Request()->except('_token'),['role'=>'admin']);

       if(Auth::attempt($checkAdmin,$remember)){
        return redirect('/admin/dashboard');
       }else if(Auth::attempt($checkUser,$remember)){
        return redirect('/dashboard');
       }{
         return redirect()->back()->with('msg','username atau password salah');
       }
    }
    public function logout()
    {
       Auth::logout();
       return redirect('/login');
    }
}
