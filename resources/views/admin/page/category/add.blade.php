@extends('admin.layout')
@section('title', 'Thêm Mới Danh MỤc')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Thêm Mới Danh MỤc', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <!-- form start -->
                            <form action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name_category">Tên danh mục</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name_category" name="name" placeholder="Tên danh mục"
                                               onkeyup="ChangeToSlug();">
                                        <label class="d-flex align-items-center"><small>Slug:</small>
                                            <input type="text" class="form-control form-control-border form-control-sm bg-white border-bottom-0"
                                                   id="slug_category" name="slug" placeholder="slug-name" readonly="readonly">
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
    <script language="javascript" src="{{ asset('common/ChangeToSlug.js') }}"></script>
@endsection
