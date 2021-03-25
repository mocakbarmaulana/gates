@extends('layouts.app')

@section('head')
<title>Home</title>
<link rel="stylesheet" href="{{asset('assets/css/style2.css')}}">
@endsection

@section('content')
<section class="jumbotron p-0 pt-5 pb-3">
    <div class="container">
        <h1 class="display-5">Reskill & Upskill:</h1>
        <h1 class="display-5">Bring out the best in you</h1>
        <ul class="list-unstyled mt-4">
            <li>Broaden your professional potential.</li>
            <li>Deepen your personal horizons.</li>
            <li>Start a skill-building plan now.</li>
        </ul>
        <div style="margin-top: 100px">
            <a href="#" class="btn btn-warning">Get Started</a>
            <a href="#" class="btn btn-outline-warning">Learn More</a>
        </div>
    </div>
</section>

<section id="goal" class="text-center">
    <div class="goal-head mb-3">
        <div class="container py-5">
            <h2>What's your learning goal ?</h2>
            <p class="text-secondary">Define your target to get a better learning outcome</p>
        </div>
    </div>
    <div class="goal-body py-5">
        <div class="container">
            <div class="d-flex">
                <div class="mx-5" style="width: 500px">
                    <div class="bg-light p-3 mb-3 rounded">
                        <img src="{{asset('assets/images/illustration-mentor.png')}}" alt="goal-img" class="mb-3"
                            style="width: 150px">
                        <h5>Skill Up for Professional</h5>
                        <p class="goal-info">Layanan bagi user yang sudah mempunyai pengalaman dan ingin lebih menambah
                            pengalaman</p>
                    </div>
                    <a href="#" class="btn btn-warning" style="width: 80px"><strong>Go</strong></a>
                </div>
                <div class="mx-5" style="width: 500px">
                    <div class="bg-light p-3 mb-3 rounded">
                        <img src="{{asset('assets/images/illustration-mentor.png')}}" alt="goal-img" class="mb-3"
                            style="width: 150px">
                        <h5>Skill Up for Beginer</h5>
                        <p class="goal-info">Layanan bagi user yang sudah mempunyai pengalaman dan ingin lebih menambah
                            pengalaman</p>
                    </div>
                    <a href="#" class="btn btn-warning" style="width: 80px"><strong>Go</strong></a>
                </div>
                <div class="mx-5" style="width: 500px">
                    <div class="bg-light p-3 mb-3 rounded">
                        <img src="{{asset('assets/images/illustration-mentor.png')}}" alt="goal-img" class="mb-3"
                            style="width: 150px">
                        <h5>Skill Up for Master</h5>
                        <p class="goal-info">Layanan bagi user yang sudah mempunyai pengalaman dan ingin lebih menambah
                            pengalaman</p>
                    </div>
                    <a href="#" class="btn btn-warning" style="width: 80px"><strong>Go</strong></a>
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
        <div class="course-one">
            <div class="course-head">
                <div class="course-title">
                    <h3 class="mb-1"><strong>On Demand</strong> Workshop</h3>
                    <p>Learn in demand skills at your convience</p>
                </div>
            </div>
            <div class="course-body pb-3">
                <div class="d-flex justify-content-end p-3">
                    <a href="#" class=""><strong>See All > </strong></a>
                </div>
                <div class="course-menu d-flex">
                    @foreach ($courses as $course)

                    <div class="course-content col p-3 mx-3 rounded">
                        <div class="course-image">
                            <img src="{{asset('storage/assets/images/course/'.$course->image_course)}}"
                                class="img-thumbnail" alt="img-course" style="width: 210px; height: 200px">
                        </div>
                        <div class="d-flex pt-2">
                            <div class="course-info">
                                <h6 style="height: 90px"><strong>{{$course->name}}</strong></h6>
                                <div class="course-date">
                                    <span>Dinar Nugroho P</span>
                                    <strong>{{ date('d/m/Y', strtotime($course->event_date))}}</strong>
                                </div>
                            </div>
                            <div class="course-btn d-flex flex-column justify-content-between text-center"
                                style="width: 100px">
                                <p>
                                    seats <br><span class="badge badge-warning">{{$course->quota_student}} /
                                        {{$course->quota_student}}</span>
                                </p>
                                <a href="{{route('home.detail', $course->id)}}" class="btn btn-primary btn-sm">Order</a>
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
                <img src="{{asset('assets/images/profile.png')}}" class="img-testi img-thumbnail" alt="image-testimoni">
                <p>"i had so much fun art-jumming with the teacher and learning new painting technique"</p>
            </div>
            <div class="mx-5">
                <img src="{{asset('assets/images/profile.png')}}" class="img-testi img-thumbnail" alt="image-testimoni">
                <p>"i had so much fun art-jumming with the teacher and learning new painting technique"</p>
            </div>
            <div class="mx-5">
                <img src="{{asset('assets/images/profile.png')}}" class="img-testi img-thumbnail" alt="image-testimoni">
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
                        <input type="text" class="form-control" placeholder="Enter Your Email">
                    </div>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')

@endsection
