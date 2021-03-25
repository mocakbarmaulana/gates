@extends('layouts.app')

@section('head')
<title>Detial Course</title>
<link rel="stylesheet" href="{{asset('assets/css/style2.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/styleDetail.css')}}">
@endsection

@section('content')
<div class="container py-5" style="min-height: 40vh">
    <h1>{{$course->name}}</h1>
    <p>By : {{$course->teacher}}</p>
    <div class="row mb-5 mt-3">
        <div class="col-8">
            <img src="{{asset('storage/assets/images/course/'.$course->image_course)}}" width="100%" height="540px"
                alt="detail-image-course" class="rounded detail img-thumbnail">
        </div>
        <div class="col-4 border border-primary p-3 rounded">
            <h3>Detail Course</h3>

            <div class="d-flex flex-column justify-content-between" style="height: 450px">
                <ul class="list-unstyled">
                    <li class="my-3">
                        <p class="m-0"><strong>Choose Date : </strong></p>
                        <select class="form-control detail_course">
                            @foreach ($course->course_details as $coursedetail)
                            <option value="{{$coursedetail->id}}">
                                {{date("l", strtotime($coursedetail->event_date))}},
                                {{date('d/m/Y', strtotime($coursedetail->event_date))}}
                                ({{$coursedetail->event_time}} WIB) <br>
                            </option>
                            @endforeach
                        </select>
                    </li>
                    <li class="my-3">
                        <p class="m-0"><strong>Type Event : </strong></p>
                        <span>{{ $course->event }}</span>
                    </li>
                    <li class="my-3">
                        <p class="m-0"><strong>Type Event : </strong></p>
                        <span>{{ $course->event }}</span>
                    </li>
                    <li class="my-3">
                        <p class="m-0"><strong>Price : </strong></p>
                        <span class="text-warning font-weight-bold">${{ number_format($course->price)}}</span>
                    </li>
                </ul>
                @if (!$course->orders->isEmpty())
                <div>
                    <span class="btn btn-info btn-block">Owned</span>
                    <a href="#" class="btn btn-success btn-block">See Course</a>
                </div>
                @else
                <button type="button" class="btn btn-primary btn-block btn-order-course" data-idcourse="{{$course->id}}"
                    data-toggle="modal" data-target="#btnOrder">Order</button>
                @endif
            </div>
        </div>
        <div class="col-12 my-3">
            <p class="m-0"><strong>Description : </strong></p>
            <span>{{ $course->description }}</span>
        </div>
    </div>
    <div class="row">
        <h4>Other Course</h4>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="btnOrder" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center mt-4">
                <div>
                    <i class="fab fa-discourse fa-4x text-success mb-3"></i>
                    {{-- <i class="far fa-times-circle f"></i> --}}
                    <p class="text-secondary"><strong>Apakah anda ingin membeli course ini dan melanjutkan pembayaran?
                        </strong></p>
                </div>
                <div class="mt-5">
                    <form action="" class="form-order-course" method="post">
                        @csrf
                        <input type="hidden" name="price" value="{{$course->price}}">
                        <input type="hidden" name="detail_id" class="input-detail">
                        <button type="button" class="btn btn-outline-secondary mx-3" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success mx-3">Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
$(".btn-order-course").on("click", function(){
const id = $(this)[0].dataset.idcourse;
$(".form-order-course").attr('action', `/member/order/${id}`);
$detail = $(".detail_course").val();
$(".input-detail").val($detail);
});


@endsection
