@extends('layouts.app')

@section('head')
<title>Home</title>
<link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
{{-- <link rel="stylesheet" href="{{asset('assets/css/style2.css')}}"> --}}
@endsection

@section('content')
<section class="jumbotron p-0 py-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <p><b>Best Webinar Online Platform</b></p>
                <h1 class="display-5 text-mint-dark fw-700 mb-3">Reskill & Upskill:</h1>
                <h1 class="display-5 text-mint-dark fw-700 mb-3">Bring out the best in you</h1>
                <ul class="list-unstyled mt-4">
                    <li class="mb-2">Broaden your professional potential.</li>
                    <li class="mb-2">Deepen your personal horizons.</li>
                    <li class="mb-2">Start a skill-building plan now.</li>
                </ul>
                <div style="margin-top: 100px">
                    <a href="#" class="btn btn-orange">Get Started</a>
                    <a href="#" class="btn btn-outline-orange text-navbar">Learn More</a>
                </div>
            </div>
            <div class="col-6 text-right">
                <img src=" {{asset('assets/images/icon-beranda.png')}}" alt="icon" width="80%">
            </div>
        </div>
    </div>
</section>

<section id="goal" class="text-center">
    <div class="goal-head mb-3">
        <div class="container py-5">
            <h1 class="display-5 text-mint-dark fw-700">Achieve your goal with Gates</h1>
        </div>
    </div>
    <div class="goal-body py-5 bg-mint">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="bg-white rounded content-goal pt-3 pb-5" style="width: 290px">
                        <div class="d-flex justify-content-center align-items-center" style="min-height: 150px">
                            <div class="image-goal mb-3 bg-mint rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 120px; height:120px">
                                <img src="{{asset('assets/images/home/medal.png')}}" width="80px">
                            </div>
                        </div>
                        <div class="title-goal mb-4">
                            <h4 class="text-secondary fw-700">Certificate</h4>
                        </div>
                        <div class="info-goal px-3">
                            <p class="text-secondary">This Certificate is your assets!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="bg-white rounded content-goal pt-3 pb-5" style="width: 290px">
                        <div class="d-flex justify-content-center align-items-center" style="min-height: 150px">
                            <div class="image-goal mb-3 bg-mint rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 120px; height:120px">
                                <img src="{{asset('assets/images/home/instructor.png')}}" width="80px">
                            </div>
                        </div>
                        <div class="title-goal mb-4">
                            <h4 class="text-secondary fw-700">Outstanding Instructor</h4>
                        </div>
                        <div class="info-goal px-3">
                            <p class="text-secondary">Professional, Experts, Practitioners, Get ready for the most
                                remarkable webinar ever!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="bg-white rounded content-goal pt-3 pb-5" style="width: 290px">
                        <div class="d-flex justify-content-center align-items-center" style="min-height: 150px">
                            <div class="image-goal mb-3 bg-mint rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 120px; height:120px">
                                <img src="{{asset('assets/images/home/briefcase.png')}}" width="80px">
                            </div>
                        </div>
                        <div class="title-goal mb-4">
                            <h4 class="text-secondary fw-700">On Demand Workshop</h4>
                        </div>
                        <div class="info-goal px-3">
                            <p class="text-secondary">Learn in demand skills at your convenience</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="bg-white rounded content-goal pt-3 pb-5" style="width: 290px">
                        <div class="d-flex justify-content-center align-items-center" style="min-height: 150px">
                            <div class="image-goal mb-3 bg-mint rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 120px; height:120px">
                                <img src="{{asset('assets/images/home/video-camera.png')}}" width="80px">
                            </div>
                        </div>
                        <div class="title-goal mb-4">
                            <h4 class="text-secondary fw-700">Micro Classes</h4>
                        </div>
                        <div class="info-goal px-3">
                            <p class="text-secondary">DailyChallenge that will change your life forever</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>

