@extends('layouts.app')

@section('head')
<title>Home</title>
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
@endsection

@section('content')
<div class="container h-100 d-flex align-items-center my-5">
    <div class="course-one w-100">
        <div class="course-head">
            <div class="course-title">
                <h3 class="mb-1"><strong>On Demand</strong> Workshop</h3>
                <p>Learn in demand skills at your convience</p>
            </div>
            <div class="row">
                <div class="col d-flex align-items-center justify-content-end">
                    <label class="font-weight-bold text-secondary">Skill :</label>
                </div>
                <div class="col-3">
                    <form action="" id="form" method="GET">
                        <select name="q" class="custom-select mb-3 input-mint">
                            <option value="">All</option>
                            @foreach ($skills as $skill)
                            <option value="{{$skill->id}}" @if ($skill->id == $q) selected @endif>{{$skill->name}}
                            </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="course-body py-4 bg-mint rounded">
            <div class="row">
                @if (!$courses->isEmpty())
                @foreach ($courses as $course)
                <div class="col-4 px-2 d-flex justify-content-center">
                    <div class="bg-white p-3 rounded" style="width: 300px">
                        <div class="course-image">
                            <img src="{{asset('storage/assets/images/course/'.$course->image_course)}}"
                                class="img-thumbnail img-course" style="height: 200px; width: 263px">
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <div class="">
                                <span class="text-secondary">{{$course->skill->name}}</span>
                            </div>
                            <div class="">
                                <span class="badge badge-pill badge-info">1 / 60</span>
                            </div>
                        </div>
                        <div class="info-course mt-2 d-flex justify-content-between">
                            <div class="mr-3">
                                <h5 style="min-height: 80px"><b>{{$course->name}}</b></h5>
                                <p class="mb-0">{{$course->teacher}}</p>
                                <span
                                    class="text-warning font-weight-bold">{{date('d/m/Y', strtotime($course->course_details[0]->event_date))}}</span>
                            </div>
                            <div class="align-self-end" style="width: 70px">
                                <a href="{{route('home.detail', $course->id)}}" class="btn btn-mint btn-sm"
                                    style="width: 65px">Order</a>
                                {{-- <a href="#" class="btn btn-mint btn-sm" style="width: 65px">Owned</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col px-4">
                    <div class="alert alert-warning text-center" role="alert">
                        Belum ada workshop
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>

<div class="container">
    {{$courses->links()}}
</div>
@endsection

@section('js')
<script>
    $(".input-mint").on('change', function(){
        $("#form").submit();
    })
</script>
@endsection
