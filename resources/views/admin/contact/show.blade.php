@extends('layouts.admin')

@section('head')
<title>Detail Message | {{$message->name}}</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('contact.index')}}">{{$active}}</a></li>
        <li class="breadcrumb-item active"><a>Detail</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    <div class="container">
        <div class="text-center">
            <h1>Message</h1>
        </div>
        <div class="m-auto bg-white border rounded p-3 position-relative" style="width: 600px; min-height: 500px">
            <ul class="list-unstyled position-relative">
                <li class="py-2 border-bottom">
                    <b>Name : </b>
                    {{$message->name}}
                </li>
                <li class="py-2 border-bottom">
                    <b>Email : </b>
                    {{$message->email}}
                </li>
                <li class="py-2 border-bottom">
                    <b>Mobile Phone : </b>
                    {{$message->mobile_phone}}
                </li>
                <li class="py-2">
                    <b>Message : </b><br>
                    <p>
                        {{$message->message}}
                    </p>
                </li>
            </ul>
            <a href="{{route('contact.index')}}" class="btn btn-info position-absolute" style="bottom: 10px">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>
@endsection
