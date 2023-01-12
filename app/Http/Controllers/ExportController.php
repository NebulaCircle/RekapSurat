<?php

namespace App\Http\Controllers;

use App\Exports\guruExport;
use App\Exports\jurusanExport;
use App\Exports\kelasExport;
use App\Exports\RekapExport;
use App\Exports\siswaExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function siswaExport()
    {
        return Excel::download(new siswaExport, 'siswa.xlsx');
    }

        public function jurusanExport()
    {
        return Excel::download(new jurusanExport, 'jurusan.xlsx');
    }

        public function kelasExport()
    {
        return Excel::download(new kelasExport, 'kelas.xlsx');
    }

        public function guruExport()
    {
        return Excel::download(new guruExport, 'guru.xlsx');
    }

        public function rekapExport()
    {
        return Excel::download(new RekapExport, 'rekap.xlsx');
    }
    
}
