@extends('layout.index')


@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/admin/siswa/create" class="btn btn-success">Tambah Siswa</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Nisn</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($siswa as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->nama_lengkap }} </td>
                            <td>{{ $s->nisn }}</td>
                            <td>{{ $s->jk }}</td>
                            <td>{{ $s->kelas->kelas }} {{ $s->kelas->jurusan->nama_jurusan }} {{ $s->kelas->no_kelas }}</td>
                            <td><a href="/admin/tahun_ajaran/{{ $s->id }}/edit" class="btn btn-success">Edit</a>
                                <form class="d-inline" action="/admin/tahun_ajaran/{{ $s->id }}" method="post">
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
        </div>

        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>

                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
