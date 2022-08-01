@extends('Components.FontEnd.templates.main')
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-6">

                        <div class="single-shop-product">

                            <div class="product-upper">
                                <img src="{{ $product->feature_image }}" alt="">
                            </div>
                            <h2><a href="">{{ $product->name }}</a></h2>
                            <div class="product-carousel-price">
                                <ins>${{ number_format($product->price) }}</ins>
                                <del>${{ number_format($product->sale_price) }}</del>
                            </div>

                            <div class="product-option-shop">
                                <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70"
                                    rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                            </div>


                        </div>

                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
