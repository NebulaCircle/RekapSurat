@extends('layout.index')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Siswa</a></div>
            </div>
        </div>
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="">
                    <a href="/admin/siswa/create" class="btn btn-success">Tambah Siswa</a>
                    <button type="button" class="btn btn-primary ml-3" data-toggle="modal"
                        data-target="#exampleModalCenter">
                        Import
                    </button>
                </div>

                <div class="d-flex align-items-center">
                    <form action="" class="" id="filter" method="get">
                        <input type="text" class="form-control" placeholder="Search..." name="q" id="">
                    </form>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Nis</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($siswa as $s)
                            <tr>
                                <td>{{ $loop->iteration + $siswa->perPage() * $siswa->currentPage() - $siswa->perPage() }}
                                </td>
                                <td>{{ $s->nama_lengkap }} </td>
                                <td>{{ $s->nis }}</td>
                                <td>{{ $s->jk }}</td>
                                {{-- @dd($s->kelas[0]->jurusan->nama_jurusan) --}}
                                <td>{{ $s->kelas[0]->tingkatan }} {{ $s->kelas[0]->jurusan->nama_jurusan }}
                                    {{ $s->kelas[0]->no_kelas }}
                                </td>
                                <td><a href="/admin/siswa/{{ $s->id }}/edit" class="btn btn-success">Edit</a>
                                    <form id="delete{{ $s->id }}" class="d-inline"
                                        action="/admin/siswa/{{ $s->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            data-confirm="Yakin?|Data yang di hapus tidak dapat di kembalikan?"
                                            data-confirm-yes="document.querySelector('#delete{{ $s->id }}').submit()">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center font-weight-bold">Tidak ada data (
                                    <b class="text-danger">pastikan sudah memilih tahun ajaran
                                        yang benar</b> )
                                </td>
                            </tr>
                        @endforelse

                    </table>
                </div>
            </div>

            <div class="card-footer text-right">
                {{ $siswa->links() }}
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Download contoh template excel</h5>
                    <a href="/templateExcel/siswa.xlsx" download class="btn btn-success">Download</a>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <div class="col">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Unggah file di sini</h5>
                    </div>
                    <form action="/import/siswa" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
