<div class="text-center sidebar-content rounded">
    @foreach ($menus as $menu)
    <div>
        <a href="{{route($menu['link'])}}"
            class="py-2 d-block {{$isActive($menu['label']) ? 'active' : '' }}">{{$menu['label']}}</a>
    </div>
    @endforeach

    {{-- <div>
        <a href="#" class="py-2 d-block active">Course</a>
    </div>
    <div>
        <a href="#" class="py-2 d-block">Order</a>
    </div>
    <div>
        <a href="#" class="py-2 d-block">Logout</a>
    </div> --}}
</div>
