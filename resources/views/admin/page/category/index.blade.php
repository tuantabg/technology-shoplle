@extends('admin.layout')
@section('title', 'Danh MỤc Sản Phẩm')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Danh MỤc Sản Phẩm', 'key' => true, 'route' => 'categories.create'])

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
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Slug</th>
                                        <th class="text-right" scope="col">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $key => $category)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('categories.delete', ['id' => $category->id]) }}"  class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{ $categories->links() }}
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
        $(document).ready(function() {
            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 2000);
        });
    </script>
@endsection
