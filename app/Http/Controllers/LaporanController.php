<?php

namespace App\Http\Controllers;
use App\Models\Rekap;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $fil = Request()->fil;
        $tahunAjaran = session()->get('tahun_ajaran');
        // dd($tahunAjaran);
        if (Request()->tahun_ajaran) {
            $tahunAjaran = Request()->tahun_ajaran;
        }

       $sakitPerBulan = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',$fil?$fil:date('m'))->orderByRaw("MONTH(tanggal) asc")->count();
    //    dd($tahunAjaran);
       $izinPerBulan = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',$fil?$fil:date('m'))->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaPerBulan = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',$fil?$fil:date('m'))->orderByRaw("MONTH(tanggal) asc")->count();

        $array = [];

       $sakitBulan1 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',01)->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan2 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',02)->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan3 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',03)->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan4 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',04)->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan5 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',05)->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan6 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',06)->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan7 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',07)->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan8 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal','08')->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan9 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal','09')->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan10 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',10)->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan11 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',11)->orderByRaw("MONTH(tanggal) asc")->count();
       $sakitBulan12 = Rekap::where('status','sakit')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',12)->orderByRaw("MONTH(tanggal) asc")->count();

       $array['sakit'] = [$sakitBulan1,
                        $sakitBulan2,
                        $sakitBulan3,
                        $sakitBulan4,
                        $sakitBulan5,
                        $sakitBulan6,
                        $sakitBulan7,
                        $sakitBulan8,
                        $sakitBulan9,
                        $sakitBulan10,
                        $sakitBulan11,
                        $sakitBulan12];
      
       $izinBulan1 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',01)->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan2 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',02)->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan3 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',03)->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan4 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',04)->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan5 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',05)->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan6 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',06)->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan7 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',07)->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan8 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal','08')->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan9 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal','09')->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan10 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',10)->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan11 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',11)->orderByRaw("MONTH(tanggal) asc")->count();
       $izinBulan12 = Rekap::where('status','izin')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',12)->orderByRaw("MONTH(tanggal) asc")->count();

       $array['izin'] = [$izinBulan1,
                        $izinBulan2,
                        $izinBulan3,
                        $izinBulan4,
                        $izinBulan5,
                        $izinBulan6,
                        $izinBulan7,
                        $izinBulan8,
                        $izinBulan9,
                        $izinBulan10,
                        $izinBulan11,
                        $izinBulan12];

       $alpaBulan1 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',01)->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan2 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',02)->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan3 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',03)->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan4 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',04)->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan5 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',05)->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan6 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',06)->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan7 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',07)->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan8 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal','08')->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan9 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal','09')->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan10 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',10)->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan11 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',11)->orderByRaw("MONTH(tanggal) asc")->count();
       $alpaBulan12 = Rekap::where('status','alpa')->with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->whereMonth('tanggal',12)->orderByRaw("MONTH(tanggal) asc")->count();

       $array['alpa'] = [$alpaBulan1,
                        $alpaBulan2,
                        $alpaBulan3,
                        $alpaBulan4,
                        $alpaBulan5,
                        $alpaBulan6,
                        $alpaBulan7,
                        $alpaBulan8,
                        $alpaBulan9,
                        $alpaBulan10,
                        $alpaBulan11,
                        $alpaBulan12];
                        
        return view('dashboard.laporan.index',compact('sakitPerBulan','izinPerBulan','alpaPerBulan','array','fil'));
    }
}
