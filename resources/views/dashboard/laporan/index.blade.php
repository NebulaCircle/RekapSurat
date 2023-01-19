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
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-stats-title">Order rekap -
                        <div class="dropdown d-inline">
                            <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                id="orders-month">{{ !$fil ? $montNum[date('m')] : $montNum[$fil] }}</a>
                            <ul class="dropdown-menu dropdown-menu-sm">
                                <li class="dropdown-title">Select Month</li>
                                <li><a href="?fil=01" class="dropdown-item {{ $fil == '01' ? 'active' : '' }}">January</a>
                                </li>
                                <li><a href="?fil=02" class="dropdown-item {{ $fil == '02' ? 'active' : '' }}">February</a>
                                </li>
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
                                <li><a href="?fil=08" class="dropdown-item {{ $fil == '08' ? 'active' : '' }} ">August</a>
                                </li>
                                <li><a href="?fil=09" class="dropdown-item {{ $fil == '09' ? 'active' : '' }}">September</a>
                                </li>
                                <li><a href="?fil={{ 10 }}"
                                        class="dropdown-item {{ $fil == 10 ? 'active' : '' }}">October</a></li>
                                <li><a href="?fil={{ 11 }}"
                                        class="dropdown-item {{ $fil == 11 ? 'active' : '' }}">November</a></li>
                                <li><a href="?fil={{ 12 }}"
                                        class="dropdown-item {{ $fil == 12 ? 'active' : '' }}">December</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-5 d-flex text-center  chart-container" style="position: relative; height:100vh;">
                        <canvas id="myChart" class="mx-auto"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mt-5 d-flex text-center  chart-container" style="position: relative; height:100vh;">
                        <canvas id="myChart2" class="mx-auto"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <script src="{{ asset('chart') }}/Chart.min.js"></script>


    <script>
        let alpaPerBulan = JSON.parse(`<?php echo $alpaPerBulan; ?>`)
        let sakitPerBulan = JSON.parse(`<?php echo $sakitPerBulan; ?>`)
        let izinPerBulan = JSON.parse(`<?php echo $izinPerBulan; ?>`)
        let terlambatPerBulan = JSON.parse(`<?php echo $terlambatPerBulan; ?>`)
        let array = JSON.parse(`<?php echo json_encode($array); ?>`)

        const ctx = document.getElementById('myChart');

        let month = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];



        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Sakit', 'Izin', 'Alpa', 'Terlambat'],
                datasets: [{
                    label: 'Total data',
                    data: [sakitPerBulan, izinPerBulan, alpaPerBulan, terlambatPerBulan],
                    borderWidth: 1,
                    // backgroundColor: ['rgba(71, 195, 99, 1)',
                    //     'rgba(103, 119, 239,1)',
                    //     'rgba(153, 102, 255, 0.8)',
                    //     'rgba(255, 159, 64, 0.8)'
                    // ],

                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('myChart2');

        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: month,
                datasets: [{
                        label: 'Sakit',
                        data: array['sakit'],
                        borderWidth: 1,
                        // backgroundColor: ['#47c363']
                    },
                    {
                        label: 'Izin',
                        data: array['izin'],
                        borderWidth: 1,
                        // backgroundColor: ['#6777ef']

                    }, {
                        label: 'Alpa',
                        data: array['alpa'],
                        borderWidth: 1,
                        // backgroundColor: ['#6777ef']

                    }, {
                        label: 'Terlambat',
                        data: array['terlambat'],
                        borderWidth: 1,
                        // backgroundColor: ['#6777ef']

                    }
                ]
            },
            options: {
                responsive: true,


                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }

            }
        });
    </script>
@endsection
