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
        $siswa = Siswa::count();
        $kelas = Kelas::count();
        $jurusan = Jurusan::count();
        $rekap = Rekap::count();

        return view('dashboard.index',compact('siswa','kelas','jurusan','rekap'));
    }
}
