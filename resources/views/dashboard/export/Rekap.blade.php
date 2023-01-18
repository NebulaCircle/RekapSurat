@extends('layout.index')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Export Rekap</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Guru</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Export berdasarkan bulan</h5>
                        <p>Pilih kelas dan bulan untuk mencetak data rekap</p>
                        <form action="/export/rekap/post" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3">
                                    <select name="id_kelas" id="" class="form-control form-autocompelet">
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id }}">{{ $k->tingkatan }}
                                                {{ $k->jurusan->nama_jurusan }}
                                                {{ $k->no_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <select name="bulan" id="" class="form-control form-autocompelet">
                                        <option value="" disabled selected>Pilih Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktber</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <select name="tahun_ajaran" id="" class="form-control form-autocompelet">
                                        <option value="" disabled selected>Pilih Tahun ajaran</option>
                                        @foreach ($tahunAjaran as $ta)
                                            <option value="{{ $ta->id }}">{{ $ta->tahun_ajaran }} {{ $ta->semester }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-success">Export</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Export berdasarkan tahun ajaran</h5>
                        <p>Pilih kelas dan tahun ajaran untuk mencetak data rekap</p>
                        <form action="/export/rekap/post" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <select name="id_kelas" id="" class="form-control form-autocompelet">
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id }}">{{ $k->tingkatan }}
                                                {{ $k->jurusan->nama_jurusan }}
                                                {{ $k->no_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select name="tahun_ajaran" id="" class="form-control form-autocompelet">
                                        <option value="" disabled selected>Pilih Tahun ajaran</option>
                                        @foreach ($tahunAjaran as $ta)
                                            <option value="{{ $ta->id }}">{{ $ta->tahun_ajaran }}
                                                {{ $ta->semester }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <button type="submit" class="btn btn-success">Export</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
