@extends('layout.index')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tahun Ajaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Tahun Ajaran</a></div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a href="/admin/tahun_ajaran/create" class="btn btn-success">Tambah Tahun Ajaran</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($tahunAjaran as $ta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ta->tahun_ajaran }}</td>
                                <td>{{ $ta->semester }}</td>
                                <td><a href="/admin/tahun_ajaran/{{ $ta->id }}/edit" class="btn btn-success">Edit</a>
                                    <form id="delete" class="d-inline" action="/admin/tahun_ajaran/{{ $ta->id }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            data-confirm="Yakin?|Data yang di hapus tidak dapat di kembalikan?"
                                            data-confirm-yes="document.querySelector('#delete').submit()">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                        @endforelse

                    </table>
                </div>
            </div>


            <div class="card-footer text-right">
                {{ $tahunAjaran->links() }}
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
                <div class="modal-body">
                    <form action="/import/guru" method="POST" enctype="multipart/form-data">
                        <input type="file" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