<section id="skill" class="my-5">
    <div class="container my-5">
        <div class="skill-head">
            <h3>How To Use <strong>Skill Up</strong></h3>
        </div>
        <div class="skill-body pt-5">
            <div class="d-flex">
                <div class="col mx-3 d-flex justify-content-around">
                    <div class="no d-flex align-items-center justify-content-center"><span>01</span></div>
                    <div>
                        <h5 class="mb-0 set">Set</h5>
                        <span>Your Goal</span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </div>
                </div>
                <div class="col mx-3 d-flex justify-content-around">
                    <div class="no d-flex align-items-center justify-content-center"><span>02</span></div>
                    <div>
                        <h5 class="mb-0 set">Choose</h5>
                        <span>Your Workshop</span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </div>
                </div>
                <div class="col mx-3 d-flex justify-content-around">
                    <div class="no d-flex align-items-center justify-content-center"><span>03</span></div>
                    <div>
                        <h5 class="mb-0 set">Register</h5>
                        <span>In Click</span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </div>
                </div>
                <div class="col mx-3 d-flex justify-content-around">
                    <div class="no d-flex align-items-center justify-content-center"><span>04</span></div>
                    <div>
                        <h5 class="mb-0 set">Enjoy</h5>
                        <span>The Workshop</span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        {{-- <i class="fas fa-chevron-right fa-2x"></i> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section id="course">
    <div class="container h-100 d-flex align-items-center">
        <div class="course-one w-100">
            <div class="course-head">
                <div class="course-title">
                    <h3 class="mb-1"><strong>On Demand</strong> Workshop</h3>
                    <p>Learn in demand skills at your convience</p>
                </div>
            </div>
            <div class="course-body pb-3">
                <div class="d-flex justify-content-end p-3">
                    <a href="{{route('home.menu')}}" class="nav-link text-navbar"><strong>See All > </strong></a>
                </div>
                <div class="row">
                    {{-- <div class="col-4 px-2 d-flex justify-content-center">
                        <div class="bg-white p-3 rounded" style="width: 300px">
                            <div class="course-image">
                                <img src="{{asset('assets/images/example-course.png')}}"
                    class="img-thumbnail img-course" style="height: 200px; width: 263px">
                </div>
                <div class="d-flex justify-content-between py-2">
                    <div class="">
                        <span class="text-secondary">Critical Thingking</span>
                    </div>
                    <div class="">
                        <span class="badge badge-pill badge-info">1 / 60</span>
                    </div>
                </div>
                <div class="info-course mt-2 d-flex justify-content-between">
                    <div class="mr-3">
                        <h5><b>Trello bikin semua rencana jadi lancar</b></h5>
                        <p class="mb-0">Akbar Maulana</p>
                        <span class="text-warning font-weight-bold">12/03/2021</span>
                    </div>
                    <div class="align-self-end" style="width: 70px">
                        <a href="#" class="btn btn-mint btn-sm" style="width: 65px">Order</a>
                        <a href="#" class="btn btn-mint btn-sm" style="width: 65px">Owned</a>
                    </div>
                </div>
            </div>
        </div> --}}


        @foreach ($courses as $course)
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
    </div>
    </div>
    </div>
    </div>
</section>

<section id="testimoni" class="d-flex align-items-center">
    <div>
        <div class="testimoni-head text-center">
            <h3>What they say about <strong>Skill Up</strong></h3>
        </div>
        <div class="testimoni-body d-flex text-center">
            <div class="mx-5">
                <img src="{{asset('assets/images/profile.png')}}" class="img-testi rounded-circle img-thumbnail"
                    alt="image-testimoni">
                <p>"i had so much fun art-jumming with the teacher and learning new painting technique"</p>
            </div>
            <div class="mx-5">
                <img src="{{asset('assets/images/profile.png')}}" class="img-testi rounded-circle img-thumbnail"
                    alt="image-testimoni">
                <p>"i had so much fun art-jumming with the teacher and learning new painting technique"</p>
            </div>
            <div class="mx-5">
                <img src="{{asset('assets/images/profile.png')}}" class="img-testi rounded-circle img-thumbnail"
                    alt="image-testimoni">
                <p>"i had so much fun art-jumming with the teacher and learning new painting technique"</p>
            </div>
        </div>
    </div>
</section>

<section id="team" class="my-5">
    <div class="container d-flex">
        <div class="col">
            <img src="{{asset('assets/images/team.jpg')}}" alt="team-img" style="width: 100%">
        </div>
        <div class="col d-flex align-items-center">
            <div>
                <p class="team-text">Be the first to hear about the skill you need in a world full of knowledge. Receive
                    the
                    signal, not the
                    noise. Join our newsletter</p>

                <div class="input d-flex my-5">
                    <div class="col pl-0">
                        <input type="text" class="form-control input-mint" placeholder="Enter Your Email">
                    </div>
                    <button type="button" class="btn btn-mint">Submit</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')

@endsection
