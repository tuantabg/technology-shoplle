@php
    $routeName = \Route::currentRouteName();
    // Route Category, Product
    $routeAllCategories     = config('nameRoutes.routeAllCategories');
    $routeCategories        = config('nameRoutes.categories');
    $routeProducts          = config('nameRoutes.products');
    // Route Menu, Slider, Information
    $routeAllSettings       = config('nameRoutes.routeAllSettings');
    $routeMenus             = config('nameRoutes.menus');
    $routeSliders           = config('nameRoutes.sliders');
    $routeInformation       = config('nameRoutes.information');
    // Route User, Role, Permission
    $routeAccountManagement = config('nameRoutes.routeAccountManagement');
    $routeUsers             = config('nameRoutes.users');
    $routeRoles             = config('nameRoutes.roles');
    $routePermissions       = config('nameRoutes.permissions');
@endphp

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
                @if((Auth::user()->can('listProduct')) || (Auth::user()->can('listCategory')))
                    <li class="nav-item {{ in_array($routeName, $routeAllCategories, true) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array($routeName, $routeAllCategories, true) ? 'active' : '' }} ">
                            <i class="fa fa-shopping-bag nav-icon" aria-hidden="true"></i>
                            <p>Danh mục <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('listProduct')
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}" class="nav-link
                                        {{ in_array($routeName, $routeProducts, true) ? 'active' : '' }}">
                                        <i class="fa fa-cubes nav-icon" aria-hidden="true"></i>
                                        <p>Sảm Phẩm</p>
                                    </a>
                                </li>
                            @endcan
                            @can('listCategory')
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="nav-link
                                        {{ in_array($routeName, $routeCategories, true) ? 'active' : '' }}">
                                        <i class="fa fa-folder-open nav-icon" aria-hidden="true"></i>
                                        <p>Danh Mục SP</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if((Auth::user()->can('listMenu')) || (Auth::user()->can('listSlide')) || (Auth::user()->can('listInformation')))
                    <li class="nav-item {{ in_array($routeName, $routeAllSettings, true) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array($routeName, $routeAllSettings, true) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Cài đặt <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('listMenu')
                                <li class="nav-item"> <!-- menu-open -->
                                    <a href="{{ route('menus.index') }}" class="nav-link
                                        {{ in_array($routeName, $routeMenus, true) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-bars"></i>
                                        <p>Menu</p>
                                    </a>
                                </li>
                            @endcan
                            @can('listSlide')
                                <li class="nav-item">
                                    <a href="{{ route('sliders.index') }}" class="nav-link
                                        {{ in_array($routeName, $routeSliders, true) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-images"></i>
                                        <p>Slider</p>
                                    </a>
                                </li>
                            @endcan
                            @can('listInformation')
                                <li class="nav-item">
                                    <a href="{{ route('settings.index') }}" class="nav-link
                                        {{ in_array($routeName, $routeInformation, true) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-cogs"></i>
                                        <p>Thông tin WEB</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
                @if((Auth::user()->can('listUser')) || (Auth::user()->can('listRole')) || (Auth::user()->can('addPermission')))
                    <li class="nav-item {{ in_array($routeName, $routeAccountManagement, true) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array($routeName, $routeAccountManagement, true) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>Quản Lý Tài Khoản <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('listUser')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link
                                        {{ in_array($routeName, $routeUsers, true) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>Danh sách tài khoản</p>
                                    </a>
                                </li>
                            @endcan
                            @can('listRole')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link
                                        {{ in_array($routeName, $routeRoles, true) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-sitemap"></i>
                                        <p>Vai trò (Role)</p>
                                    </a>
                                </li>
                            @endcan
                            @can('addPermission')
                                <li class="nav-item">
                                    <a href="{{ route('permissions.create') }}" class="nav-link
                                        {{ in_array($routeName, $routePermissions, true) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-sitemap"></i>
                                        <p>Tạo quyền (Permission)</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
