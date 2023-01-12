@extends('layout.index')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Jurusan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="/admin/jurusan/create"><button class="btn btn-primary m-3" type="submit">Tambah
                                    Data</button></a>
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jurusan</th>
                                    <th>Kode Jurusan</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($jurusan as $view)
                                    <tr>
                                        <td>{{ $view->id }}</td>
                                        <td>{{ $view->nama_jurusan }}</td>
                                        <td>{{ $view->kode_jurusan }}</td>
                                        <td><a href="/admin/jurusan{{ $view->id }}" class="btn btn-danger">Hapus</a>
                                            <a href="#" class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
