<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
class Guru extends Model
{
    use HasFactory;
    protected $table = "guru";

      public function Kelas()
    {
        return $this->belongsTo(Kelas::class,'id_walikelas');
    }
}
