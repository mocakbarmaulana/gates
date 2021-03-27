@extends('layouts.app')

@section('head')
<title>About Us</title>
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/career.css')}}">
@endsection

@section('content')
<div class="career">
    <div class="container text-center">
        <h1 class="fw-700">CAREERS</h1>
        <p>we are growing and we are always looking for great talents. Are you smart, talented, passionate and had
            working individual living in Singapore or Indonesia? Send us your CV at career@skillagogo.com</p>
    </div>
</div>

<div class="container career-business p-0 mb-5">
    <div class="title py-3 px-4">
        <h5>Bussines Development Director</h5>
    </div>
    <div class="text py-3 px-4">
        <p>Mandate: build market position by locating, developing, defining, negotiating and closing business
            relationship with content providers (e.g free lancers and educational instituions but also potential
            partners (e.g venue providers, transporation providers, etc.))</p>
    </div>
</div>
@endsection
