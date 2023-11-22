@extends('admin.layout')
@section('title', 'Danh MỤc Sản Phẩm')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('admin.partials.header-page', ['name'=> 'Bảng điều khiển', 'key' => false, 'route' => null])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            Dashboard
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
