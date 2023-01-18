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

        $siswa = new siswaImports();
        Excel::import($siswa, public_path('Excel/'.$nama_file));


        if($siswa->error()){
             if($siswa->getMsg()) alert()->error("info",$siswa->getMsg());
                return redirect('/admin/siswa');
        }
        alert()->success('Siswa berhasil di import',"Total data  di import ".$siswa->getCount()."\n Data berhasil di import ".$siswa->getBerhasil()."\n Data gagal di import ".$siswa->getGagal());
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

        $jurusan = new jurusanImports;
        Excel::import($jurusan, public_path('Excel/'.$nama_file));
                    if($jurusan->error()){
                if($jurusan->getMsg()) alert()->error("info",$jurusan->getMsg());
                return redirect('/admin/jurusan');
            }
               alert()->success('Jurusan berhasil di import',"Total data  di import ".$jurusan->getCount()."\n Data berhasil di import ".$jurusan->getBerhasil()."\n Data gagal di import ".$jurusan->getGagal());

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
        $guru = new guruImports;
        Excel::import($guru, public_path('Excel/'.$nama_file));

         if($guru->error()){
             if($guru->getMsg()) alert()->error("info",$guru->getMsg());
                return redirect('/admin/guru');
        }

         alert()->success('Guru berhasil di import',"Total data  di import ".$guru->getCount()."\n Data berhasil di import ".$guru->getBerhasil()."\n Data gagal di import ".$guru->getGagal());
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
        
        $kelas  = new kelasImports;
        try {
            Excel::import($kelas, public_path('Excel/'.$nama_file));
            if($kelas->error()){
                if($kelas->getMsg()) alert()->error("info",$kelas->getMsg());
                return redirect('/admin/jurusan');
            }
        } catch (\Throwable $e) {
            dd($e);
        }
        
              alert()->success('Kelas berhasil di import',"Total data  di import ".$kelas->getCount()."\n Data berhasil di import ".$kelas->getBerhasil()."\n Data gagal di import ".$kelas->getGagal());
        return redirect('/admin/kelas');
   }
}
