@extends('layouts.expert')

@section('head')
<title>Expert | Show Course</title>
<link rel="stylesheet" href="{{asset('assets/css/expert/expert.css')}}">
@endsection

@section('content')
<div class="row">
    @if (session('success'))
    <div class="col-12">
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    </div>
    @endif

    <div class="col-6">
        <img src="{{asset('storage/assets/images/course/'.$course->image_course)}}" width="100%" height="100%" alt="">
    </div>
    <div class="col-6">
        <h2>{{$course->name}}</h2>
        <ul class="list-unstyled">
            <li>
                <b>Event Price :</b><br>
                ${{$course->price}}
            </li>
            <li>
                <b>Event :</b><br>
                {{$course->event}}
            </li>
            <li>
                <b>Status :</b><br>
                @if ($course->status == 1)
                Workshop Finished
                @else
                Not Finished
                @endif
            </li>
        </ul>
        <div class="row">
            @foreach ($detailcourse as $item)
            <div class="col">
                <h5 class="text-center">Event ke-{{$loop->iteration}}</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <b>Event Quota :</b><br>
                        {{$item->quota}}
                    </li>
                    <li class="list-group-item">
                        <b>Event Date :</b><br>
                        {{$item->event_date}}
                    </li>
                    <li class="list-group-item">
                        <b>Event Time:</b><br>
                        {{$item->event_time}} WIB
                    </li>
                    @if ($course->event == 'offline')
                    <li class="list-group-item">
                        <b>Event Location:</b><br>
                        {{$item->event_location}}
                    </li>
                    @else
                    <li class="list-group-item">
                        <b>Event Link:</b><br>
                        {{$item->link}}
                    </li>
                    @endif
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row my-3">
    <div class="col-12">
        <b>Description :</b>
        <p>{{$course->description}}</p>
    </div>
    @if ($course->status == 0)
    <div class="col-12 row">
        <div class="col"></div>
        <div class="col">
            <button type="button" class="btn btn-primary btn-block btn-end" data-idcourse="{{$course->id}}"
                data-toggle="modal" data-target="#btnEnd">Finish</button>
        </div>
    </div>
    @endif
</div>

{{-- Member Layout --}}
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">List Member</div>
            <div class="card-body p-0 px-1">
                <nav class="mt-3">
                    <div class="container text-center">
                        <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                            <a class="nav-link active col" id="nav-event-1-tab" data-toggle="tab" href="#nav-event-1"
                                role="tab" aria-controls="nav-event-1" aria-selected="true">Event
                                1</a>
                            <a class="nav-link col" id="nav-event-2-tab" data-toggle="tab" href="#nav-event-2"
                                role="tab" aria-controls="nav-event-2" aria-selected="false">Event 2</a>
                        </div>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-event-1" role="tabpanel">
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
                                @foreach ($order[0]->orders as $item)
                                <tr>
                                    <td style="width: 30px">{{$loop->index + 1}}.</td>
                                    <td>{{$item->student->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-info my-2" role="alert">
                            Tidak Ada Event 1
                        </div>
                        @endif
                        @else
                        <div class="alert alert-info my-2" role="alert">
                            Belum ada member
                        </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="nav-event-2" role="tabpanel">
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
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="btnEnd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center mt-4">
                <div>
                    <i class="fas fa-trophy fa-4x text-primary mb-3"></i>
                    <p class="text-secondary"><strong>Workshop ini telah selesai? <br> dan trophy akan diberikan ke
                            member
                        </strong></p>
                </div>
                <div class="mt-5">
                    <form action="{{route('expert.achive', $course->id)}}" class="form-end" method="post">
                        @csrf
                        <button type="button" class="btn btn-outline-secondary mx-3" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary mx-3">Finish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
{{-- <script>
    $(".btn-end").on("click", function(){
const id = $(this)[0].dataset.idcourse;
$(".form-end").attr('action', `/expert/achive/${id}`);
});
</script> --}}
@endsection
