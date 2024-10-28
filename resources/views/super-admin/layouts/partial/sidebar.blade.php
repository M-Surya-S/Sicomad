<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('super-admin') }}" class="brand-link">
        <img src="{{ asset('assets/dashboard/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">Sicomad</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('super-admin') }}" class="nav-link {{ Route::is('super-admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>                    
                </li>
                <li class="nav-header">User</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('super-admin-dashboard/admin/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Admin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin-table') }}" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-add') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('customer') }}" class="nav-link {{ Route::is('customer') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Customer</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>