@extends('admin.layout')
@section('title', 'Danh MỤc Sản Phẩm')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Danh MỤc Sản Phẩm', 'key' => true, 'route' => 'categories.create', 'permission' => 'addCategory'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-default-success" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body table-responsive">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase active" id="nav-product-tab" data-toggle="pill"
                                           href="#nav-product" role="tab" aria-controls="pills-home"
                                           aria-selected="true">Danh mục
                                        </a>
                                    </li>
                                    @can('deleteCategory')
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" id="pills-profile-tab" data-toggle="pill"
                                           href="#nav-product-delete" role="tab" aria-controls="nav-product-delete"
                                           aria-selected="false">Danh mục đã xóa
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active"
                                         id="nav-product" role="tabpanel"
                                         aria-labelledby="nav-product-tab">
                                        <table class="table table-hover">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên danh mục</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">Trang chủ</th>
                                                <th class="text-right" scope="col">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $key => $category)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td>{{ !($category->view_home == null) ? 'Hiển thị' : 'Ẩn' }}</td>
                                                    <td class="text-right">
                                                        @can('editCategory')
                                                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                        @endcan
                                                        @can('deleteCategory')
                                                            <button
                                                                data-url="{{ route('categories.delete', ['id' => $category->id]) }}"
                                                                class="btn btn-danger btn-sm action-delete">
                                                                <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                            </button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $categories->links() }}
                                    </div>
                                    <div class="tab-pane fade"
                                         id="nav-product-delete" role="tabpanel"
                                         aria-labelledby="nav-product-delete-tab">
                                        <table class="table table-hover">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên danh mục</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">Hiển thị</th>
                                                <th class="text-right" scope="col">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($deletedCategories as $key => $deletedCategory)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $deletedCategory->name }}</td>
                                                    <td>{{ $deletedCategory->slug }}</td>
                                                    <td>{{ !($deletedCategory->view_home == null) ? 'Hiển thị' : 'Ẩn' }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('categories.delete.recover', ['id' => $deletedCategory->id]) }}"
                                                           class="btn btn-primary btn-sm">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </a>
                                                        <button
                                                            data-url="{{ route('categories.delete.permanently', ['id' => $deletedCategory->id]) }}"
                                                            class="btn btn-danger btn-sm action-delete">
                                                            <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $deletedCategories->links() }}
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ asset('common/sweetalert2/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('common/sweetalert2/configSweetAlert2.js') }}"></script>
    <script src="{{ asset('common/alertSetTimeout.js') }}"></script>
@endsection
