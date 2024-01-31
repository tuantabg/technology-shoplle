@php $baseUrl = config('app.base_url'); @endphp

<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categoryProduct as $key => $categoryItem)
                <li class="{{ ($key == 0) ? 'active' : '' }}">
                    <a href="#{{ $categoryItem->name . '_' . $categoryItem->id }}" data-toggle="tab">
                        {{ $categoryItem->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($categoryProduct as $key => $categoryProductItem)
            <div class="tab-pane fade {{ ($key == 0) ? 'active in' : '' }}"
                 id="{{ $categoryProductItem->name . '_' . $categoryProductItem->id }}">
                @foreach($categoryProductItem->products as $key => $productItem)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ $baseUrl . $productItem->feature_image_path }}" alt="{{ $productItem->feature_image_name }}" />
                                    @if(!$productItem->discount)
                                        <h3>{{ number_format($productItem->price) }} VND</h3>
                                    @else
                                        <h3>{{ number_format($productItem->discount) }} VND
                                            <p class="small" style="text-decoration: line-through;">
                                                {{ number_format($productItem->price) }} VND
                                            </p>
                                        </h3>
                                    @endif
                                    <p>{{ $productItem->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div><!--/category-tab-->
