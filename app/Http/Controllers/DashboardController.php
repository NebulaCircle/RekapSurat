<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Rekap;
class DashboardController extends Controller
{
    public function index()
    {
        $fil = Request()->fil;
        $siswa = Siswa::count();
        $kelas = Kelas::count();
        $jurusan = Jurusan::count();
        $rekap = Rekap::count();

        $sakit = Rekap::where('status','sakit')->whereMonth('tanggal',strtotime($fil?$fil:date('M')))->count();
        $izin = Rekap::where('status','izin')->whereMonth('tanggal',strtotime($fil?$fil:date('M')))->count();
        $alpa = Rekap::where('status','alpa')->whereMonth('tanggal',strtotime($fil?$fil:date('M')))->count();

        return view('dashboard.index',compact('siswa','kelas','jurusan','rekap','sakit','izin','alpa','fil'));
    }
}
