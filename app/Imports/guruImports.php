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
    public function model(array $row)
    {
        return new Guru([
            'nip' => $row['nip'],
            'nama_lengkap' => $row['nama_lengkap'],
            'jk' => $row['jk'],

        ]);
    }
}
