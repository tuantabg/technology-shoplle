@extends('admin.layout')
@section('title', 'Thêm Mới Tài khoản')
@section('style')
    <link rel="stylesheet" href="{{ asset('common/common.css') }}">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Thêm Mới Tài Khoản', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <!-- form start -->
                            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="feature_image_path" class="col-sm-2 col-form-label">Ảnh Đại diện</label>
                                        <div class="file-upload col-sm-100" style="padding-right: 7.5px;padding-left: 7.5px;">
                                            <div class="image-upload-wrap" style="width: 10rem; height: 10rem;">
                                                <input id="feature_image_path"
                                                       class="file-upload-input form-control-file"
                                                       name="feature_image_path" type='file'
                                                       onchange="readURL(this);" accept="image/*" />
                                                <div class="drag-text">
                                                    <h3>Tải ảnh lên</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content" style="padding: 0;">
                                                <img id="feature_upload_image"
                                                     class="file-upload-image form-control-file"
                                                     src="#"
                                                     alt="your image" style="width: 10rem; height: 10rem; object-fit: cover;"/>
                                                <div class="image-title-wrap">
                                                    <button type="button"
                                                            onclick="removeUpload()"
                                                            class="remove-image">
                                                        <i class="fa fa-times nav-icon" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name_menu" class="col-sm-2 col-form-label">Tên tài khoản</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   id="name_menu"
                                                   name="name"
                                                   placeholder="Họ tên..."
                                                   value="{{ old('name') }}">
                                            @error('name')
                                            <div class="alert alert-default-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                   id="email"
                                                   name="email"
                                                   placeholder="Email..."
                                                   value="{{ old('email') }}">
                                            @error('email')
                                            <div class="alert alert-default-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Mật khẩu</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                   id="password"
                                                   name="password"
                                                   placeholder="Mật khẩu...">
                                            @error('password')
                                            <div class="alert alert-default-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="role_id" class="col-sm-2 col-form-label">Vai trò</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('role_id') is-invalid @enderror"
                                                    name="role_id"
                                                    id="role_id">
                                                <option value=""></option>
                                                @foreach($roleUsers as $key => $roleUser)
                                                    <option value="{{ $roleUser->id }}">{{ $roleUser->display_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('role_id')
                                        <div class="alert alert-default-danger mt-1">{{ $message }}</div>
                                        @enderror
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
    <script src="{{ asset('common/common.js') }}"></script>
@endsection
