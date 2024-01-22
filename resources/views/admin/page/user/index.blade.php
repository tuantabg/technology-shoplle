@extends('admin.layout')
@section('title', 'Danh Sách Tài Khoản')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Danh Sách Tài Khoản', 'key' => true, 'route' => 'users.create', 'permission' => 'addUser'])

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
                                        @can('deleteUser')
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
                                                    <th scope="col">Hình ảnh</th>
                                                    <th scope="col">Tên</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Vai trò</th>
                                                    <th class="text-right" scope="col">Tác vụ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $key => $user)
                                                    <tr>
                                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                                        <td><img src="{{ $user->feature_image_path }}"
                                                                 alt="{{ $user->feature_image_name }}"
                                                                 width="50px">
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>@foreach($user->roles as $role){{ $role->display_name }}@endforeach</td>
                                                        <td class="text-right">
                                                            @can('editUser')
                                                                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                                </a>
                                                            @endcan
                                                            @can('deleteUser')
                                                                <button
                                                                    data-url="{{ route('users.delete', ['id' => $user->id]) }}"
                                                                    class="btn btn-danger btn-sm action-delete">
                                                                    <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                                </button>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            {{ $users->links() }}
                                        </div>
                                        <div class="tab-pane fade"
                                             id="nav-use-delete" role="tabpanel"
                                             aria-labelledby="nav-use-delete-tab">
                                            <table class="table table-hover">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Hình ảnh</th>
                                                    <th scope="col">Tên</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Vai trò</th>
                                                    <th class="text-right" scope="col">Tác vụ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($deletedUsers as $key => $deletedUserItem)
                                                    <tr>
                                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                                        <td><img src="{{ $deletedUserItem->feature_image_path }}"
                                                                 alt="{{ $deletedUserItem->feature_image_name }}"
                                                                 width="50px">
                                                        </td>
                                                        <td>{{ $deletedUserItem->name }}</td>
                                                        <td>{{ $deletedUserItem->email }}</td>
                                                        <td>@foreach($deletedUserItem->roles as $role){{ $role->display_name }}@endforeach</td>
                                                        <td class="text-right">
                                                            <a href="{{ route('users.delete.recover', ['id' => $deletedUserItem->id]) }}" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </a>
                                                            <button
                                                                data-url="{{ route('users.delete.permanently', ['id' => $deletedUserItem->id]) }}"
                                                                class="btn btn-danger btn-sm action-delete">
                                                                <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            {{ $deletedUsers->links() }}
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
