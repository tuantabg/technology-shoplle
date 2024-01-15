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
                                                <a href="{{ route('roles.delete', ['id' => $role->id]) }}"  class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{ $roles->links() }}
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
    <script src="{{ asset('common/alertSetTimeout.js') }}"></script>
@endsection
