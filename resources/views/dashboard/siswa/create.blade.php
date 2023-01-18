@extends('layout.index')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Siswa</h4>
        </div>
        <div class="card-body">
            <form action="/admin/siswa" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Nama Lengkap</label>
                        <input type="text" placeholder="Nama Lengkap" class="form-control" name="nama_lengkap"
                            id="">
                        @error('nama_lengkap')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Nis</label>
                        <input type="text" placeholder="NIS" class="form-control" name="nis" id="">
                        @error('nis')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Kelas</label>
                        <select name="id_kelas" id="" class="form-control">
                            <option value="" disabled>Pilih kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan->nama_jurusan }}
                                    {{ $k->no_kelas }}</option>
                            @endforeach
                        </select>
                        @error('id_kelas')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label class="w-100">Jenis Kelamin</label>
                        <input type="radio" name="jk" value="l" id=""> Laki-Laki
                        <input type="radio" name="jk" value="p" id=""> Perempuan
                        @error('jk')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection
