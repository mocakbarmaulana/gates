@extends('layouts.app')

@section('head')
<title>Detial Course</title>
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
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
        <div class="col-4 rounded p-3 border-mint">
            <h3>Detail Course</h3>

            <div class="d-flex flex-column justify-content-between" style="height: 450px">
                <ul class="list-unstyled">
                    <li class="my-3">
                        <p class="m-0"><strong>Choose Date : </strong></p>
                        <select class="form-control detail_course input-mint">
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
                        <p class="m-0"><strong>Price : </strong></p>
                        <span class="text-warning font-weight-bold">${{ number_format($course->price)}}</span>
                    </li>
                    <li class="my-3">
                        <p class="m-0"><strong>Seats </strong></p>
                        <div class="row">
                            @foreach ($course->course_details as $key => $item)
                            <div class="col">
                                <p class="m-0"><strong>Event {{$key + 1}}: </strong></p>
                                <span class="badge badge-pill badge-info">{{$item->count($item->id)}} /
                                    {{$item->quota}}</span>
                            </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
                @if (empty($wishlist))
                <div>
                    <form action="{{route('member.setwishlist', $course->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-block">
                            <i class="far fa-bookmark"></i> Wishlist
                        </button>
                    </form>
                </div>
                @else
                <div>
                    <form action="{{route('member.destroywishlist', $wishlist->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-warning btn-block">
                            <i class="fas fa-bookmark"></i> Wishlist
                        </button>
                    </form>
                </div>
                @endif
                @if (!$course->orders->isEmpty())
                <div>
                    <a href="{{route('member.getorder')}}" class="btn btn-info btn-block">Owned</a>
                </div>
                @else
                <button type="button" class="btn btn-mint btn-block btn-order-course" data-idcourse="{{$course->id}}"
                    data-toggle="modal" data-target="#btnOrder">Order</button>
                @endif
            </div>
        </div>
        <div class="col-12 my-3">
            <p class="m-0"><strong>Description : </strong></p>
            <span>{{ $course->description }}</span>
        </div>
    </div>

    <div class="row bg-mint pb-5 pt-3 rounded">
        <div class="col-12 mb-3">
            <h4>Other Course</h4>
        </div>
        @if (!$othercourse->isEmpty())
        @foreach ($othercourse as $course)
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
                        <span class="badge badge-pill badge-info">{{$course->orders_count}} /
                            {{$course->course_details[0]->quota}}</span>
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
        @endif
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
                    <p class="text-secondary"><strong>Apakah anda ingin membeli course ini dan melanjutkan
                            pembayaran?
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
<script>
    $(".btn-order-course").on("click", function(){
        const id = $(this)[0].dataset.idcourse;
        $(".form-order-course").attr('action', `/member/order/${id}`);
        $detail = $(".detail_course").val();
        $(".input-detail").val($detail);
    });

</script>
@endsection
