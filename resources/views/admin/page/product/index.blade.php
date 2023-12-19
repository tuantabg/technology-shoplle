@extends('admin.layout')
@section('title', 'Danh Sách Sản Phẩm')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Danh Sách Sản Phẩm', 'key' => true, 'route' => 'products.create'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body table-responsive">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase active" id="nav-product-tab" data-toggle="pill"
                                           href="#nav-product" role="tab" aria-controls="pills-home"
                                           aria-selected="true">Sản phẩm
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" id="pills-profile-tab" data-toggle="pill"
                                           href="#nav-product-delete" role="tab" aria-controls="nav-product-delete"
                                           aria-selected="false">Sản phẩm đã xóa
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active"
                                         id="nav-product" role="tabpanel"
                                         aria-labelledby="nav-product-tab">
                                        <table class="table table-hover">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" width="6%">Mã SP</th>
                                                <th scope="col" width="14%">Tên SP</th>
                                                <th scope="col" width="6%">Hình ảnh</th>
                                                <th scope="col" width="8%">
                                                    <p class="m-0">Giá gốc</p>
                                                    <p class="m-0">Giá đã giảm</p>
                                                </th>
                                                <th scope="col" width="14%">Danh mục</th>
                                                <th scope="col">Mô tả ngắn</th>
                                                <th class="text-right" scope="col" width="92">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $key => $product)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $product->product_code }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td><img src="{{ $product->feature_image_path }}" alt="{{ $product->feature_image_name }}" width="50px"></td>
                                                    <td>
                                                        @if(!$product->discount)
                                                            <p class="m-0 font-weight-bold">{{ number_format($product->price) }}</p>
                                                        @else
                                                            <p class="m-0 small" style="text-decoration: line-through;">{{ number_format($product->price) }}</p>
                                                            <p class="m-0 font-weight-bold">{{ number_format($product->discount) }}</p>
                                                        @endif
                                                    </td>
                                                    <td>{{ optional($product->category)->name }}</td>
                                                    <td>{!! $product->detail !!}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </a>
                                                        <button
                                                            data-url="{{ route('products.delete', ['id' => $product->id]) }}"
                                                            class="btn btn-danger btn-sm action-delete">
                                                            <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $products->links() }}
                                    </div>
                                    <div class="tab-pane fade"
                                         id="nav-product-delete" role="tabpanel"
                                         aria-labelledby="nav-product-delete-tab">
                                        <table class="table table-hover">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" width="6%">Mã SP</th>
                                                <th scope="col" width="14%">Tên SP</th>
                                                <th scope="col" width="6%">Hình ảnh</th>
                                                <th scope="col" width="8%">
                                                    <p class="m-0">Giá gốc</p>
                                                    <p class="m-0">Giá đã giảm</p>
                                                </th>
                                                <th scope="col" width="14%">Danh mục</th>
                                                <th scope="col">Mô tả ngắn</th>
                                                <th class="text-right" scope="col" width="92">Tác vụ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($deletedProducts as $key => $deletedProductItem)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $deletedProductItem->product_code }}</td>
                                                    <td>{{ $deletedProductItem->name }}</td>
                                                    <td><img src="{{ $deletedProductItem->feature_image_path }}"
                                                             alt="{{ $deletedProductItem->feature_image_name }}"
                                                             width="50px">
                                                    </td>
                                                    <td>
                                                        @if(!$deletedProductItem->discount)
                                                            <p class="m-0 font-weight-bold">
                                                                {{ number_format($deletedProductItem->price) }}
                                                            </p>
                                                        @else
                                                            <p class="m-0 small" style="text-decoration: line-through;">
                                                                {{ number_format($deletedProductItem->price) }}
                                                            </p>
                                                            <p class="m-0 font-weight-bold">
                                                                {{ number_format($deletedProductItem->discount) }}
                                                            </p>
                                                        @endif
                                                    </td>
                                                    <td>{{ optional($deletedProductItem->category)->name }}</td>
                                                    <td>{!! $deletedProductItem->detail !!}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('products.delete.recover', ['id' => $deletedProductItem->id]) }}"
                                                           class="btn btn-primary btn-sm">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </a>
                                                        <button
                                                            data-url="{{ route('products.delete.permanently', ['id' => $deletedProductItem->id]) }}"
                                                            class="btn btn-danger btn-sm action-delete">
                                                            <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{ $deletedProducts->links() }}
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
