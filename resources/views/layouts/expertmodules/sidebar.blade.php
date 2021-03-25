<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="opacity: 0.1">
        <img src="{{ asset('adminlte/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: 0.1" />
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <x-expertSidebar :active="$active" />
    <!-- /.sidebar -->
</aside>