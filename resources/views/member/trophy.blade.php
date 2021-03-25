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
                @foreach ($trophys as $trophy)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="d-blcok d-flex align-items-center"><i class="fas fa-medal text-warning fa-2x mr-2"></i>
                        {{$trophy->name_skill}}</span>
                    <span class="badge btn-active badge-pill">{{$trophy->total}}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
