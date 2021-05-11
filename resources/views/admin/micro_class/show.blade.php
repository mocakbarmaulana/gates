@extends('layouts.admin')

@section('head')
<title>Micro Class</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('micro-class.index')}}">{{$active}}</a></li>
        <li class="breadcrumb-item active"><a>{{$microclass->name}}</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    @if (session('success'))
    <div class="alert alert-success mb-2" role="alert">
        {{session('success')}}
    </div>
    @endif

    <div class="inner-width">
        <div class="row py-3">
            <div class="col-6 d-flex justify-content-center">
                <div style="width: 90%">
                    <img src="{{asset('storage/assets/images/micro-class/'.$microclass->image)}}" alt="images-thumbnail"
                        class="img-thumbnail w-100">
                </div>
            </div>
            <div class="col-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <b>Name :</b>
                        {{$microclass->name}}
                    </li>
                    <li class="list-group-item">
                        <b>Description :</b>
                        {!!$microclass->description !!}
                    </li>
                    <li class="list-group-item">
                        <b>Skill :</b>
                        {{$microclass->skill->name}}
                    </li>
                    <li class="list-group-item">
                        <b>Subskill :</b>
                        {{$microclass->subskill->name}}
                    </li>
                    <li class="list-group-item">
                        <b>Link Typeform :</b>
                        <a href="{{$microclass->link}}" target="_blank">Open to typeform</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
