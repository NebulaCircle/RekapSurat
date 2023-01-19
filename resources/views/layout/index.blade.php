<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem informasi BEKA</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('bootstrap') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('icons') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('icons') }}/css/all.css">

    <link rel="stylesheet" href="{{ asset('select2/dist/css/select2.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/components.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body class="antialiased">
    @include('sweetalert::alert')


    <div id="app">
        <div class="main-wrapper">
            @include('layout.navbar')
            @include('layout.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div>Support by <b>Smakensa.</b>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="{{ asset('popper') }}/poper.js"></script>
    <script src="{{ asset('nisecroll') }}/nise.min.js"></script>
    <script src="{{ asset('template') }}/assets/js/stisla.js"></script>





    <!-- JS Libraies -->
    <script src="{{ asset('select2') }}/dist/js/select2.min.js"></script>
    <script src="{{ asset('chart') }}/Chart.bundle.min.js"></script>
    <script src="{{ asset('chart') }}/Chart.extension.js"></script>
    <script src="{{ asset('bootstrap') }}/js/bootstrap.min.js"></script>
    <!-- Template JS File -->
    <script src="{{ asset('template') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('template') }}/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('template') }}/assets/js/page/index.js"></script>
    <script>
        $(document).ready(function() {
            $('.form-autocompelet').select2();
        });
    </script>
</body>

</html>
