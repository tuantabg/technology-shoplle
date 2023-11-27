@extends('admin.layout')
@section('title', 'Thêm Mới sản phẩm')
@section('style')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <link href="{{ asset('common/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('common/common.css') }}">
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
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
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
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="d-inline-block mr-2">Dữ liệu sản phẩm</strong>
                                            <span class="d-inline-block mr-2">一</span>
                                            <div class="form-group d-inline-block mb-0">
                                                <select class="form-control" name="parent_id" id="parent_id" >
                                                    <option value="0">Loại sản phẩm</option>
                                                    <option value="1">Sản phẩm đơn giản</option>
                                                    <option value="2">3</option>
                                                    <option value="3">4</option>
                                                    <option value="4">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="list-group" id="list-tab" role="tablist">
                                                        <a class="list-group-item list-group-item-action active"
                                                           id="list_common_list" data-toggle="list" href="#list-common"
                                                           role="tab" aria-controls="common">Chung</a>
                                                        <a class="list-group-item list-group-item-action"
                                                           id="list-profile-list" data-toggle="list" href="#list-profile"
                                                           role="tab" aria-controls="profile">Profile</a>
                                                        <a class="list-group-item list-group-item-action"
                                                           id="list-messages-list" data-toggle="list" href="#list-messages"
                                                           role="tab" aria-controls="messages">Messages</a>
                                                        <a class="list-group-item list-group-item-action"
                                                           id="list-settings-list" data-toggle="list" href="#list-settings"
                                                           role="tab" aria-controls="settings">Settings</a>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show form-inline active"
                                                             id="list-common" role="tabpanel"
                                                             aria-labelledby="list_common_list">

                                                            <div class="form-group mb-3">
                                                                <label class="col-sm-2 justify-content-start" for="name_menu">Giá</label>
                                                                <input type="text" class="form-control col-auto mx-sm-3"
                                                                       id="name_menu" name="price" placeholder="" />
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="col-sm-2 justify-content-start" for="name_menu">Giá khuyến mãi</label>
                                                                <input type="text" class="form-control col-auto mx-sm-3"
                                                                       id="name_menu" name="discount" placeholder="" />
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade"
                                                             id="list-profile" role="tabpanel"
                                                             aria-labelledby="list-profile-list">...</div>
                                                        <div class="tab-pane fade"
                                                             id="list-messages" role="tabpanel"
                                                             aria-labelledby="list-messages-list">...</div>
                                                        <div class="tab-pane fade"
                                                             id="list-settings" role="tabpanel"
                                                             aria-labelledby="list-settings-list">...</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Mô tả ngắn</label>
                                                <textarea id="short_description" class="form-control description-editor" name="detail"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Mô tả chi tiết</label>
                                                <textarea id="detailed_description" class=" form-control description-editor" name="content"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="parent_id">Chọn danh mục</label>
                                                <select class="form-control" name="parent_id" id="parent_id" >
                                                    {!! $htmlOption !!}
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="file-upload">
                                                    <label for="feature_image_path">Upload ảnh</label>
                                                    <div class="image-upload-wrap">
                                                        <input id="feature_image_path"
                                                               class="file-upload-input form-control-file"
                                                               name="feature_image_path" type='file'
                                                               onchange="readURL(this);" accept="image/*" />
                                                        <div class="drag-text">
                                                            <h3>Ảnh sản phẩm chính</h3>
                                                        </div>
                                                    </div>
                                                    <div class="file-upload-content">
                                                        <img id="feature_upload_image" class="file-upload-image form-control-file" src="#" alt="your image" />
                                                        <div class="image-title-wrap">
                                                            <button type="button" onclick="removeUpload()" class="remove-image">
                                                                <i class="fa fa-times nav-icon" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="feature_image_path_multiple">Upload ảnh mô tả</label>
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <span><i class="fa fa-upload mr-2" aria-hidden="true"></i>TẢI HÌNH ẢNH</span>
                                                            <input type="file" multiple data-max_length="20" name="image_path[]" class="upload__inputfile form-control-file" id="feature_image_path_multiple">
                                                        </label>
                                                    </div>
                                                    <div class="upload__img-wrap"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="tags">Tags</label>
                                                <select class="form-control tags_select_choose" multiple="multiple" name="tags" id="tags">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="{{ asset('common/select2/select2.min.js') }}"></script>
    <script src="{{ asset('common/common.js') }}"></script>
@endsection
