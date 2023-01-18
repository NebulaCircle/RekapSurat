@extends('layout.index')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kelas</a></div>
            </div>
        </div>
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="">
                    <a href="/admin/kelas/create" class="btn btn-success">Tambah Kelas</a>
                    <button type="button" class="btn btn-primary ml-3" data-toggle="modal"
                        data-target="#exampleModalCenter">
                        Import
                    </button>
                </div>
                {{-- <form action="/admin/kelas" method="get">
                    <button class="btn btn-warning"><span class="">Filter <i class="fa fa-bars"></i></span></button>
                </form> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>No</th>
                            <th>Tingkatan</th>
                            <th>No Kelas</th>
                            <th>Jurusan</th>
                            <th>Tahun Ajaran</th>
                            <th>Action</th>
                        </tr>

                        @forelse ($kelas as $k)
                            <tr>
                                <td>{{ $loop->iteration + $kelas->perPage() * $kelas->currentPage() - $kelas->perPage() }}

                                <td>{{ $k->tingkatan }}</td>
                                <td>{{ $k->no_kelas }}</td>
                                <td>{{ $k->jurusan->nama_jurusan }}</td>
                                <td>{{ $k->tahunAjaran->tahun_ajaran }} {{ $k->tahunAjaran->semester }}</td>
                                <td><a href="/admin/kelas/{{ $k->id }}/edit" class="btn btn-success">Edit</a>
                                    <form id="delete{{ $k->id }}" class="d-inline"
                                        action="/admin/kelas/{{ $k->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            data-confirm="Yakin?|Data yang di hapus tidak dapat di kembalikan?"
                                            data-confirm-yes="document.querySelector('#delete{{ $k->id }}').submit()">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data (
                                    pastikan sudah memilih tahun ajaran
                                    yang benar)</td>
                            </tr>
                        @endforelse

                    </table>
                </div>
                <div class="card-footer text-right">
                    {{ $kelas->links() }}
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
                <form action="/import/kelas" method="POST" enctype="multipart/form-data">
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
