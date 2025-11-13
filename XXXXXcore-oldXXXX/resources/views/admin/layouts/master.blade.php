<!doctype html>
<html class="no-js" lang="zxx" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'UpSkill HRMS')</title>
    <meta name="description" content="@yield('meta_description', '')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-style-mode" content="1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/favicon.svg') }}">
    <style>
        i.ti {
            font-size: 20px;
        }
    </style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nano.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/tabler-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    @stack('styles')
</head>

<body class="body-area">

    <div class="page">
        @if (Auth::check())
            {{-- Sidebar --}}
            @include('admin.layouts.partials.sidebar')

            {{-- Header --}}
            @include('admin.layouts.partials.header')

            {{-- Main Content Area --}}
            <div class="app-content-area">
                <div class="app-content-wrap">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            @include('admin.layouts.partials.footer')
        @else
            {{-- If not authenticated, show content only --}}
            @yield('content')
        @endif
    </div>

    <!-- JS Files -->
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar-active.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/height-equal.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/isotope.pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/backtotop.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTable-active.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sidebar.js') }}"></script>
    @stack('scripts')
</body>

</html>
