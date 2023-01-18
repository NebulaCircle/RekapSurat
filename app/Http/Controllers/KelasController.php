<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\Jurusan;
use App\Models\Guru;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = Request()->q;
         $tahunAjaran = session()->get('tahun_ajaran');
        if (Request()->tahun_ajaran) {
            $tahunAjaran = Request()->tahun_ajaran;
        }
        $kelas = Kelas::with('jurusan')->with('tahunAjaran')->whereHas("tahunAjaran",function($e)use($tahunAjaran){
            $e->where('tahun_ajaran',$tahunAjaran);
        })->with('siswa')->paginate(20);

        if ($q) {
        $kelas = Kelas::where('tingkatan',$q)->whereHas("tahun_ajaran",function($e)use($tahunAjaran){
            $e->where('tahun_ajaran',$tahunAjaran);
        })->with('jurusan')->paginate(20);;
    }
        return view('dashboard.kelas.index',compact('kelas','q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahunAjaran = TahunAjaran::all();
        $jurusan = Jurusan::all();
        $guru = Guru::all();

        return view('dashboard.kelas.create',compact('tahunAjaran','jurusan','guru'));
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
            "tingkatan"=>'required',
            'id_jurusan'=>'required',
            'id_ajaran'=>'required',
            'id_walikelas'=>'required',
            'id_bk'=>'required'
        ]);
        // dd(Request()->except('_token'));
        Kelas::create(Request()->except('_token'));
        alert()->success("info",'Kelas berhasil di tambahkan');

        return redirect("/admin/kelas")->with('pesan','kelas berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $jurusan = Jurusan::all();
        $tahunAjaran = TahunAjaran::all();
        $guru = Guru::all();


       return view('dashboard.kelas.edit',compact('kelas','jurusan','tahunAjaran','guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
           Request()->validate([
           "tingkatan"=>'required',
            'id_jurusan'=>'required',
            'id_ajaran'=>'required',
            'id_walikelas'=>'required',
            'id_bk'=>'required'
        ]);
        
        Kelas::where('id',$id)->update(Request()->except(['_token',"_method"]));
        alert()->success('Kelas berhasil di ubah');
        
        return redirect("/admin/kelas")->with('pesan','kelas berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::find($id)->delete();
        return redirect("/admin/kelas")->with('pesan','kelas berhasil di hapus');
    }
}
