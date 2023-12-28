@extends('admin.layout')
@section('title', 'Menu')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1 class="text-uppercase m-0">Danh Sách Cài Đặt</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-2 text-right">
                        <div class="btn-group">
                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#" >
                                Thêm cài đặt
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="item">
                                    <a href="{{ route('settings.create') . '?type=Text' }}" class="dropdown-item">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        Thêm mới Text
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="{{ route('settings.create') . '?type=Textarea' }}" class="dropdown-item">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        Thêm mới Textarea
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

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
                                        <th scope="col">Config key</th>
                                        <th scope="col">Config value</th>
                                        <th class="text-right" scope="col">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($settings as $key => $setting)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $setting->config_key }}</td>
                                            <td>{!! $setting->config_value !!}</td>
                                            <td class="text-right">
                                                <a href="{{ route('settings.edit', ['id' => $setting->id]) . '?type=' . $setting->type }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <button
                                                    data-url="{{ route('settings.delete', ['id' => $setting->id]) }}"
                                                    class="btn btn-danger btn-sm action-delete">
                                                    <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{ $settings->links() }}
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
