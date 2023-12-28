@extends('admin.layout')
@section('title', 'Slider')
@section('style')
    <link rel="stylesheet" href="{{ asset('common/common.css') }}">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.header-page', ['name'=> 'Danh Sách Slider', 'key' => true, 'route' => 'sliders.create'])

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
                                <table class="table table-hover">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" width="10%">Hình ảnh</th>
                                        <th scope="col">Tên menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">description</th>
                                        <th class="text-right" scope="col">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key => $slider)
                                        <tr>
                                            <th class="align-middle" scope="row">{{ $loop->index + 1 }}</th>
                                            <td class="align-middle">
                                                <img src="{{ $slider->image_path }}"
                                                     alt="{{ $slider->image_path }}"
                                                     width="200px"/>
                                            </td>
                                            <td class="align-middle">{{ $slider->name }}</td>
                                            <td class="align-middle">{{ $slider->image_url }}</td>
                                            <td class="align-middle">{!! $slider->description !!}</td>
                                            <td class="align-middle text-right">
                                                <a href="{{ route('sliders.edit', ['id' => $slider->id]) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <button
                                                    data-url="{{ route('sliders.delete', ['id' => $slider->id]) }}"
                                                    class="btn btn-danger btn-sm action-delete">
                                                    <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{ $sliders->links() }}
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
