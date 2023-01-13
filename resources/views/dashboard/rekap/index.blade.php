@extends('layout.index')


@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/admin/rekap/create" class="btn btn-success">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Bk</th>
                        <th>Wali Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($rekap as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->siswa->nama_lengkap }}</td>
                            <td>{{ $r->bk->nama_lengkap }}</td>
                            <td>{{ $r->walikelas->nama_lengkap }}</td>
                            <td>{{ $r->tahunAjaran->tahun_ajaran }}</td>
                            <td>{{ $r->status }}</td>
                            <td>{{ date('d / m / Y', strtotime($r->tanggal)) }}</td>

                            <td><a href="/admin/tahun_ajaran/{{ $r->id }}/edit" class="btn btn-success">Edit</a>
                                <form class="d-inline" action="/admin/tahun_ajaran/{{ $r->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                    @endforelse

                </table>
            </div>
            <div class="card-footer text-right">
                {{ $rekap->links() }}
            </div>
        </div>


    </div>

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
