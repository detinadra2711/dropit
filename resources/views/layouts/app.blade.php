<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
{{-- Navbar Component --}}
<x-navbar />

{{-- Main Content--}}
<main class="flex-grow-1">
    @yield('content')
</main>

{{-- Footer Component --}}
<x-footer />

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $("#list-file").DataTable();
    });
</script>
<!-- Sweetalert2 -->
@include('sweetalert::alert')
<!-- Custom JS -->
@stack('script')
</body>
</html>
