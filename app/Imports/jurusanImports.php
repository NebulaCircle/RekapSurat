<?php

namespace App\Imports;

use App\Models\jurusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class jurusanImports implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
       public function __construct(Type $var = null) {
        $this->count = 0;
        $this->berhasil = 0;
        $this->gagal = 0;
        $this->error = false;
        $this->msg = "";
    }
    public function model(array $row)
    {
        if(!$row['nama_jurusan'] && !$row['kode_jurusan']){
            $this->error = true;
            $this->msg = "Format excel tidak sesuai";
            return;
        };
        $jurusan = Jurusan::where('nama_jurusan', $row['nama_jurusan'])->where('kode_jurusan',$row['kode_jurusan'])->first();
        $this->count +=1;

        if($jurusan){
            $this->gagal +=1;
            return;
        }


        $this->berhasil += 1;
        return new Jurusan([
            'nama_jurusan' => $row['nama_jurusan'],
            'kode_jurusan' => $row['kode_jurusan'],
        ]);
    }


    public function error()
    {
        return $this->error;
    }
     public function getMsg()
    {
        return $this->msg;
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
