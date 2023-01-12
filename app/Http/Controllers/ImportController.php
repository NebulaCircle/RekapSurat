<?php

namespace App\Http\Controllers;

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
        alert()->success('Peserta berhasil di import', 'Berhasil');
        return redirect('peserta');
   }
   public function jurusanImport()
   {
    # code...
   }
   public function guruImport()
   {
    # code...
   }
     public function kelasImport()
   {
    # code...
   }
}
