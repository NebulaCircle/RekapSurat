<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = "jurusan";
    protected $fillable = ["nama_jurusan", "kode_jurusan"];

    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_jurusan');
    }
}
