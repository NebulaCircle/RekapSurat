@extends('layout.index')


@section('content')
<div class="card">
        <div class="card-header">
            <h4>Tambah Data </h4>
        </div>
        <div class="card-body">
            <form action="/admin/rekap/{{ $rekap->id }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Siswa</label>
                        <select name="siswa" class="form-control" id="">
                            <option value="" disabled>pilih siswa</option>
                            <option value="{{ $siswa->id }}" selected>{{ $siswa->nama_lengkap }}</option>
                            @foreach ( $siswa as $s)
                                <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                            @endforeach
                        </select>
                        @error('kelas')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Wali Kelas</label>
                        <select name="id_walikelas" class="form-control" id="">
                            <option value="" disabled>pilih wali kelas</option>
                            <option value="{{ $guru->id }}" selected>{{ $guru->nama_lengkap }}</option>
                            @foreach ($guru as $g )
                                <option value="{{ $g->id }}">{{ $g->nama_lengkap }}</option>
                            @endforeach
                        </select>
                        @error('no_kelas')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">BK</label>
                        <select name="id_bk" class="form-control" id="">
                            <option value="" disabled>pilih guru bk</option>
                            <option value="{{ $guru->id }}" selected>{{ $guru->nama_lengkap }}</option>
                            @foreach ( $guru as $g)
                                <option value="{{ $g->id }}">{{ $g->nama_lengkap }}</option>
                            @endforeach
                        </select>
                        @error('id_jurusan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Keterangan</label>
                        <select name="status" class="form-control" id="">
                            <option value="" disabled>pilih keterangan</option>
                            <option value="{{ $rekap->id }}" selected>{{ $rekap->status }}</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                            <option value="alpa">Alpa</option>
                        </select>
                        @error('id_ajaran')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb3 col-lg4">
                        <label for="" class="w-100">Unggah Foto</label>
                        <input type="file" class="form-control" name="foto_surat" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection
