@extends('layouts.app')

@section('head')
<title>Detail Micro Class</title>
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/styleDetail.css')}}">
@endsection

@section('content')
<div class="container py-5" style="min-height: 40vh">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif

    <div>
        <a href="{{url()->previous()}}" class="btn btn-sm btn-secondary" style="width: 100px">
            <i class="fas fa-arrow-circle-left"></i>
            Back
        </a>
    </div>

    <div class="row mb-5 mt-3">
        <div class="col-8">
            <img src="{{asset('storage/assets/images/micro-class/'.$microclass->image)}}" width="100%" height="540px"
                alt="detail-image-course" class="rounded detail img-thumbnail">
        </div>
        <div class="col-4 rounded p-3 border-mint">
            <h3>Detail Micro Class</h3>

            <div class="d-flex flex-column justify-content-between" style="height: 450px">
                <ul class="list-unstyled">
                    <li class="my-3">
                        <p class="m-0"><strong>Title : </strong></p>
                        <h5>{{ ucwords($microclass->name) }}</h5>
                    </li>
                    <li class="my-3">
                        <p class="m-0"><strong>Skill : </strong></p>
                        <span>{{ $microclass->skill->name }}</span>
                    </li>
                    <li class="my-3">
                        <p class="m-0"><strong>Subskill : </strong></p>
                        <span>{{ ucwords($microclass->subskill->name) }}</span>
                    </li>
                </ul>

                <a href="{{$microclass->link}}" target="_blank" onclick="actionBtnMicroClass()"
                    class="btn btn-mint btn-block btn-order-course">Open</a>
            </div>
        </div>
        <div class="col-12 my-3">
            <p class="m-0"><strong>Description : </strong></p>
            {!! $microclass->description !!}
        </div>
    </div>
</div>

{{-- Form skill micro class --}}
<form action="{{route('member.setAchivementMicroClass')}}" method="post" id="formMicroClass">
    @csrf
    <input type="hidden" name="name" value="{{$microclass->skill->name}}">
    <input type="hidden" name="skill" value="{{$microclass->skill_id}}">
    <input type="hidden" name="subskill" value="{{$microclass->subskill_id}}">
    <input type="hidden" name="name" value="{{$microclass->skill->name}}">
</form>
@endsection

@section('js')
<script>
    const actionBtnMicroClass = () => document.querySelector("#formMicroClass").submit();
</script>
@endsection
