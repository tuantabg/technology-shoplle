@extends('admin.layout')
@section('title', 'Chỉnh Sửa Tài khoản')
@section('style')
    <link rel="stylesheet" href="{{ asset('common/common.css') }}">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Chỉnh Sửa Tài Khoản', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <!-- form start -->
                            <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="feature_image_path" class="col-sm-2 col-form-label">Ảnh Đại diện</label>
                                        <div class="file-upload col-sm-100" style="padding-right: 7.5px;padding-left: 7.5px;">
                                            <div class="image-upload-wrap" style="{{ $user->feature_image_path ? 'display: none;' : '' }} width: 10rem; height: 10rem;">
                                                <input id="feature_image_path"
                                                       class="file-upload-input form-control-file"
                                                       name="feature_image_path" type='file'
                                                       onchange="readURL(this);" accept="image/*"
                                                       value="{{ $user->feature_image_path }}"/>
                                                <div class="drag-text">
                                                    <h3>Tải ảnh lên</h3>
                                                </div>
                                            </div>
{{--                                            {{ dd($user) }}--}}
                                            <div class="file-upload-content" style="{{ $user->feature_image_path ? 'display: block;' : '' }} padding: 0;">
                                                <img id="feature_upload_image"
                                                     class="file-upload-image form-control-file"
                                                     src="{{ $user->feature_image_path }}"
                                                     alt="{{ $user->feature_image_name }}" style="width: 10rem; height: 10rem; object-fit: cover;"/>
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
                                                   value="{{ $user->name }}">
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
                                                   value="{{ $user->email }}" {{ $user->email ? 'disabled' : ''  }}>
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
{{--                                    {{ dd($roleUsers) }}--}}
                                    <div class="form-group row">
                                        <label for="role_id" class="col-sm-2 col-form-label">Vai trò</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('role_id') is-invalid @enderror"
                                                    name="role_id"
                                                    id="role_id">
                                                <option value=""></option>
                                                @foreach($roles as $key => $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ $roleOfUser->contains('id', $role->id) ? 'selected' : '' }}>
                                                        {{ $role->display_name }}
                                                    </option>
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
