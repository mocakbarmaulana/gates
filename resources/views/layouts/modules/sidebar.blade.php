<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-green-mint elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link ">
        <img src="{{ asset('adminlte/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-bold text-dark">AdminLTE 3</span>
    </a>

    <x-menu :active="$active" />
    <!-- /.sidebar -->
</aside>
