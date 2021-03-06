<nav class="navbar home navbar-expand-lg navbar-light shadow" style="height: 80px">
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
                {{-- <li class="nav-item">
                    <a class="nav-link text-navbar {{($active == 'Menu') ? 'active' : ''}}"
                href="{{route('home.menu')}}">Menu</a>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-navbar" href="#" id="navbarMenu" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="nnavbarMenu">
                        <a class="dropdown-item" href="{{route('home.menu')}}">Course</a>
                        <a class="dropdown-item" href="{{route('home.menu-microclass')}}">Micro Class</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="{{route('home.teacher')}}">For Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="{{route('home.learner')}}">For Learner</a>
                </li>

                @if (Auth::guard('member')->check())
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="{{route('member.wishlist')}}">
                        <i class="fas fa-bookmark"></i>
                        Wishlist
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center ml-3">
                    <span class="profile">
                        @php
                        $user = App\Models\Student::find(Auth::guard('member')->id());
                        $image = $user->getUserImage($user->image);
                        @endphp
                        @if (empty($user->image))
                        <i class="fas fa-user-circle fa-2x"></i>
                        @else
                        <img src="{{asset($image)}}" alt="img-menu-profile" class="rounded-circle" height="32px"
                            width="32px" style="height: 32px !important">
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
                    <a class="nav-link text-navbar btn btn-orange btn-sm mx-4" href="{{route('member.login')}}">Login /
                        Sign Up</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
