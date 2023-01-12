@extends('layout.index')


@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Table</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
    </div>

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
                                class="form-control">
                            @error('nama_jurusan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kode Jurusan</label>
                            <input name="kode_jurusan" type="number"
                                value="{{ old('kode_jurusan', $jurusan->kode_jurusan) }}" placeholder="Kode Jurusan"
                                class="form-control">
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
