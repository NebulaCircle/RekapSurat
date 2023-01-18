<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;
class siswaImports implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct(Type $var = null) {
        $this->count = 0;
        $this->berhasil = 0;
        $this->gagal = 0;
        $this->error = false;
        $this->msg = "";
    }
    public function model(array $row)
    {
         if(!$row['jurusan'] && !$row['nama'] && !$row['nis'] && !$row['gender']){
             $this->error = true;
            $this->msg = "Format excel tidak sesuai";
            return;
        };
        $this->count += 1;
        $idKelas = Kelas::where('tingkatan',$row['kelas'])->where('no_kelas',$row['no_kelas'])->with(['jurusan'])->whereHas('jurusan', function($e) use($row) {
                        $e->where('nama_jurusan',$row['jurusan']);
                        $e->orWhere('kode_jurusan',$row['jurusan']);
                    })->first();

        $siswaId = Siswa::where('nama_lengkap',$row['nama'])->with(['kelas', 'kelas.jurusan'])->whereHas('kelas', function($e) use($row) {
            
            $e->where('tingkatan',$row['kelas']);
            $e->where('no_kelas',$row['no_kelas']);
           
        })->whereHas('kelas.jurusan', function($query) use ($row){
        $query->where('nama_jurusan', $row['jurusan']);
        $query->orWhere('kode_jurusan', $row['jurusan']);
    })->first();

       
  
     
   

        if(!$idKelas){dd($row);
             $this->gagal += 1;
             $this->error = true;
            $this->msg = "Data kelas belum terpenuhi. Tambahkan data kelas terlebih dahulu";
            return;
        }
        if ($siswaId) {
             $this->gagal += 1;
            $siswa  = $siswaId ;
        }else{
            $siswa =  new Siswa();
            $siswa->nama_lengkap = $row['nama'];
            $siswa->nis= $row['nis'];
            $siswa->jk= $row['gender'];
            $siswa->save();
          $this->berhasil += 1;
        }

       
        $ada = DB::table('kelas_siswa')->where('id_kelas',$idKelas->id)->where('id_siswa',$siswa->id)->first();
        if ($ada) {
            return;
        }else{
      
        DB::table('kelas_siswa')->insert([
        'id_kelas'=>$idKelas->id,
        'id_siswa'=>$siswa->id
       ]);

     
        }
      
    }
     public function getMsg()
    {
        return $this->msg;
    }
    public function getCount()
    {
        return $this->count;
    }
    public function getGagal()
    {
        return $this->gagal;
    }
    public function error()
    {
        return $this->error;
    }
    public function getBerhasil()
    {
        return $this->berhasil;
    }
}
