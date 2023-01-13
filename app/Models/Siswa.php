<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";
    protected $hidden = ['id_kelas'];
    protected $fillable = ['nama_lengkap','nisn','jk','id_kelas'];
    public $timestamps = false;


      public function kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas');
    }
}
