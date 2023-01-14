<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class kelasImports implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $idJurusan = Jurusan::where('nama_jurusan',$row['jurusan'])->first('id');

        if(!$idJurusan)return;
        return new Kelas([
            'kelas' => $row['kelas'],
            'no_kelas' => $row['no_kelas'],
            'id_jurusan'=>$idJurusan->id
        ]);
    }
}
