@extends('layout.index')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Rekap Surat</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Rekap Surat</a></div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a href="/admin/rekap/create" class="btn mr-2 btn-success">Tambah Data</a>
                <a href="/export/rekap" class="btn btn-primary">Export</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>No</th>
                            <th>Siswa</th>
                            <th>Kelas</th>
                            <th>Guru Bk</th>
                            <th>Wali Kelas</th>
                            <th>Tahun Ajaran</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($rekap as $r)
                            <tr>
                                <td>{{ $loop->iteration + $rekap->perPage() * $rekap->currentPage() - $rekap->perPage() }}
                                <td>{{ $r->siswa->nama_lengkap }}</td>
                                <td>{{ $r->siswa->kelas[0]->tingkatan }} {{ $r->siswa->kelas[0]->jurusan->kode_jurusan }}
                                    {{ $r->siswa->kelas[0]->no_kelas }}</td>
                                <td>{{ $r->siswa->kelas[0]->bk->nama_lengkap }}</td>
                                <td>{{ $r->siswa->kelas[0]->walikelas->nama_lengkap }}</td>
                                <td>{{ $r->tahunAjaran->tahun_ajaran }} {{ $r->tahunAjaran->semester }}</td>
                                <td>{{ $r->status }}</td>
                                <td>{{ date('d / m / Y H:i:s', strtotime($r->tanggal)) }}</td>
                                <td class="d-flex "><a href="/admin/rekap/{{ $r->id }}/edit"
                                        class="btn btn-success mr-2">Edit</a>
                                    <form id="delete{{ $r->id }}" class="d-inline "
                                        action="/admin/rekap/{{ $r->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mr-2"
                                            data-confirm="Yakin?|Data yang dihapus tidak dapat dikembalikan?"
                                            data-confirm-yes="document.querySelector('#delete{{ $r->id }}').submit()">Hapus</button>
                                    </form>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#detail{{ $r->id }}">
                                        Detail
                                    </button>
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center font-weight-bold">Tidak ada data (
                                    <b class="text-danger">pastikan sudah memilih tahun ajaran
                                        yang benar</b> )
                                </td>
                            </tr>
                        @endforelse

                    </table>
                </div>
                <div class="card-footer text-right">
                    {{ $rekap->links() }}
                </div>
            </div>



        </div>
    </section>


    @foreach ($rekap as $r)
        <div class="modal fade" id="detail{{ $r->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    {{-- <img src="{{ Storage::disk('google')->url($r->foto_surat) }}" class="img-fluid" alt=""> --}}
                    <img src="{{ asset('file-surat') }}/{{ $r->foto_surat }}" class="img-fluid" alt="">

                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal -->
@endsection
