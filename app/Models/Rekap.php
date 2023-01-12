<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
class Rekap extends Model
{
    use HasFactory;
    protected $table = "rekap";
    protected $hidden = ['id_siswa'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'id_siswa');
    }

}
