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

       
       $checkAdmin = array_merge(Request()->except('_token'),['role'=>'admin']);
       $checkUser = array_merge(Request()->except('_token'),['role'=>'admin']);

       if(Auth::attempt($checkAdmin)){
        return redirect('/admin/dashboard');
       }else if(Auth::attempt($checkUser)){
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
