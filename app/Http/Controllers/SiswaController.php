<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $tahunAjaran = session()->get('tahun_ajaran');
        if (Request()->tahun_ajaran) {
            $tahunAjaran = Request()->tahun_ajaran;
        }

        $q = Request()->q;
        $tingkatan = Request()->tingkatan;
        $no_kelas = Request()->no_kelas;
        $jurusan = Request()->jurusan;
        $siswa = Siswa::with(['kelas'])->whereHas('kelas.tahunAjaran',function($e)use($tahunAjaran){
            $e->where('tahun_ajaran',$tahunAjaran);
        });

        if($q){
            $siswa->where("nama_lengkap","like","%$q%");
        }
     
        if($tingkatan){$siswa->wherehas('kelas',function($e) use ($tingkatan){
            $e->where('tingkatan',$tingkatan);
        });}
        if($no_kelas){$siswa->wherehas('kelas',function($e) use ($no_kelas){
            $e->where('no_kelas',$no_kelas);
        });}
        if($jurusan){$siswa->wherehas('kelas.jurusan',function($e) use ($jurusan){
            $e->where('kode_jurusan',$jurusan);
        });}
        


        $siswa = $siswa->paginate(20);
        $jurusan = Jurusan::all();
        // dd($siswa->toArray());

        return view("dashboard.siswa.index",compact('siswa','jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('dashboard.siswa.create',compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate([
            'nama_lengkap'=>'required|string',
            'nis'=>'required',
            'jk'=>'required',
            'id_kelas'=>'required',
        ]);
        $siswa = Siswa::create(Request()->except('_token','id_kelas'));
        $siswa->kelas()->attach(Request()->id_kelas);
        alert()->success('info','Siswa berhasil di Tambahkan');

        return redirect('/admin/siswa')->with('pesan','Siswa berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
         $kelas = Kelas::all();
        return view('dashboard.siswa.edit',compact('siswa','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
         Request()->validate([
            'nama_lengkap'=>'required|string',
            'nis'=>'required',
            'jk'=>'required',
            'id_kelas'=>'required',
        ]);
        $siswa->update(Request()->except(['_token','_method','id_kelas']));
        $siswa->kelas()->attach(Request()->id_kelas);

        alert()->success("info",'Siswa berhasil di ubah');

        return redirect('/admin/siswa')->with('pesan','Siswa berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
               alert()->success("info",'Siswa berhasil di hapus');
        return redirect('/admin/siswa')->with('pesan','Siswa berhasil di ubah');


    }
}
