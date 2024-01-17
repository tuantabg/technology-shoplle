@extends('admin.layout')
@section('title', 'Vai Trò')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Danh Sách Vai Trò', 'key' => true, 'route' => 'roles.create'])

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
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" id="pills-profile-tab" data-toggle="pill"
                                           href="#nav-use-delete" role="tab" aria-controls="nav-use-delete"
                                           aria-selected="false">Tài khoản đã xóa
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active"
                                         id="nav-use" role="tabpanel"
                                         aria-labelledby="nav-use-tab">
                                        <table class="table table-hover">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên vai trò</th>
                                                <th scope="col">Mô tả</th>
                                                <th class="text-right" scope="col">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($roles as $key => $role)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $role->name }}</td>
                                                    <td>{{ $role->display_name }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </a>
                                                        <button
                                                            data-url="{{ route('roles.delete', ['id' => $role->id]) }}"
                                                            class="btn btn-danger btn-sm action-delete">
                                                            <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $roles->links() }}
                                    </div>
                                    <div class="tab-pane fade"
                                         id="nav-use-delete" role="tabpanel"
                                         aria-labelledby="nav-use-delete-tab">
                                        <table class="table table-hover">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên vai trò</th>
                                                <th scope="col">Mô tả</th>
                                                <th class="text-right" scope="col">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($deletedRoles as $key => $deletedRoleItem)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $deletedRoleItem->name }}</td>
                                                    <td>{{ $deletedRoleItem->display_name }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('roles.delete.recover', ['id' => $deletedRoleItem->id]) }}" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </a>
                                                        <button
                                                            data-url="{{ route('roles.delete.permanently', ['id' => $deletedRoleItem->id]) }}"
                                                            class="btn btn-danger btn-sm action-delete">
                                                            <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $deletedRoles->links() }}
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
