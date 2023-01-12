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
                        <h4>Guru</h4>
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
                        @foreach ($guru as $view)
                          <tr>
                          <td>{{ $view->nip }}</td>
                          <td>{{ $view->nama_lengkap }}</td>
                          <td>{{ $view->jk }}</td>
                          <td><div class="badge badge-success">{{ $view->tipe }}</div></td>
                          <td><a href="#" class="btn btn-secondary">Hapus</a></td>
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
