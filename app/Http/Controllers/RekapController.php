<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Rekap;
use App\Models\Siswa;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekap = Rekap::paginate(10);
        return view('dashboard.rekap.index',compact('rekap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $guru = Guru::all();

        return view('dashboard.rekap.create',compact('siswa','guru'));
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
            'id_siswa'=>'required',
            'status'=>'required',
            'foto_surat'=>'required',
            'id_walikelas'=>'required',
            'id_bk'=>'required'
        ]);
        Rekap::create(Request()->except('_token'));
        alert()->success('Kelas berhasil di tambahkan', 'Berhasil');

        return redirect("/admin/kelas")->with('pesan','kelas berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function show(Rekap $rekap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekap $rekap)
    {
        $rekap = Rekap::all();
        $siswa = Siswa::all();
        $guru = Guru::all();
       return view('dashboard.reap$rekap.edit',compact('siswa','guru','rekap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Request()->validate([
            'id_siswa'=>'required',
            'status'=>'required',
            'foto_surat'=>'required',
            'id_walikelas'=>'required',
            'id_bk'=>'required'
        ]);
        
        Rekap::where('id',$id)->update(Request()->except(['_token',"_method"]));
        alert()->success('Kelas berhasil di ubah', 'Berhasil');
        
        return redirect("/admin/kelas")->with('pesan','kelas berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekap $rekap)
    {
        $rekap->delete();
        return redirect('/admin/rekap');
    }
}
