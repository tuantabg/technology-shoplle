@extends('admin.layout')
@section('title', 'Thêm Mới Menu')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Thêm Mới Menu', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-default-success" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="card">
                            <!-- form start -->
                            <form action="{{ route('menus.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name_menu">Tên Menu</label>
                                        <input type="text" class="form-control"
                                               id="name_menu" name="name" placeholder="Nhập tên...">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug_menu">URL:</label>
                                        <input type="text" class="form-control"
                                               id="slug_menu" name="slug" placeholder="Nhập URL...">
                                        <small>Ví dụ: http://localhost:8000/</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_id">Chọn menu cha</label>
                                        <select class="custom-select" name="parent_id" id="parent_id">
                                            <option value="0">Menu cha</option>
                                            {!! $htmlOption !!}
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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
    <script src="{{ asset('common/alertSetTimeout.js') }}"></script>
@endsection
