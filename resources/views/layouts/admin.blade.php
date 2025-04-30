<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    {{-- Font Awesome + Google Fonts --}}
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Material Dashboard CSS --}}
    <link href="{{ asset('admin/assets/css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/material-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/material-dashboard.css.map') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/material-dashboard.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/nucleo-svg.css') }}">


    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

    {{-- Bootstrap 4, DataTables, Select2 --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- Custom CSS --}}
    <style>
        .fixed-plugin .card {
            display: none;
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 1031;
            transition: all 0.3s ease;
        }

        .fixed-plugin .card.show-settings {
            display: block;
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-200">
    @include('layouts.inc.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('layouts.inc.navBar')

        @yield('content')

        {{-- Toast notifications --}}
        @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    toastr.success("{{ session('success') }}", "Success");
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    toastr.error("{{ session('error') }}", "Error");
                });
            </script>
        @endif

        @if ($errors->any())
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    @foreach ($errors->all() as $error)
                        toastr.error("{{ $error }}", "Error");
                    @endforeach
                });
            </script>
        @endif
    </main>

    @include('layouts.inc.settings')

    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- Dashboard JS --}}
    <script src="{{ asset('admin/assets/js/plugins/chartjs.min.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/material-dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/material-dashboard.js.map') }}"></script>
    <script src="{{ asset('admin/assets/js/material-dashboard.min.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const settingsButton = document.querySelector('.fixed-plugin-button');
            const pluginCard = document.querySelector('.fixed-plugin .card');
            const closeButton = document.querySelector('.fixed-plugin-close-button');

            if (settingsButton && pluginCard && closeButton) {
                settingsButton.addEventListener('click', () => {
                    pluginCard.classList.toggle('show-settings');
                });

                closeButton.addEventListener('click', () => {
                    pluginCard.classList.remove('show-settings');
                });
            }
        });

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
        };
    </script>

    @stack('scripts')

    @if (session('status'))
        <script>
            swal("Done!", "{{ session('status') }}", "success");
        </script>
    @endif
</body>

</html>
