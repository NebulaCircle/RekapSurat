<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Rekap;
use App\Models\Siswa;
use App\Models\TahunAjaran;
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
        $tahunAjaran = session()->get('tahun_ajaran');
        if (Request()->tahun_ajaran) {
            $tahunAjaran = Request()->tahun_ajaran;
        }
        $rekap = Rekap::with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->paginate(20);
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
        $tahunDepan = date('Y',strtotime('+1 year'));
        $tahunSekarang = date('Y');

        $idAjaran = TahunAjaran::where('tahun_ajaran',"$tahunSekarang / $tahunDepan")->first();

        $file = Request()->file('foto_surat');
        $nameFile = time().$file->getClientOriginalName();
        $file->move(public_path('/file-surat'),$nameFile);



        Rekap::create(array_merge(Request()->except('_token'),['foto_surat'=>$nameFile,'id_ajaran'=>1]));
        alert()->success('Data berhasil di tambahkan', 'Berhasil');

        return redirect("/admin/rekap")->with('pesan','Rekap berhasil di tambahkan');
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
        $siswa = Siswa::all();
        $guru = Guru::all();
       return view('dashboard.rekap.edit',compact('siswa','guru','rekap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekap $rekap)
    {
        Request()->validate([
            'id_siswa'=>'required',
            'status'=>'required',
            'id_walikelas'=>'required',
            'id_bk'=>'required'
        ]);
        
        $tahunDepan = date('Y',strtotime('+1 year'));
        $tahunSekarang = date('Y');

        $idAjaran = TahunAjaran::where('tahun_ajaran',"$tahunSekarang / $tahunDepan")->first();

        if(Request()->get('foto_surat')){
            $file = Request()->file('foto_surat');
            $nameFile = time().$file->getClientOriginalName();
            $file->move(public_path('/file-surat'),$nameFile);
            $rekap->update(['foto_surat'=>$nameFile]);
        }



        $rekap->update(array_merge(Request()->except(['_token','_method'])));
        alert()->success('Data berhasil di ubah', 'Berhasil');
        
        return redirect("/admin/rekap")->with('pesan','data berhasil di edit');
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
