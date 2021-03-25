@extends('layouts.expert')

@section('head')
<title>Expert Class</title>
@endsection

@section('content')
<div class="row">
    <div class="col-4 d-flex justify-content-center align-items-center" style="height: 400px">
        <a href="{{route('expert.class.create')}}" class="text-dark-blue">
            <div class="card my-3 shadow" style="height: 400px; width: 250px">
                <div class="card-body d-flex justify-content-center align-items-center text-center">
                    <div>
                        <i class="fas fa-plus-circle fa-9x"></i>
                        <p class="my-2 font-weight-bold">Tambah Workshop</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    @foreach ($courses as $course)
    <div class="col-4 mb-5 d-flex justify-content-center align-items-center" style="height: 400px">
        <div class="card my-3 shadow" style="height: 400px; width: 250px">
            <div class="box-image">
                <img src="{{asset('storage/assets/images/course/'.$course->image_course)}}" alt="image-course"
                    class="bordere img-thumbnail">
                <div class="box-title p-3 position-relative">
                    <h5>{{$course->name}}</h5>
                </div>
                <div class="px-3 position-absolute w-100 mb-3" style="bottom: 0">
                    <a href="{{route('expert.class.show', $course->id)}}"
                        class="btn btn-sm btn-info btn-block">Detail</a>
                    <a href="{{route('expert.class.edit', $course->id)}}"
                        class="btn btn-sm btn-warning btn-block">Edit</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('js')

@endsection
