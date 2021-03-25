<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('adminlte/img/user.png') }}" class="img-circle elevation-2" alt="User Image" />
        </div>
        <div class="info">
            <span class="d-block text-white">{{$username}}</span>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @foreach ($list as $item)
            <li class="nav-item">
                <a href="{{route($item['link'])}}" class="nav-link {{$isActive($item['label']) ? 'active' : ''}}">
                    <i class="nav-icon {{$item['icon']}} "></i>
                    <p>{{$item['label']}}</p>
                </a>
            </li>
            @endforeach


            <li class="nav-item">
                <a class="nav-link" href="{{route('logoutAll')}}">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Sign Out</p>
                </a>
            </li>

        </ul>
    </nav>
</div>