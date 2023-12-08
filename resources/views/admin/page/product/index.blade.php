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
                                                    <p class="m-0">{{ number_format($product->price) }}</p>
                                                @else
                                                    <p class="m-0" style="text-decoration: line-through;">{{ number_format($product->price) }}</p>
                                                    <p class="m-0">{{ number_format($product->discount) }}</p>
                                                @endif
                                            </td>
                                            <td>{{ optional($product->category)->name }}</td>
                                            <td>{{ $product->detail }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <button
                                                   data-url="{{ route('products.delete', ['id' => $product->id]) }}"
                                                   class="btn btn-danger btn-sm action-delete"
                                                >
                                                    <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{ $products->links() }}
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
@endsection
