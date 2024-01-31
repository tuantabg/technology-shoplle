@php $baseUrl = config('app.base_url'); @endphp

@if($sliders)
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($sliders as $key => $slider)
                                <li data-target="#slider-carousel" data-slide-to="{{ $loop->index }}" class="{{ ($loop->index == 0) ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            @foreach($sliders as $key => $slider)
                                <div class="item {{ ($loop->index == 0) ? 'active' : '' }}">
                                    <div class="col-sm-6">
                                        <h1 class="font-weight-bold">{{ $slider->name }}</h1>
                                        {{--<h2>Free E-Commerce Template</h2>--}}
                                        <p>{!! $slider->description !!}</p>
                                        @if(!$slider->image_url == null)
                                            <a href="{{ $slider->image_url }}" class="btn btn-default get">Get it now</a>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{ $baseUrl . $slider->image_path }}" class="girl img-responsive" alt="{{ $slider->image_name }}" />
                                        <img src="{{ asset('technology_shoplle/images/home/pricing.png') }}"  class="pricing" alt="" />
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    @include('client.partials.advertisement')
@endif
