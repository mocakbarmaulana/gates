@extends('layouts.member')

@section('head')
<title>Order</title>
<link rel="stylesheet" href="{{asset('assets/css/member/member.css')}}">
@endsection

@section('content')
<div class="p-4">
    <div class="row mb-3">
        <div class="col">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="display-5 font-weight-bold">Skill</span>
                    <span class="display-5 font-weight-bold">Total</span>
                </li>
                {{-- @if ($trophys->isEmpty())
                <li class="list-group-item d-flex justify-content-center align-items-center">
                    <span>Belum Menyelesaikan Workshop</span>
                </li>
                @else
                @foreach ($trophys as $trophy)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="d-blcok d-flex align-items-center"><i class="fas fa-medal text-warning fa-2x mr-2"></i>
                        {{$trophy->name_skill}}</span>
                <span class="badge btn-active badge-pill">{{$trophy->total}}</span>
                </li>
                @endforeach
                @endif
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <span class="d-blcok d-flex align-items-center">
                            <i class="fas fa-medal text-warning fa-2x mr-2"></i>
                            Web
                        </span>
                    </div>
                    <div class="progress-bar">
                        <progress id="progress" value="2" max="6"> </progress>
                    </div>
                </li> --}}

                {{-- @forelse ($skills as $key => $skill)
                <li>
                    <span>{{$skill->name}}</span>
                <b class="d-blcok text-danger">( {{count($skill->subskills)}} )</b>
                <i>( {{ count($skill->achievments) }} )</i>
                @forelse ($skill->subskills as $subskill)
                <p>* {{$subskill->name}}</p>
                @empty
                <p>* tidak ada subskill</p>
                @endforelse
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <span class="d-blcok d-flex align-items-center">
                            <i class="fas fa-medal text-warning fa-2x mr-2"></i>
                            {{$skill->name}}
                        </span>
                    </div>
                    <div class="progress-bar">
                        <progress id="progress" value="{{count($trophys)}}" max="{{count($skill->subskills)}}">
                        </progress>
                    </div>
                </li>
                @empty
                <li><span>skill kosong</span></li>
                @endforelse --}}

                @forelse ($skills as $key => $skill)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div style="width: 100px">
                        <span class="d-blcok d-flex align-items-center">
                            <i class="fas fa-medal text-warning fa-2x mr-2"></i>
                            {{$skill->name}}
                        </span>
                    </div>
                    <div class="progress-bar">
                        <progress id="progress" value="{{count($skill->achievments)}}"
                            max="{{(count($skill->subskills) > 0 ) ? count($skill->subskills) : 10}}"> </progress>
                    </div>
                </li>
                @empty
                <li class="text-center">
                    <span>tidak ada achievment</span>
                </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
<style>
    .progress-bar {
        width: 80%;
        background: transparent;
    }

    progress {
        width: 100%;
        height: 0.6rem;
        border: 1px solid #rgba(0, 0, 0, .01);
        border-radius: 7px;
    }

    progress::-webkit-progress-bar {
        background-color: rgba(0, 0, 0, .15);
        border-radius: 7px;
    }

    progress::-webkit-progress-value {
        background-color: #97f8e4;
        border-radius: 7px;
    }

    progress::-moz-progress-bar {
        /* style rules */
    }
</style>
@endsection
