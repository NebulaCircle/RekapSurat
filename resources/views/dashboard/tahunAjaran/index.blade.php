@extends('layout.index')


@section('content')
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
                            <td>{{ $ta->tahun_ajaran_awal }} / {{ $ta->tahun_ajaran_akhir }}</td>
                            <td>{{ $ta->semester }}</td>
                            <td><a href="/admin/tahun_ajaran/{{ $ta->id }}/edit" class="btn btn-success">Edit</a>
                                <form class="d-inline" action="/admin/tahun_ajaran/{{ $ta->id }}" method="post">
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
