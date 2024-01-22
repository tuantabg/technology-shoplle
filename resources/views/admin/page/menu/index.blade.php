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
                                                    <a href="{{ route('menus.delete', ['id' => $menu->id]) }}"  class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{ $menus->links() }}
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
