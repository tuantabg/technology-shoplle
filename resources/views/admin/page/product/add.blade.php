@extends('admin.layout')
@section('title', 'Thêm Mới sản phẩm')
@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <style type="text/css">
        .file-upload {background-color: #ffffff;margin: 0;padding: 0;}
        .file-upload-content {display: none;text-align: center;position: relative;}
        .file-upload-input {position: absolute;margin: 0;padding: 0;width: 100%;height: 100%;outline: none;opacity: 0;cursor: pointer;}
        .image-upload-wrap {border: 1px solid #1FB264;position: relative;width: 358.5px;height: 358.5px;}
        .image-dropping, .image-upload-wrap:hover {background-color: #1FB264;border: 1px solid #ffffff;}
        .image-title-wrap {position: absolute; top: 15px; right: 15px;}
        .drag-text {text-align: center;height: 100%;display: flex;justify-content: center;align-items: center;}
        .drag-text h3 {font-weight: 100;text-transform: uppercase;color: #15824B;padding: 60px 0;}
        .file-upload-image {max-height: 358.5px;max-width: 358.5px;margin: 0;padding: 0;}
        .remove-image {width: 40px;margin: 0;color: #fff;background: #cd4535;border: none;padding: 10px;border-radius: 4px;border-bottom: 1px solid #b02818;}
        .remove-image:hover {background: #c13b2a;color: #ffffff;transition: all .2s ease;cursor: pointer;}
        .remove-image:active {border: 0;transition: all .2s ease;}
    </style>
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Thêm Mới sản phẩm', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- form start -->
                        <form action="{{ route('products.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name_menu">Tên sản phẩm</label>
                                                <input type="text" class="form-control"
                                                       id="name_menu" name="name" placeholder="Tên menu">
                                            </div>

                                            <div class="form-group">
                                                <label>Mô tả ngắn</label>
                                                <textarea id="short_description" name="detail"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Mô tả chi tiết</label>
                                                <textarea id="detailed_description" name="content"></textarea>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name_menu">Giá sản phẩm</label>
                                                <input type="text" class="form-control"
                                                       id="name_menu" name="price" placeholder="Giá sản phẩm">
                                            </div>
                                            <div class="form-group">
                                                <label for="parent_id">Chọn danh mục</label>
                                                <select class="custom-select" name="parent_id" id="parent_id">
                                                    {!! $htmlOption !!}
                                                </select>
                                            </div>

                                            <div class="file-upload">
                                                <label for="feature_image_path">Ảnh sản phẩm</label>
                                                <div class="image-upload-wrap">
                                                    <input id="feature_image_path" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                                    <div class="drag-text">
                                                        <h3>Ảnh sản phẩm chính</h3>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content">
                                                    <img id="feature_upload_image" class="file-upload-image" src="#" alt="your image" />
                                                    <div class="image-title-wrap">
                                                        <button type="button" onclick="removeUpload()" class="remove-image">
                                                            <i class="fa fa-trash nav-icon" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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

    <script language="javascript">
        $(document).ready(function() {
            // Summernote Short Description
            $('#short_description').summernote({
                tabsize: 2,
                height: 100
            })
            // Summernote Detailed Description
            $('#detailed_description').summernote({
                tabsize: 2,
                height: 200
            })
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.image-upload-wrap').hide();
                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();
                    $('.image-title').html(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('#feature_image_path').val('');
            $('#feature_upload_image').attr('src', '');
            $('.image-upload-wrap').show();
        }
        $('.image-upload-wrap').bind('dragover', function () {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
        });
    </script>
@endsection
