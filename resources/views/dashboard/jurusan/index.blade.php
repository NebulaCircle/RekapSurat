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
<<<<<<< HEAD
                    <div class="table-responsive">
                      <a href="/admin/jurusan"><button class="btn btn-primary m-3" type="submit">Tambah Data</button></a>
                      <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModalCenter">
                        Import
                      </button>
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>No</th>
                          <th>Nama Jurusan</th>
                          <th>Kode Jurusan</th>
                          <th>Action</th>
                        </tr>
                        {{-- @foreach ($jurusan as $view)
                        <tr>
                          <td>{{ $view-> }}</td>
                          <td>{{ $view-> }}</td>
                          <td>{{ $view-> }}</td>
                          <td><div class="badge badge-success">{{ $view->tipe }}</div></td>
                          <td><a href="#" class="btn btn-secondary">Hapus</a></td>
                        </tr>
                        @endforeach --}}
                      </table>
=======
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
                                @foreach ($jurusan as $j)
                                    <tr>
                                        <td>{{ $j->id }}</td>
                                        <td>{{ $j->nama_jurusan }}</td>
                                        <td>{{ $j->kode_jurusan }}</td>
                                        <td><a href="/admin/jurusan/{{ $j->id }}/edit"
                                                class="btn btn-success">Edit</a>
                                            <form class="d-inline" action="/admin/jurusan/{{ $j->id }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
>>>>>>> f34cb7c4468103b7f24f072cace9f502d0d4dd18
                    </div>
                </div>
            </div>
<<<<<<< HEAD
        </section>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Unggah file di sini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/import/jurusan" method="POST" enctype="multipart/form-data">
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
=======
        </div>
    </section>
>>>>>>> f34cb7c4468103b7f24f072cace9f502d0d4dd18
@endsection
