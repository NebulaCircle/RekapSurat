<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\TahunAjaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class kelasImports implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct(Type $var = null) {
        $this->error = false;
        $this->msg = "";
                $this->count = 0;
        $this->berhasil = 0;
        $this->gagal = 0;
    }
    public function model(array $row)
    {
        if(!$row['walikelas'] && !$row['jurusan'] && !$row['no_kelas'] && !$row['kelas']){
             $this->error = true;
            $this->msg = "Format excel tidak sesuai";
            return;
        };

        $this->count +=1;
        $month = date('m');
       $semester = $month >= 01 || $month <= 06 ?"genap":"ganjil";
         $y1 = $semester === "genap"?date("Y",strtotime("-1 year")):date("Y");
        $y2 = $semester === "genap"?date("Y"):date("Y",strtotime("-1 year"));
       $tahunajaran =$y1 ." / ".$y2; ;
        $idajaran = TahunAjaran::where("tahun_ajaran",$tahunajaran)->where('semester',$semester)->first();

        $idJurusan = Jurusan::where('nama_jurusan',$row['jurusan'])->orWhere("kode_jurusan",$row['jurusan'])->first('id');
        $idWalikelas = Guru::where('nama_lengkap',$row['walikelas'])->first('id');
        $idBk = Guru::where('nama_lengkap',$row['bk'])->first('id');



          if(!$idJurusan){
            $this->error = true;
            $this->msg = "Data jurusan belum terpenuhi. Tambahkan data jurusan terlebih dahulu";
            return;
        }
        $kelas = Kelas::where('tingkatan',$row['kelas'])->where('no_kelas',$row['no_kelas'])->where('id_ajaran',$idajaran->id)->where('id_jurusan',$idJurusan->id)->first();

        if($kelas){
            $this->gagal +=1;
            return;
        }
      
        if(!$idajaran){
            $this->error = true;
            $this->msg = "Data tahun ajaran belum terpenuhi. Tambahkan data tahun ajaran terlebih dahulu";
            return;
        }
        if(!$idWalikelas){
            $this->error = true;
            $this->msg = "Data wali kelas belum terpenuhi. Tambahkan data guru terlebih dahulu";
            return ; 
        };
       

      $this->berhasil +=1;
        return new Kelas([
            'tingkatan' => $row['kelas'],
            'no_kelas' => $row['no_kelas'],
            'id_jurusan'=>$idJurusan->id,
            'id_walikelas'=>$idWalikelas->id,
            'id_ajaran'=>$idajaran->id,
            'id_bk'=>$idBk->id
        ]);
    }


    public function getMsg()
    {
        return $this->msg;
    }
    public function error()
    {
        return $this->error;
    }
      public function getCount()
    {
        return $this->count;
    }
    public function getGagal()
    {
        return $this->gagal;
    }
    public function getBerhasil()
    {
        return $this->berhasil;
    }

}
