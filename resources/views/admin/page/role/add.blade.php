@extends('admin.layout')
@section('title', 'Thêm Mới Vai Trò')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Thêm Mới Vai Trò', 'key' => false, 'route' => null])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">

                            <!-- form start -->
                            <form action="{{ route('roles.store') }}" method="post">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_role">Tên Menu</label>
                                            <input type="text" class="form-control"
                                                   id="name_role" name="name"
                                                   placeholder="Tên vai trò"
                                                   value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="display_name">Mô tả</label>
                                            <textarea id="display_name"
                                                      class="form-control description-editor"
                                                      name="display_name">{{ old('display_name') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                @foreach($permissionsParent as $key => $permissionParentItem )
                                    <div class="card border-primary">
                                        <div class="card-body">
                                            <div class="card-header row">
                                                <div class="form-group form-check mb-0">
                                                    <input type="checkbox"
                                                           class="form-check-input checkbox-wrapper cursor-pointer"
                                                           id="module_check_{{ $permissionParentItem->id }}">
                                                    <label class="form-check-label cursor-pointer"
                                                           for="module_check_{{ $permissionParentItem->id }}">
                                                        Module {{ $permissionParentItem->name }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card-body text-primary row">
                                                @foreach($permissionParentItem->permissionsChildrent as $permissionsChildrentItem )
                                                    <div class="form-group form-check col-md-3">
                                                        <input type="checkbox"
                                                               class="form-check-input checkbox-childrent cursor-pointer"
                                                               id="permission_childrent_item_{{ $permissionsChildrentItem->id }}"
                                                               value="{{ $permissionsChildrentItem->id }}">
                                                        <label class="form-check-label cursor-pointer"
                                                               for="permission_childrent_item_{{ $permissionsChildrentItem->id }}">
                                                            {{ $permissionsChildrentItem->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

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
@section('javascript')
    <script language="javascript">
        $('.checkbox-wrapper').on('click', function () {
            $(this).parents('.card').find('.checkbox-childrent').prop('checked', $(this).prop('checked'))
        })
    </script>
@endsection
