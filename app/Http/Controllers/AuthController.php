<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\TahunAjaran;


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


      $month = date('m');
      $semester = $month >= 01 || $month <= 06 ?"genap":"ganjil";
      $y1 = $semester === "genap"?date("Y",strtotime("-1 year")):date("Y");
      $y2 = $semester === "genap"?date("Y"):date("Y",strtotime("-1 year"));
      $tahunajaran =$y1 ." / ".$y2; 
      $thnada = TahunAjaran::where('tahun_ajaran',$tahunajaran)->where("semester","ganjil")->orWhere("semester","genap");
      
      
       if (!$thnada) {
          if($semester === "genap"){
         TahunAjaran::create([
            "tahun_ajaran"=>$tahunajaran,
            "semester"=>"ganjil"
         ]);
         TahunAjaran::create([
            "tahun_ajaran"=>$tahunajaran,
            "semester"=>"genap"
         ]);
       }
      }

      

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
