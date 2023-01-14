<?php

namespace App\Http\Controllers;

use App\Imports\guruImports;
use App\Imports\jurusanImports;
use App\Imports\kelasImports;
use App\Imports\siswaImports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ImportController extends Controller
{
   public function siswaImport(Request $request)
   {
    request()->validate([
            'file' => 'required|mimes:xls,xlsx',
        ],[
            'file.required' => 'Harap di isi',
            'file.mimes' => 'Tidak support',
        ]);

        $file = $request->file('file');
        $nama_file =Rand(1,30).$file->getClientOriginalName();
        $file->move(public_path('Excel'),$nama_file);

        Excel::import(new siswaImports, public_path('Excel/'.$nama_file));
        alert()->success('Siswa berhasil di import');
        return redirect('/admin/siswa');
   }
   public function jurusanImport(Request $request)
   {
     request()->validate([
            'file' => 'required|mimes:xls,xlsx',
        ],[
            'file.required' => 'Harap di isi',
            'file.mimes' => 'Tidak support',
        ]);

        $file = $request->file('file');
        $nama_file =Rand(1,30).$file->getClientOriginalName();
        $file->move(public_path('Excel'),$nama_file);

        Excel::import(new jurusanImports, public_path('Excel/'.$nama_file));
        alert()->success('Jurusan berhasil di import');
        return redirect('/admin/jurusan');
   }
   public function guruImport(Request $request)
   {
     request()->validate([
            'file' => 'required|mimes:xls,xlsx',
        ],[
            'file.required' => 'Harap di isi',
            'file.mimes' => 'Tidak support',
        ]);

        $file = $request->file('file');
        $nama_file =Rand(1,30).$file->getClientOriginalName();
        $file->move(public_path('Excel'),$nama_file);

        Excel::import(new guruImports, public_path('Excel/'.$nama_file));
        alert()->success('Guru berhasil di import');
        return redirect('/admin/guru');
   }
     public function kelasImport(Request $request)
   {
     request()->validate([
            'file' => 'required|mimes:xls,xlsx',
        ],[
            'file.required' => 'Harap di isi',
            'file.mimes' => 'Tidak support',
        ]);

        $file = $request->file('file');
        $nama_file =Rand(1,30).$file->getClientOriginalName();
        $file->move(public_path('Excel'),$nama_file);

        Excel::import(new kelasImports, public_path('Excel/'.$nama_file));
        alert()->success('Kelas berhasil di import');
        return redirect('/admin/kelas');
   }
}
