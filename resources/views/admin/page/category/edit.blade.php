@extends('admin.layout')
@section('title', 'Chỉnh Sửa Danh MỤc')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Chỉnh Sửa Danh MỤc', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <!-- form start -->
                            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name_category">Tên danh mục</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name_category" name="name" placeholder="Tên danh mục" value="{{ $category->name }}"
                                               onkeyup="ChangeToSlug();">
                                        <label class="d-flex align-items-center"><small>Slug:</small>
                                            <input type="text" class="form-control form-control-border form-control-sm bg-white border-bottom-0"
                                                   id="slug_category" name="slug" placeholder="slug-name" value="{{ $category->slug }}" readonly="readonly">
                                        </label>
                                        @error('name')
                                        <div class="alert alert-default-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_id">Chọn danh mục cha</label>
                                        <select class="custom-select" name="parent_id" id="parent_id">
                                            <option value="0">Danh mục cha</option>
                                            {!! $htmlOption !!}
                                        </select>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="view_home" value="{{ !($category->view_home == null) ? null : 1 }}"
                                               id="view_home" class="form-check-input"
                                               {{ !($category->view_home == null) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="view_home">Hiển thị trang chủ</label>
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
    <script language="javascript">
        function ChangeToSlug()
        {
            var title, slug;

            //Lấy text từ thẻ input name
            title = document.getElementById("name_category").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug_category').value = slug;
        }
    </script>
@endsection
