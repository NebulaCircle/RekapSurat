<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Jurusan;
class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $hidden = ['id_jurusan','id_ajaran'];
    protected $fillable = ['kelas','no_kelas','id_jurusan',];
    public $timestamps = false;

      public function siswa()
    {
        return $this->hasMany(Siswa::class,'id_kelas');
    }

      public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }

}
