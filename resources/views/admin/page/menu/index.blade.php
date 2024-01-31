@extends('admin.layout')
@section('title', 'Menu')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Danh Sách Menu', 'key' => true, 'route' => 'menus.create', 'permission' => 'addMenu'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-default-success" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body table-responsive">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase active" id="nav-use-tab" data-toggle="pill"
                                           href="#nav-use" role="tab" aria-controls="pills-home"
                                           aria-selected="true">Tài khoản
                                        </a>
                                    </li>
                                    @can('deleteMenu')
                                        <li class="nav-item">
                                            <a class="nav-link text-uppercase" id="pills-profile-tab" data-toggle="pill"
                                               href="#nav-use-delete" role="tab" aria-controls="nav-use-delete"
                                               aria-selected="false">Tài khoản đã xóa
                                            </a>
                                        </li>
                                    @endcan
                                </ul>

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active"
                                         id="nav-use" role="tabpanel"
                                         aria-labelledby="nav-use-tab">
                                        <table class="table table-hover">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên menu</th>
                                                <th scope="col">Slug</th>
                                                <th class="text-right" scope="col">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($menus as $key => $menu)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $menu->name }}</td>
                                                    <td>{{ $menu->slug }}</td>
                                                    <td class="text-right">
                                                        @can('editMenu')
                                                            <a href="{{ route('menus.edit', ['id' => $menu->id]) }}" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                        @endcan
                                                        @can('deleteMenu')
                                                            <button
                                                                data-url="{{ route('menus.delete', ['id' => $menu->id]) }}"
                                                                class="btn btn-danger btn-sm action-delete">
                                                                <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                            </button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $menus->links() }}
                                    </div>
                                    <div class="tab-pane fade"
                                         id="nav-use-delete" role="tabpanel"
                                         aria-labelledby="nav-use-delete-tab">
                                        <table class="table table-hover">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên menu</th>
                                                <th scope="col">Slug</th>
                                                <th class="text-right" scope="col">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($deletedMenus as $key => $deletedMenuItem)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $deletedMenuItem->name }}</td>
                                                    <td>{{ $deletedMenuItem->slug }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('menus.delete.recover', ['id' => $deletedMenuItem->id]) }}" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </a>
                                                        <button
                                                            data-url="{{ route('menus.delete.permanently', ['id' => $deletedMenuItem->id]) }}"
                                                            class="btn btn-danger btn-sm action-delete">
                                                            <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $deletedMenus->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('javascript')
    <script src="{{ asset('common/sweetalert2/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('common/sweetalert2/configSweetAlert2.js') }}"></script>
    <script src="{{ asset('common/alertSetTimeout.js') }}"></script>
@endsection
