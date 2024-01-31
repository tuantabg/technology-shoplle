@php $baseUrl = config('app.base_url'); @endphp

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features</h2>
    @foreach($products as $key => $productItem)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ $baseUrl . $productItem->feature_image_path }}" alt="{{ $productItem->feature_image_name }}" />
                        @if(!$productItem->discount)
                            <h2>{{ number_format($productItem->price) }} VND</h2>
                        @else
                            <h2>{{ number_format($productItem->discount) }} VND
                                <p class="small" style="text-decoration: line-through;">
                                    {{ number_format($productItem->price) }} VND
                                </p>
                            </h2>
                        @endif
                        <p>{{ $productItem->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <img src="{{ $baseUrl . $productItem->feature_image_path }}" alt="{{ $productItem->feature_image_name }}" />
                            @if(!$productItem->discount)
                                <h2>{{ number_format($productItem->price) }} VND</h2>
                            @else
                                <h2>{{ number_format($productItem->discount) }} VND
                                    <p class="small" style="text-decoration: line-through;">
                                        {{ number_format($productItem->price) }} VND
                                    </p>
                                </h2>
                            @endif
                            <p>{{ $productItem->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div><!--features_items-->
