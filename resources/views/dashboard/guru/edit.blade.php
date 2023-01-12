@extends('layout.index')


@section('content')
<section class="section">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <form action="/admin/guru/{{ $guru->id }}" method="POST">
                    @csrf
                    <div class="card-header">
                      <h4>Edit Guru</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nip</label>
                                <input type="text" class="form-control" value="{{ $guru->nip }}" required="">
                                @error('nip')
                                  <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                         <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="{{ $guru->nama_lengkap }}" required="">
                                @error('nama_lengkap')
                                  <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-6">
                           
                                <div class="form-group">
                        <label class="w-100">Jenis kelamin</label>
                        <input type="radio" name="jk" {{ $guru->jk == "l" ? 'checked' : '' }} value="l"> laki-laki
                        <input type="radio" name="jk" class="ml-3" {{ $guru->jk == "p" ? 'checked' : '' }}  value="p"> Perempuan
                        @error('jk')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                        <label class="w-100">Tipe</label>
                        <input type="radio" name="tipe" {{ $guru->tipe == "walikelas" ? 'checked' : '' }} value="laki-laki"> Wali Kelas
                        <input type="radio" name="tipe" class="ml-3" {{ $guru->tipe == "bk" ? 'checked' : '' }} value="perempuan"> Bimbingan Konseling
                        @error('tipe')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </section>
@endsection
