<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru  = Guru::all();
        return view('dashboard.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Guru $guru)
    {
        $guru = Guru::all();
        return view('dashboard.guru.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|min:18|max:18',
            'nama_lengkap' => 'required',
            'jk' => 'required',
            'tipe' => 'required'
        ]);

        Guru::create($request->except('_token'));
        alert()->success('Guru berhasil Di Tambahkan', 'Berhasil');
        return redirect('/admin/guru')->with('pesan','kelas berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('dashboard.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
         $request->validate([
            'nip' => 'required|min:18|max:18',
            'nama_lengkap' => 'required',
            'jk' => 'required',
            'tipe' => 'required'
        ]);

        $guru->update($request->except('_token'));
        return redirect('/admin/guru')->with('pesan','guru berhasil di tambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect('/admin/guru');
    }
}
