@extends('layout.index')


@section('content')
    <form action="/admin/jurusan/{{ $jurusan->id }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Jurusan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Jurusan</label>
                            <input name="nama_jurusan" type="text"
                                value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" placeholder="Nama Jurusan"
                                class="form-control text-uppercase">
                            @error('nama_jurusan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kode Jurusan</label>
                            <input name="kode_jurusan" type="text"
                                value="{{ old('kode_jurusan', $jurusan->kode_jurusan) }}" placeholder="Kode Jurusan"
                                class="form-control text-uppercase">
                            @error('kode_jurusan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
