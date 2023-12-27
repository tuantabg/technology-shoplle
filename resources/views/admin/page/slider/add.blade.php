@extends('admin.layout')
@section('title', 'Thêm Mới slider')
@section('style')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('common/common.css') }}">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Thêm Mới slider', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <div class="card">
                            <!-- form start -->
                            <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name_menu">Tiêu đề</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name_menu" name="name" placeholder="Tên menu"
                                               value="{{ old('name') }}"/>
                                        @error('name')
                                        <div class="alert alert-danger alert-default-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image_url">URL</label>
                                        <input type="text" class="form-control"
                                               id="image_url" name="image_url"
                                               value="{{ old('image_url') }}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="image_description">Mô tả</label>
                                        <textarea id="image_description"
                                                  class="form-control description-editor"
                                                  name="description">{{ old('description') }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="upload">Hình Ảnh</label>
                                        <div id="image_upload_file" class="input-group bg-white @error('image_path') border-danger @enderror">
                                            <input id="upload" type="file" onchange="readURL(this);"
                                                   class="form-control border-0" name="image_path">
                                            <label id="upload-label" for="upload"
                                                   class="font-weight-light text-muted">Tải hình ảnh
                                            </label>
                                            <div class="input-group-append">
                                                <label for="upload" class="btn btn-light m-0 px-4">
                                                    <i class="fa fa-cloud-upload mr-2 text-muted"></i>
                                                    <small class="text-uppercase font-weight-bold text-muted">Chọn tập tin</small>
                                                </label>
                                            </div>
                                        </div>
                                        @error('image_path')
                                        <div class="alert alert-danger alert-default-danger mt-1">{{ $message }}</div>
                                        @enderror
                                        <div class="image-area mt-3">
                                            <img id="imageResult" src="#" alt=""
                                                 class="img-fluid rounded shadow-sm mx-auto d-block" />
                                        </div>
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
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('common/summernote/summernote.js') }}"></script>
    <script src="{{ asset('common/imageUploadFile/image_upload_file.js') }}"></script>
    <script src="{{ asset('common/alertSetTimeout.js') }}"></script>
@endsection
