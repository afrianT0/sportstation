<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | {{ $title }}</title>

    {{-- Style --}}
    @include('layouts.css')
    @yield('style')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- Navbar --}}
        @include('layouts.header')

        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main --}}
        @yield('content')

        {{-- Footer --}}
        @include('layouts.footer')

    </div>

    {{-- Script --}}
    @include('layouts.script')
    @yield('script')
    <script>
        @if (session()->has('loginError'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error('{{ session('loginError') }}');
        @elseif (session()->has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success('{{ session('success') }}');
        @endif
    </script>
</body>

</html>
