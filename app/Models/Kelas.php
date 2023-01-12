<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $hidden = ['id_jurusan'];


      public function siswa()
    {
        return $this->hasMany(Siswa::class,'id_kelas');
    }

      public function jurusan()
    {
        return $this->belongsTo(Siswa::class,'id_kelas');
    }

}
