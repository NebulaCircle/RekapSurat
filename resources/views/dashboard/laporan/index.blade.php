@extends('layout.index')


@section('content')
    <div class="mt-5 d-flex text-center  chart-container" style="position: relative; height:80vh;">
        <canvas id="myChart" class="mx-auto"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue', 's'],
                datasets: [{
                    label: 'Total data',
                    data: [12, 19, 20],
                    borderWidth: 1
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
    </script>
@endsection
