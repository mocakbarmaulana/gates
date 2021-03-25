<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

    {{-- My Css --}}
    <link rel="stylesheet" href="{{asset('assets/css/cms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/global.css')}}">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">

    @yield('head')
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light" style="height: 60px">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{asset('assets/images/Logo.png')}}" alt="" style="width: 120px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('expert.login')}}">For Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('member.login')}}">For Learner</a>
                    </li> --}}
                    {{--
                    @if (Auth::guard('member')->check())
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-sm mx-4" href="#">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-sm mx-4" href="{{route('member.login')}}">Login /
                    Sign Up</a>
                    </li>
                    @endif --}}
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-between py-5">
            <div class="sidebar col-2 p-0 rounded">
                <x-main-sidebar :active="$active" />
            </div>
            <div class="main col-9 p-0 rounded">
                @yield('content')
            </div>
        </div>
    </div>

    @include('layouts.modules.mainfooter')


    {{-- Script js --}}
    <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('js')
</body>

</html>
