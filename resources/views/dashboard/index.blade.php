@extends('layout.index')


@section('content')
    @php
        $montNum = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        
    @endphp
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Order rekap -
                            <div class="dropdown d-inline">
                                <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                    id="orders-month">{{ !$fil ? $montNum[date('m')] : $montNum[$fil] }}</a>
                                <ul class="dropdown-menu dropdown-menu-sm">
                                    <li class="dropdown-title">Select Month</li>
                                    <li><a href="?fil=01"
                                            class="dropdown-item {{ $fil == '01' ? 'active' : '' }}">January</a></li>
                                    <li><a href="?fil=02"
                                            class="dropdown-item {{ $fil == '02' ? 'active' : '' }}">February</a></li>
                                    <li><a href="?fil=03" class="dropdown-item {{ $fil == '03' ? 'active' : '' }}">March</a>
                                    </li>
                                    <li><a href="?fil=04" class="dropdown-item {{ $fil == '04' ? 'active' : '' }}">April</a>
                                    </li>
                                    <li><a href="?fil=05" class="dropdown-item {{ $fil == '05' ? 'active' : '' }}">May</a>
                                    </li>
                                    <li><a href="?fil=06" class="dropdown-item {{ $fil == '06' ? 'active' : '' }}">June</a>
                                    </li>
                                    <li><a href="?fil=07" class="dropdown-item {{ $fil == '07' ? 'active' : '' }}">July</a>
                                    </li>
                                    <li><a href="?fil=08"
                                            class="dropdown-item {{ $fil == '08' ? 'active' : '' }} ">August</a></li>
                                    <li><a href="?fil=09"
                                            class="dropdown-item {{ $fil == '09' ? 'active' : '' }}">September</a></li>
                                    <li><a href="?fil={{ 10 }}"
                                            class="dropdown-item {{ $fil == 10 ? 'active' : '' }}">October</a></li>
                                    <li><a href="?fil={{ 11 }}"
                                            class="dropdown-item {{ $fil == 11 ? 'active' : '' }}">November</a></li>
                                    <li><a href="?fil={{ 12 }}"
                                            class="dropdown-item {{ $fil == 12 ? 'active' : '' }}">December</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $izin }}</div>
                                <div class="card-stats-item-label">Izin</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $sakit }}</div>
                                <div class="card-stats-item-label">Sakit</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $alpa }}</div>
                                <div class="card-stats-item-label">Alpa</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Orders</h4>
                        </div>
                        <div class="card-body">
                            59
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="balance-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Siswa</h4>
                        </div>
                        <div class="card-body">
                            {{ $siswa }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="sales-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-atom"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Jurusan</h4>
                        </div>
                        <div class="card-body">
                            {{ $jurusan }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
