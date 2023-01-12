@extends('layout.index')


@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Guru</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Guru</div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <a href="/admin/guru/create" class="btn btn-success">Tambah Data</a>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>No</th>
                          <th>Nip</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Tipe</th>
                          <th>Action</th>
                        </tr>
                        @foreach ($guru as $g)
                          <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $g->nip }}</td>
                          <td>{{ $g->nama_lengkap }}</td>
                          <td>{{ $g->jk == "l" ? 'laki-laki' : 'perempuan' }}</td>
                          <td><div class="badge badge-success">{{ $g->tipe }}</div></td>
                          <td>
                            <a href="/admin/guru/{{ $g->id }}/edit" class="btn btn-success">Edit</a>
                            <form class="d-inline" action="/admin/guru/{{ $g->id }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
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
