<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Bảng điều khiển</p>
                    </a>
                </li>
                <li class="nav-item {{
                        request()->is('admin/categories')        ||
                        request()->is('admin/categories/create') ||
                        request()->is('admin/categories/edit/*') ||
                        request()->is('admin/products')          ||
                        request()->is('admin/products/create')   ||
                        request()->is('admin/products/edit/*')   ? 'menu-open' : ''
                    }}">
                    <a href="#" class="nav-link {{
                        request()->is('admin/categories') ||
                        request()->is('admin/categories/create') ||
                        request()->is('admin/categories/edit/*') ||
                        request()->is('admin/products')          ||
                        request()->is('admin/products/create')   ||
                        request()->is('admin/products/edit/*')   ? 'active' : ''
                    }}">
                        <i class="fa fa-shopping-bag nav-icon" aria-hidden="true"></i>
                        <p>Danh mục <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link {{
                                request()->is('admin/products')        ||
                                request()->is('admin/products/create') ||
                                request()->is('admin/products/edit/*') ? 'active' : ''
                            }}">
                                <i class="fa fa-cubes nav-icon" aria-hidden="true"></i>
                                <p>Sảm Phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link {{
                                request()->is('admin/categories')        ||
                                request()->is('admin/categories/create') ||
                                request()->is('admin/categories/edit/*') ? 'active' : ''
                            }}">
                                <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
                                <p>Danh Mục SP</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{
                        request()->is('admin/menus')                ||
                        request()->is('admin/menus/create')         ||
                        request()->is('admin/menus/edit/*')         ||
                        request()->is('admin/sliders')              ||
                        request()->is('admin/sliders/create')       ||
                        request()->is('admin/sliders/edit/*')       ||
                        request()->is('admin/information')          ||
                        request()->is('admin/information/create')   ||
                        request()->is('admin/information/edit/*')   ||
                        request()->is('admin/settings')             ||
                        request()->is('admin/settings/create')      ||
                        request()->is('admin/settings/edit/*')      ? 'menu-open' : ''
                    }}">
                    <a href="#" class="nav-link {{
                        request()->is('admin/menus')                ||
                        request()->is('admin/menus/create')         ||
                        request()->is('admin/menus/edit/*')         ||
                        request()->is('admin/sliders')              ||
                        request()->is('admin/sliders/create')       ||
                        request()->is('admin/sliders/edit/*')       ||
                        request()->is('admin/information')          ||
                        request()->is('admin/information/create')   ||
                        request()->is('admin/information/edit/*')   ||
                        request()->is('admin/settings')             ||
                        request()->is('admin/settings/create')      ||
                        request()->is('admin/settings/edit/*')      ? 'active' : ''
                    }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Cài đặt <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <!-- menu-open -->
                            <a href="{{ route('menus.index') }}" class="nav-link {{
                                request()->is('admin/menus')        ||
                                request()->is('admin/menus/create') ||
                                request()->is('admin/menus/edit/*') ? 'active' : ''
                            }}">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sliders.index') }}" class="nav-link {{
                                request()->is('admin/sliders')        ||
                                request()->is('admin/sliders/create') ||
                                request()->is('admin/sliders/edit/*') ? 'active' : ''
                            }}">
                                <i class="nav-icon fas fa-images"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('settings.index') }}" class="nav-link {{
                                request()->is('admin/settings')        ||
                                request()->is('admin/settings/create') ||
                                request()->is('admin/settings/edit/*') ? 'active' : ''
                            }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Cài Đặt</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{
                        request()->is('admin/users')                ||
                        request()->is('admin/users/create')         ||
                        request()->is('admin/users/edit/*')         ||
                        request()->is('admin/roles')                ||
                        request()->is('admin/roles/create')         ||
                        request()->is('admin/roles/edit/*')         ? 'menu-open' : ''
                    }}">
                    <a href="#" class="nav-link {{
                        request()->is('admin/users')                ||
                        request()->is('admin/users/create')         ||
                        request()->is('admin/users/edit/*')         ||
                        request()->is('admin/roles')                ||
                        request()->is('admin/roles/create')         ||
                        request()->is('admin/roles/edit/*')         ? 'active' : ''
                    }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Quản Lý Tài Khoản <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{
                                request()->is('admin/users')        ||
                                request()->is('admin/users/create') ||
                                request()->is('admin/users/edit/*') ? 'active' : ''
                            }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Danh sách nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link {{
                                request()->is('admin/roles')        ||
                                request()->is('admin/roles/create') ||
                                request()->is('admin/roles/edit/*') ? 'active' : ''
                            }}">
                                <i class="nav-icon fas fa-sitemap"></i>
                                <p>Vai trò (Role)</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
