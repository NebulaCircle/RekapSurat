<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class siswaImports implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $idKelas = Kelas::where('kelas',$row['kelas'])->where('no_kelas',$row['no_kelas'])->with(['jurusan'=>function($e) use($row){
            $e->where('nama_jurusan',$row['jurusan']);
        }])->first('id');

        return new Siswa([
            'nama_lengkap' => $row['nama_lengkap'],
            'nisn' => $row['nisn'],
            'jk' => $row['jk'],
        ]);
    }
}
