<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">

    @yield('head')
</head>

<body>

    @include('layouts.modules.navbar')

    @yield('content')

    @include('layouts.modules.mainfooter')

    {{-- Script JS --}}
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script>
        @yield('js')
    </script>
</body>

</html>
