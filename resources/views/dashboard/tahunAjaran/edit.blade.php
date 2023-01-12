@extends('layout.index')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Tahun Ajaran</h4>
        </div>
        <div class="card-body">
            <form action="/admin/tahun_ajaran/{{ $tahunAjaran->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Tahun Ajaran Awal</label>
                        <input type="text" value="{{ $tahunAjaran->tahun_ajaran_awal }}" class="form-control"
                            name="tahun_ajaran_awal" id="">
                        @error('tahun_ajaran_awal')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Tahun Ajaran Akhir</label>
                        <input type="text" value="{{ $tahunAjaran->tahun_ajaran_akhir }}" class="form-control"
                            name="tahun_ajaran_akhir" id="">
                        @error('tahun_ajaran_akhir')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Semester</label>
                        <select name="semester" class="form-control" id="">
                            <option value="" disabled> Pilih Semester</option>
                            <option value="{{ $tahunAjaran->semester }}">{{ $tahunAjaran->semester }}</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                        @error('semester')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection
