@extends('layouts.admin')

@section('title')
<title>List Course</title>
<link rel="stylesheet" href="{{asset('assets/css/admin/admin.css')}}">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('course.index')}}">{{$active}}</a></li>
        <li class="breadcrumb-item active"><a>{{$course->name}}</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>List Member Course</h5>
                </div>
                <div class="card-body p-0">

                    <nav class="mt-3">
                        <div class="container text-center">
                            <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                                <a class="nav-link active col mx-2" id="nav-event-one-tab" data-toggle="tab"
                                    href="#nav-event-one" role="tab" aria-controls="nav-event-one"
                                    aria-selected="true">Event
                                    1</a>
                                <a class="nav-link col mx-2" id="nav-event-two-tab" data-toggle="tab"
                                    href="#nav-event-two" role="tab" aria-controls="nav-event-two"
                                    aria-selected="false">Event 2</a>
                            </div>
                        </div>
                    </nav>
                    <div class="tab-content px-2" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-event-one" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            @if (!$order->isEmpty())
                            @if (!empty($order[0]))
                            <table class="table table-bordered table-striped">
                                <thead class="">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order[0]->orders as $itemtwo)
                                    <tr>
                                        <td style="width: 30px">{{$loop->index + 1}}.</td>
                                        <td>{{$itemtwo->student->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="alert alert-info my-2" role="alert">
                                Tidak Ada Event 2
                            </div>
                            @endif
                            @else
                            <div class="alert alert-info my-2" role="alert">
                                Belum ada member
                            </div>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="nav-event-two" role="tabpanel"
                            aria-labelledby="nav-event-two-tab">
                            @if (!$order->isEmpty())
                            @if (!empty($order[1]))
                            <table class="table table-bordered table-striped">
                                <thead class="">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order[1]->orders as $itemtwo)
                                    <tr>
                                        <td style="width: 30px">{{$loop->index + 1}}.</td>
                                        <td>{{$itemtwo->student->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="alert alert-info my-2" role="alert">
                                Tidak Ada Event 2
                            </div>
                            @endif
                            @else
                            <div class="alert alert-info my-2" role="alert">
                                Belum ada member
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">

                    </div>



                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>{{$course->name}}</h5>
                </div>
                <div class="card-body">
                    <img src="{{asset('storage/assets/images/course/'.$course->image_course)}}" width="100%"
                        alt="image-logo" class="mb-3">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <b>Description :</b><br>
                            {{$course->description}}
                        </li>
                        <li class="mb-3">
                            <b>Expert :</b><br>
                            By. {{$course->teacher}}
                        </li>
                        <li class="mb-3">
                            <b>Type :</b><br>
                            {{$course->event}}
                        </li>
                        <li class="mb-3">
                            <b>Skill :</b><br>
                            {{ $course->skill->name}}
                        </li>
                        <li class="mb-3">
                            @foreach ($course->course_details as $key => $event)
                            <b>Event {{$key + 1}}</b>
                            <ul>
                                <li><i>Event Date : </i>
                                    {{date('l', strtotime($event->event_date)) }},
                                    {{date('d-m-Y', strtotime($event->event_date))}}
                                </li>
                                <li><i>Event Time :</i>
                                    {{$event->event_time}} WIB
                                </li>
                                @if ($course->event == 'offline')
                                <li><i>Event Location :</i>
                                    {{$event->event_location}}
                                </li>
                                @else
                                <li><i>Event Link :</i>
                                    <a href="#">{{$event->link}}</a>
                                </li>
                                @endif
                            </ul>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
