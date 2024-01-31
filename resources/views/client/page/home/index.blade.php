@php $baseUrl = config('app.base_url'); @endphp

@extends('client.layout')
@section('title', 'Trang Chủ')
@section('content')
    @include('client.partials.siderbar')

    <section>
        <div class="container">
            <div class="row">
                @include('client.partials.sidebar')

                <div class="col-sm-9 padding-right">
                    @include('client.page.home.components.features_product')
                    @include('client.page.home.components.category_tab')
                    @include('client.page.home.components.recommended_product')
                </div>
            </div>
        </div>
    </section>
@endsection
