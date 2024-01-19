@extends('admin.layout')
@section('title', 'Thêm mới quyền (Permission)')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Thêm mới quyền (Permission)', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <form action="{{ route('permissions.store') }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="module_name">Tên module (en)</label>
                                        <input type="text" class="form-control"
                                               id="module_name" name="module_name" placeholder="Tên menu">
                                    </div>
                                    <div class="form-group">
                                        <label for="display_name">Tên module (vn)</label>
                                        <input type="text" class="form-control"
                                               id="display_name" name="display_name" placeholder="Tên menu">
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_id">Chọn module cha</label>
                                        <select class="custom-select" name="parent_id" id="parent_id">
                                            <option value="0">module cha</option>
                                            {!! $htmlOption !!}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card container">
                                <div class="card-body row">
                                    @foreach(config('permissions.table_module') as $key => $moduleItem)
                                        <div class="form-group form-check col-md-3 mb-0">
                                            <input type="checkbox"
                                                   name="module_children[]"
                                                   class="form-check-input cursor-pointer"
                                                   id="{{ $moduleItem }}_check"
                                                   value="{{ $key }}">
                                            <label class="form-check-label text-capitalize cursor-pointer"
                                                   for="{{$moduleItem}}_check">
                                                {{ $moduleItem }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

@endsection
