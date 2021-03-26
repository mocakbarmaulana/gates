<nav class="navbar navbar-expand-lg navbar-light" style="height: 80px">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{asset('assets/images/Logo.png')}}" alt="" style="width: 120px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-navbar {{($active == 'Home') ? 'active' : ''}}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="#">Menu</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-navbar" href="#">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="#">About us</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="#">For Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="#">For Learner</a>
                </li>

                @if (Auth::guard('member')->check())
                <li class="nav-item d-flex align-items-center ml-3">
                    <span class="profile">
                        @php
                        $user = App\Models\Student::find(Auth::guard('member')->id());
                        $image = $user->getUserImage($user->image);
                        @endphp
                        @if (empty($user->image))
                        <i class="fas fa-user-circle fa-2x"></i>
                        @else
                        <img src="{{asset($image)}}" alt="img-menu-profile" class="rounded-circle" width="32px">
                        @endif
                    </span>
                    <ul class="menu-profile list-unstyled" style="display: none">
                        <li>
                            <a class="py-2 d-block" href="{{route('member.account')}}">Account</a>
                        </li>
                        <li>
                            <a class="py-2 d-block" href="{{route('member.achievement')}}">Achievement</a>
                        </li>
                        <li>
                            <a class="py-2 d-block" href="{{route('member.getcourseall')}}">Course</a>
                        </li>
                        <li>
                            <a class="py-2 d-block" href="{{route('member.getorder')}}">Order</a>
                        </li>
                        <li>
                            <a class="py-2 d-block" href="{{route('member.logout')}}">Logout</a>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-navbar btn btn-warning btn-sm mx-4" href="{{route('member.login')}}">Login /
                        Sign Up</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
