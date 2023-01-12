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
    public function model(array $row)
    {
        return new Jurusan([
            'nama_jurusan' => $row['nama_jurusan'],
            'kode_jurusan' => $row['kode_jurusan'],
        ]);
    }
}
