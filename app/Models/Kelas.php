<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\TahunAjaran;
class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $hidden = ['id_jurusan','id_ajaran'];
    protected $fillable = ['kelas','no_kelas','id_jurusan','id_ajaran','id_walikelas','tingkatan','id_bk'];
    public $timestamps = false;

      public function siswa()
    {
        return $this->belongsToMany(Siswa::class,'kelas_siswa','id_kelas','id_siswa');
    }

      public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }
      public function walikelas()
    {
        return $this->belongsTo(Guru::class,'id_walikelas');
    }
      public function bk()
    {
        return $this->belongsTo(Guru::class,'id_bk');
    }
      public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class,'id_ajaran');
    }
   


    

}
