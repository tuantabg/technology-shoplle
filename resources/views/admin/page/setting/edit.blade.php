@extends('admin.layout')
@section('title', 'Chỉnh Sửa Cài Đặt')
@section('style')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Chỉnh Sửa Cài Đặt', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <!-- form start -->
                            <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="config_key">Config key</label>
                                        <input type="text"
                                               class="form-control @error('config_key') is-invalid @enderror"
                                               id="config_key"
                                               name="config_key"
                                               placeholder="Nhập config key"
                                               value="{{ $setting->config_key }}">
                                        @error('config_key')
                                        <div class="alert alert-danger alert-default-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if(request()->type === 'Text')
                                        <div class="form-group">
                                            <label for="config_value">Config value</label>
                                            <input type="text"
                                                   class="form-control @error('config_value') is-invalid @enderror"
                                                   id="config_value"
                                                   name="config_value"
                                                   placeholder="Nhập config value"
                                                   value="{{ $setting->config_value }}">
                                            @error('config_value')
                                            <div class="alert alert-danger alert-default-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @elseif(request()->type === 'Textarea')
                                        <div class="form-group">
                                            <label for="config_value_textarea">Config value</label>
                                            <textarea id="config_value_textarea"
                                                      class="form-control @error('config_value') is-invalid @enderror"
                                                      name="config_value">
                                                      {!! $setting->config_value !!}
                                            </textarea>
                                            @error('config_value')
                                            <div class="alert alert-danger alert-default-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif
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
@endsection
