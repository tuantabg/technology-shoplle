<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="text-uppercase m-0">{{ $name }}</h1>
            </div><!-- /.col -->
            @if($key == true)
                <div class="col-sm-2 text-right">
                    <a href="{{ route($route) }}" class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Thêm mới
                    </a>
                </div>
            @endif
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
