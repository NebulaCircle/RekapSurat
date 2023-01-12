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
<<<<<<< HEAD
                        <a href="/admin/jurusan" class="btn btn-success m-3"> Tambah Jurusan</a>
                        <button type="button" class="btn btn-primary ml-3" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Import
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-md">
=======
                        <a href="/admin/jurusan/create" class="btn btn-success m-2"> Tambah Jurusan</a>
     <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#exampleModalCenter">
                        Import
                      </button>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                     
                 
                     <table class="table table-bordered table-md">
>>>>>>> 8c2e6e755ddce21314195e4d15fffc11b63ae793
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
<<<<<<< HEAD
                        </div>
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
    </div>
    </section>
=======
                    </div>
                </div>
            </div>
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
>>>>>>> 8c2e6e755ddce21314195e4d15fffc11b63ae793
@endsection
