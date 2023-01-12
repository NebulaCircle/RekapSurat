<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\Jurusan;
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
        $kelas = Kelas::with('jurusan')->paginate(1);
        return view('dashboard.kelas.index',compact('kelas'));
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

        return view('dashboard.kelas.create',compact('tahunAjaran','jurusan'));
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
            "kelas"=>'required',
            'no_kelas'=>'required',
            'id_jurusan'=>'required',
            'id_ajaran'=>'required'
        ]);
        Kelas::create(Request()->except('_token'));

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
       return view('dashboard.kelas.edit',compact('kelas','jurusan'));
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
            "kelas"=>'required',
            'no_kelas'=>'required',
            'id_jurusan'=>'required'
        ]);
        
        Kelas::where('id',$id)->update(Request()->except(['_token',"_method"]));
        
        return redirect("/admin/kelas")->with('pesan','kelas berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect("/admin/kelas")->with('pesan','kelas berhasil di hapus');
    }
}
