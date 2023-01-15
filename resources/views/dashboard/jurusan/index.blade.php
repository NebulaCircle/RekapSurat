@extends('layout.index')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Jurusan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Jurusan</a></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <div class="group">
                            <a href="/admin/jurusan/create" class="btn btn-success m-2"> Tambah Jurusan</a>
                            <button type="button" class="btn btn-primary ml-1" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Import
                            </button>
                        </div>
                        <form action="/admin/jurusan" method="get">
                            <input type="text" value="{{ $q }}" name="q" placeholder="Cari..."
                                class="form-control " autofocus id="">
                        </form>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">


                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jurusan</th>
                                    <th>Kode Jurusan</th>
                                    <th>Action</th>
                                </tr>
                                @forelse ($jurusan as $j)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $j->nama_jurusan }}</td>
                                        <td>{{ $j->kode_jurusan }}</td>
                                        <td><a href="/admin/jurusan/{{ $j->id }}/edit"
                                                class="btn btn-success">Edit</a>
                                            <form id="delete" class="d-inline"
                                                action="/admin/jurusan/{{ $j->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    data-confirm="Yakin?|Data yang di hapus tidak dapat di kembalikan?"
                                                    data-confirm-yes="document.querySelector('#delete').submit()">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Data</td>
                                    </tr>
                                @endforelse
                            </table>

                        </div>
                    </div>
                    <div class="card-footer text-right">
                        {{ $jurusan->links() }}
                    </div>
                </div>
            </div>
    </section>



    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Unggah file di sini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/import/jurusan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
