@extends('admin.layout')
@section('title', 'Phân quyền (Permission)')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Phân quyền (Permission)', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">

                        <!-- form start -->
                        <form action="{{ route('permissions.store') }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="module_parert">Chọn module</label>
                                        <select class="form-control text-capitalize
                                                @error('module_parert') is-invalid @enderror"
                                                name="module_parert"
                                                id="module_parert">
                                            <option>Chọn tên module</option>
                                            @foreach(config('permissions.table_module') as $key => $moduleItem)
                                                <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                            @endforeach
                                        </select>
                                        @error('module_parert')
                                            <div class="alert alert-default-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body row">
                                    @foreach(config('permissions.module_childrent') as $key => $moduleItemChildrent)
                                        <div class="form-group form-check col-md-3 mb-0">
                                            <input type="checkbox"
                                                   name="module_chilrent[]"
                                                   class="form-check-input cursor-pointer"
                                                   id="{{ $moduleItemChildrent }}_check"
                                                   value="{{ $moduleItemChildrent }}">
                                            <label class="form-check-label text-capitalize cursor-pointer"
                                                   for="{{$moduleItemChildrent}}_check">
                                                {{ $moduleItemChildrent }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mb-5">Submit</button>
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
