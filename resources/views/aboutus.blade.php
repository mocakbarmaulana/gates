@extends('layouts.app')

@section('head')
<title>About Us</title>
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/about.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="p-5 text-center m-auto" style="width: 800px">
        <p class="font-weight-bold" style="font-size: 1.2rem">
            Welcome to Gates, a three-in-one digital solution for your personal and professional growth. Shape and
            reshape your skills - your most valuable currency
        </p>
        <img src="{{asset('assets/images/about/9812.jpg')}}" alt="image-about" class="my-5" width="80%">
        <h1 class="text-primary fw-700">About</h1>
    </div>

    <div>
        <div class="our-way about-hr row ">
            <div class="col-12 mb-3">
                <h3 class="fw-700">Our Way</h3>
            </div>
            <div class="col-4">
                <p>
                    Playbook stemmed from our passion for education.Seemingly simple, this statement hides three
                    fascinating facets.</p>
                <br>
                <p>The first one is about people and their growth. Throughout their lives, people teach and learn.
                    Almost effortlessly, they gradually create their very own knowledge assets. They build up their very
                    own skills. They evolve and they grow.</p>
                <br>
                <p>The second one is about the workforce. Tomorrow’s workforce will undoubtedly be radically different
                    from today’s.</p>

            </div>
            <div class=" col-4">
                <p>
                    In perpetual motion, its boundaries will barely be visible. While the impact of new technologies on
                    jobs generates uncertainty, our certitude is that this new paradigm will create massive demand for
                    fluid talents.</p>
                <br>
                <p>
                    The third one is the complex relationship between the first two. There have always been many
                    educational codes linking our work to our life, connecting what you do to who you are. These codes
                    have never changed.
                </p>
            </div>
            <div class="col-4">
                <p>
                    It is now time to revisit them in a meaningful manner and offer everyone a chance to reskill and
                    upskill.
                </p>
                <br>
                <p>
                    Inspired by global thought leaders from fields as diverse as education, psychology and
                    neuroscience,
                    driven by our desire to make an impact, we started Playbook to give everyone the best
                    skill-building
                    tools.
                </p>
                <br>
                <p>
                    We started Playbook because we aspire to make everyone relevant in the <b>
                        #WorkforceoftheFuture.</b>
                </p>
            </div>
        </div>

        <div class="the-context about-hr row">
            <div class="col-12 mb-3">
                <h3 class="fw-700">The Context</h3>
            </div>
            <div class="col-4">
                <p>
                    The skill gap is a reality and will only widen if we don’t start to redefine the meaning of
                    learning. Two major factors are prompting us to take action:
                </p>
                <br>
                <p>
                    1). We all want to be future-proof, but that future evolves quickly as new technologies, new tools,
                    new ways of working take hold.
                </p><br>
                <p>
                    This is a tremendous challenge to chase a target that might be seen as moving and fluctuating.
                </p>
            </div>
            <div class="col-4">
                <p>
                    In our view, it’s all about defining and evolving the right skills so that everyone keeps up with
                    sometimes radical and stress-inducing changes in the workplace.
                </p>
                <br>
                <p>
                    2). If everyone wants to be relevant going forward, everyone is different.
                </p>
                <br>
                <p>
                    We acknowledge everyone learns differently and does not exhibit the same response to the same
                    teaching methodologies.
                </p>
            </div>
            <div class="col-4">
                <p>
                    We think teaching should be delivered in various, convenient and impactful ways.
                </p><br>
                <p>
                    These two factors call for a new era in adult learning. An era where the learning journey is
                    multifaceted yet #consistent, #personalized yet #available to anyone.
                </p>
            </div>
        </div>

        <div class="the-learning-problem about-hr row">
            <div class="col-12 mb-3">
                <h3 class="fw-700">The Learning Problems</h3>
            </div>
            <div class="col-4">
                <p>
                    Anywhere in the world, education is fundamental. It is a human right and basic need. Education does
                    not know discrimination: we are all entitled to get access to education, even in its the smallest
                    form, anytime and -almost- anywhere.
                </p>
                <br>
                <p>
                    To a certain degree (no pun intended!), the skills we develop contribute to define our value as
                    humans and our role in the society. While knowledge is power, skills bring it to life by making it
                    #practical, #applicable and, in other words, #useful.
                </p>
            </div>
            <div class="col-4">
                <p>
                    However, gaining knowledge can be hard. Building skills can be difficult. Yes, it takes time and
                    effort to become better, but time and effort are only mental, physical or logistical barriers we can
                    overcome to get closer to the world of learning.
                </p>
                <br>
                <p>
                    At Playbook, we want to make learning a part of your lifestyle. Learning is a habit. A habit that
                    will lead you to success.
                </p><br>
                <p>
                    To achieve this objective, we rely on two main principles:
                </p>
            </div>
            <div class="col-4">
                <p>
                    <b>Skill learning must remain an affordable experience:</b> we are well aware that it is an
                    investment in
                    yourself, so we will strive to keep our prices reasonable.
                </p><br>
                <p>
                    <b>Skill learning must be a personal experience:</b> our product suite is and will be designed to
                    ensure
                    you can learn online, onsite, alone or in a group.
                </p>
            </div>
        </div>

        <div class="our-offering about-hr row">
            <div class="col-12 mb-3">
                <h3 class="fw-700">Our Offerings</h3>
            </div>
            <div class="col-4">
                <p>
                    Sims Up is a user-focused company that wants to help you grow your skills. To that end, our offering
                    revolves around 3 main pillars:
                </p><br>
                <p>
                    SkillCard: for your learning journey to start properly, you need a why. You need to understand where
                    your skills stand, and how they can grow. Your SkillCard will show you an overview of your skills
                    and shape your skill growth journey.
                </p>
            </div>
            <div class="col-4">
                <p>
                    As we gradually evolve towards a skill-centric workforce, your SkillCard is meant to become your
                    most precious ally.
                </p><br>
                <p>
                    On-Demand Workshop: your learning journey also need a what, and that’s where our On-Demand Workshops
                    come in. These workshops are group classes that happen onsite. They happen because you decided they
                    would happen! We want skill-learning to come to you, when you want to, where you want to. Our
                    teaching partners will do the rest.
                </p>
            </div>
            <div class="col-4">
                <p>
                    Online Micro Class: your learning journey needs a digital twin, and that’s where our micro classes
                    come in. They take various shapes and forms depending on the skill to be taught, but they are always
                    available to complement and enrich on-demand workshops. Their goal is to embed learning in your
                    daily life in a convenient, enjoyable and meaningful manner.
                </p>
            </div>
        </div>

        <div class="our-community about-hr row">
            <div class="col-12 mb-3">
                <h3 class="fw-700">Our Community</h3>
            </div>
            <div class="col-4">
                <p>
                    Online Micro Class: your learning journey needs a digital twin, and that’s where our micro classes
                    come in. They take various shapes and forms depending on the skill to be taught, but they are always
                    available to complement and enrich on-demand workshops. Their goal is to embed learning in your
                    daily life in a convenient, enjoyable and meaningful manner.
                </p>
            </div>
            <div class="col-4">
                <p>
                    After all, education does not belong to anyone; it belongs to every one of us. We aspire our
                    community to get vibrant, with learners becoming teachers and teachers becoming learners, elevating
                    everyone’s skills in the process.
                </p>
            </div>
            <div class="col-4">
                <p>
                    Join Sims Up’s community now.
                </p>
            </div>
        </div>

        <div class="our-product about-hr row">
            <div class="col-12 mb-3 text-center">
                <h1 class="fw-700 text-primary">Our Product</h1>
            </div>
            <div class="row">
                <div class="col-6">
                    <h4 class="fw-700">Welcome to your future resume.</h4>
                    <p>
                        SkillCard is a digital skill-building solution based on a data-driven approach using machine
                        learning. It displays an overview of your skills, highlighting your strengths and areas of
                        improvement.
                    </p><br>
                    <p>
                        You set SkillCard in motion by defining a learning goal, which will then create a path for you
                        to reach that goal.</p>
                    <div>
                        <button class="btn btn-primary">Learn More</button>
                        <button class="btn btn-outline-primary">Join For Free</button>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-6">
                    <h4 class="fw-700">On-Demand Workshops</h4>
                </div>
                <div class="col-6">
                    <h4 class="fw-700">Welcome to your future education.</h4>
                    <p>
                        On-Demand Workshops reverse the traditional logic in education. Skill learning comes your way,
                        whenever your see fit. Our intelligent scheduler will work out the best arrangement given your
                        availabilities.
                    </p><br>
                    <p>
                        On-Demand workshops are group classes where the right skills are taught and where learners
                        validate their skills.
                    </p>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-6">
                    <h4 class="fw-700">Welcome to your future education.</h4>
                    <p>
                        Online Micro Classes are short courses you can attend anytime for free. They help you become
                        more familiar with the right skills for you.
                    </p><br>
                    <p>
                        Online Microlearning classes can extend your onsite experience or facilitate your exploration of
                        new learning avenues.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<div>
    <hr>
    <div class="container text-center py-5 px-5">
        <h1 class="text-primary fw-700">Skills of the future</h1>
        <h3 class="fw-700">Find #skillsofthefuture for thriving and staying relevant in the #workforceofthefuture</h3>
        <div class="row text-left mt-5">
            <div class="col d-flex justify-content-center">
                <ul class="list-unstyled">
                    <li class="mb-3">#Leadership</li>
                    <li class="mb-3">#Tech</li>
                    <li class="mb-3">#Creativity</li>
                    <li class="mb-3">#Adaptability</li>
                </ul>
            </div>
            <div class="col d-flex justify-content-center">
                <ul class="list-unstyled">
                    <li class="mb-3">#Inovation</li>
                    <li class="mb-3">#Productivity</li>
                    <li class="mb-3">#Business</li>
                    <li class="mb-3">#Communication</li>
                </ul>
            </div>
            <div class="col d-flex justify-content-center">
                <ul class="list-unstyled">
                    <li class="mb-3">#Problem Solving</li>
                    <li class="mb-3">#Critical Thinking</li>
                    <li class="mb-3">#Flexibility</li>
                    <li class="mb-3">#People Management</li>
                </ul>
            </div>
            <div class="col d-flex justify-content-center">
                <ul class="list-unstyled">
                    <li class="mb-3">#Empathy</li>
                    <li class="mb-3">#Resilience</li>
                    <li class="mb-3">#Confidence</li>
                    <li class="mb-3">See More</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div>
    <hr>
    <div class="container text-center py-5">
        <h1 class="text-primary fw-700">Meet the Team</h1>
        <p class="text-secondary">
            We are humble of people who love to learn new things. Knowledge and skills are our feel. Our objective is
            simple: shape the best workforce possible.
        </p>
    </div>
</div>

<div>
    <hr>
    <div class="container py-5 text-center">
        <h1 class="fw-700 text-primary">Get in Touch</h1>
        <h3 class="fw-700 my-3">Talk to us. We'd love to hear form you</h3>
        <p class="mb-0">If you'd like to more about our products and services, please reach out to us using this form
        </p>
    </div>
    <hr>
</div>

<div class="my-5">
    <div class="container py-5 text-center">
        <h3 class="fw-700 my-3">Interested to Join us?</h3>
        <p class="mb-0">Send your CV to <span class="text-primary fw-700">career@gates.com</span>
        </p>
    </div>
</div>

<div class="count-me">
    <div class="container py-5 text-center">
        <h1 class="fw-700">Count Me in</h1>
        <p>Are you ready to take part in shaping the leaders of the future by sharing your knowledge and wisdom?</p>
        <p class="mb-0"><b>We look forward to having you onboard</b></p>
    </div>
</div>
@endsection
