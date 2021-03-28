@extends('layouts.app')

@section('head')
<title>Home</title>
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
@endsection

@section('content')
<div class="container my-5 py-5">
    <div class="course-head mb-3">
        <div class="course-title">
            <h3 class="mb-1"><strong>Wishlist Workshop</h3>
            <p>Order your best workshop</p>
        </div>
    </div>
    <div class="course-body py-4 bg-mint rounded">
        <div class="row">
            @if (!$wishlists->isEmpty())
            @foreach ($wishlists as $wishlist)
            <div class="col-4 px-2 d-flex justify-content-center">
                <div class="bg-white p-3 rounded" style="width: 300px">
                    <div class="course-image">
                        <img src="{{asset('storage/assets/images/course/'.$wishlist->course->image_course)}}"
                            class="img-thumbnail img-course" style="height: 200px; width: 263px">
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <div class="">
                            <span class="text-secondary">{{$wishlist->course->skill->name}}</span>
                        </div>
                        <div class="">
                            <span class="badge badge-pill badge-info">1 / 60</span>
                        </div>
                    </div>
                    <div class="info-course mt-2 d-flex justify-content-between">
                        <div class="mr-3">
                            <h5 style="min-height: 80px"><b>{{$wishlist->course->name}}</b></h5>
                            <p class="mb-0">{{$wishlist->course->teacher}}</p>
                            <span
                                class="text-warning font-weight-bold">{{date('d/m/Y', strtotime($wishlist->course->course_details[0]->event_date))}}</span>
                        </div>
                        <div class="align-self-end" style="width: 70px">
                            <form action="{{route('member.destroywishlist', $wishlist->id)}}" class="mb-1"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-warning btn-sm" style="width: 65px">
                                    <i class="fas fa-bookmark"></i>
                                </button>
                            </form>
                            <a href="{{route('home.detail', $wishlist->course->id)}}" class="btn btn-mint btn-sm"
                                style="width: 65px">Order</a>
                            {{-- <a href="#" class="btn btn-mint btn-sm" style="width: 65px">Owned</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12 text-center">
                <span>Belum ada wishlist</span><br>
                <a href="{{route('home.menu')}}" class="text-danger">Cari Workshop</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
