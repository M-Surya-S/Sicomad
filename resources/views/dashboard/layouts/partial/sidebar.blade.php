<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
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
                    <a href="{{ route('admin') }}" class="nav-link {{ Route::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>                    
                </li>
                <li class="nav-header">Catalog</li>
                <li class="nav-item">
                    <a href="{{ route('product-table') }}" class="nav-link {{ Request::is('admin-dashboard/product/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product-table') }}" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product-add') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category-table') }}" class="nav-link {{ Request::is('admin-dashboard/category/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category-table') }}" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category-add') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Transaction</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Route::is('') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>New Order</p>
                    </a>
                </li>
                <li class="nav-header">Settings</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Route::is('') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info"></i>
                        <p>About Store</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>