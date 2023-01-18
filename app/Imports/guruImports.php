<?php

namespace App\Imports;

use App\Models\guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class guruImports implements ToModel,WithHeadingRow
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
        $guru = Guru::where('nama_lengkap', $row['nama_lengkap'])->first();
        $this->count +=1;

        if($guru){
            $this->gagal +=1;
            return;
        }
       try {
           $this->berhasil +=1;
        return new Guru([
            // 'nip' => $row['nip'],
            'nama_lengkap' => $row['nama_lengkap'],
            'jk' => $row['jk'],
        ]);

       } catch (\Throwable $e) {
            $this->gagal +=1;
       }
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
