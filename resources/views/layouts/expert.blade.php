<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">

    {{-- My Css --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/cms.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/expert.css')}}">

    @yield('head')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="height: 60px">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{asset('assets/images/Logo2.png')}}" alt="" style="width: 120px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="{{route('expert.class')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-4 text-white" href="{{route('expert.logout')}}">Log Out <i
                                class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        @yield('content')
    </div>

    @include('layouts.modules.mainfooter')


    {{-- JScript JS --}}
    <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>

    {{-- Bootstrap 4 --}}
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('js')
</body>

</html>
