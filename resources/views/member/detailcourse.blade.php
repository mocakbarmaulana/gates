@extends('layouts.member')

@section('head')
<title>{{$course->course->name}} | Detail Course</title>
@endsection

@section('content')
<div class="p-4">
    <h1>{{$course->course->name}}</h1>
    <div class="row mt-4">
        <div class="col">
            <img src="{{asset('storage/assets/images/course/'.$course->course->image_course)}}" height="400px"
                alt="image-course" width="100%">
        </div>
        <div class="col-4">
            <ul class="list-unstyled">
                <li class="mb-3"><b>Event Date :</b><br>
                    {{date('l', strtotime($course->course_detail->event_date))}},
                    {{date('d-m-Y', strtotime($course->course_detail->event_date))}}
                </li>
                <li class="mb-3"><b>Event Time :</b><br>
                    {{$course->course_detail->event_time}} WIB
                </li>
                <li class="mb-3"><b>Type Workshop :</b><br>
                    {{$course->course->event}}
                </li>
                @if ($course->course->event == 'online')
                <li class="mb-3"><b>Link :</b><br>
                    {{$course->course_detail->link}}
                </li>
                @else
                <li class="mb-3"><b>Event Location :</b><br>
                    {{$course->course_detail->event_location}}
                </li>
                @endif
                <li class="mb-3"><b>Teacher Workshop :</b><br>
                    {{$course->course->teacher}}
                </li>
            </ul>
        </div>
    </div>
    <div class="row my-3">
        <div class="col">
            <b>Description :</b>
            <p>{{$course->course->description}}</p>
        </div>
    </div>
</div>
@endsection
