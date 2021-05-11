@extends('layouts.member')

@section('head')
<title>Course</title>
<link rel="stylesheet" href="{{asset('assets/css/member/member.css')}}">
@endsection

@section('content')
<div class="p-4">
    <div class="row">
        <div class="col">
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
    </div>

    <style>
        .wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            row-gap: 1em;
            column-gap: 10px;
        }

        .nothing {
            position: absolute;
            left: 50%;
            transform: translate(-50%, 0);
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="wrapper">
                @forelse($courses as $course)
                <div class="card shadow">
                    <a href="{{route('member.getdetailcourse', $course->id)}}">
                        <div class="card-body course-content">
                            <div class="image-thumb" style="width: 100%; height: 200px">
                                <img src="{{asset('storage/assets/images/course/'.$course->image_course)}}"
                                    alt="image-course" class="img-course" style="width: 100%; height: 100%">
                            </div>
                            <h5 class="my-2">{{$course->name}}</h5>
                        </div>
                    </a>
                </div>
                @empty
                <div class="text-center nothing">
                    <span>Tidak ada data</span>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(".input-mint").on('change', function(){
        $("#form").submit();
    })
</script>
@endsection
