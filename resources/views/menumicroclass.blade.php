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
                <h3 class="mb-1"><strong>Free</strong> Micro Classes</h3>
                <p>Learn micro classes for level up your skills</p>
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
                @forelse ($microclasses as $microclass)
                <div class="col-4 px-2 d-flex justify-content-center">
                    <div class="bg-white p-3 rounded" style="width: 300px">
                        <div class="course-image">
                            <img src="{{asset('storage/assets/images/micro-class/'.$microclass->image)}}"
                                class="img-thumbnail img-course" style="height: 250px; width: 263px">
                        </div>
                        <div class="info-course mt-2 text-center">
                            <h5 style="min-height: 50px"><b>{{ucwords($microclass->name)}}</b></h5>
                            <div class="w-100">
                                <a href="{{route('member.getmicroclassdetail', $microclass->id)}}"
                                    class="btn btn-mint btn-sm btn-block">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>Tidak ada micro class.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

</div>

<div class="container">
    {{-- {{$courses->links()}} --}}
</div>
@endsection

@section('js')
<script>
    $(".input-mint").on('change', function(){
        $("#form").submit();
    })
</script>
@endsection
