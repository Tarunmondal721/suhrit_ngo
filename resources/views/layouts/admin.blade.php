<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>


    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <link href="{{ asset('admin/assets/css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- jQuery (Required for AJAX and Toastr) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">

    @include('layouts.inc.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.inc.navBar')
        @yield('content')
        @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                toastr.success("{{ session('success') }}", "Success");
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}", "Error");
                @endforeach
            });
        </script>
    @endif
    </main>
    @include('layouts.inc.settings')
    @yield('css')
    @yield('scripts')


    <script src="{{ asset('admin/assets/js/plugins/chartjs.min.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/plugins/smooth-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}" defer></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->

    {{-- <script src="{{asset('assets/js/material-dashboard.min.js?v=3.0.4')}}" defer></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @stack('scripts')

    @if (session('status'))
        <script>
            swal("Done!", "{{ session('status') }}", "success");
        </script>
    @endif
</body>

</html>
