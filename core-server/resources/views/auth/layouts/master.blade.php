<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- meta --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Dynamic Meta --}}
    @stack('meta')

    <title>@yield('title', 'Digital Business Card')</title>

    {{-- Common Styles --}}
    <link rel="stylesheet" href="{{ asset('main/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/fonts.css') }}">

    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('main/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('main/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('main/images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('main/images/site.webmanifest') }}">

    {{-- Page Specific Styles --}}
    @stack('styles')
</head>

<body class="flex items-center justify-center min-h-screen p-4 bg-body">

    {{-- Page Content --}}
    @yield('content')

    {{-- Page Specific Scripts --}}
    @stack('scripts')
<script src="{{ asset('main/js/browser@4.js') }}"></script>
</body>
</html>
