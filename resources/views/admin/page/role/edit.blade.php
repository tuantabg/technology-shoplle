@extends('admin.layout')
@section('title', 'Cập nhập Vai Trò')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Cập nhập Vai Trò', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <!-- form start -->
                            <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name_role">Tên Menu</label>
                                        <input type="text" class="form-control"
                                               id="name_role" name="name"
                                               placeholder="Tên vai trò"
                                               value="{{ $role->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="display_name">Mô tả</label>
                                        <textarea id="display_name"
                                                  class="form-control description-editor"
                                                  name="display_name">{{ $role->display_name }}</textarea>
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
