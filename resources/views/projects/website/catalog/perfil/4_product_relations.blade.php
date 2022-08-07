<div class="heading-shop">
    <h3>PRODUCTOS RELACIONADOS</h3>
</div>
<div class="widget-product-related">
    <div class="owl-carousel owl-theme js-owl-product">
        @foreach($interests as $key => $product)
        <div class="product-item">
            @if($product['promotion']['flag'] == 1)
            <div class="label pink">Promoción</div>
            @endif
            <div class="product-item-img-related prod-item-img">
                <a href="/productos/{{ $product['slug'] }}"><img src="{{ $product['imageThumbUrl'] }}" alt="images" class="img-responsive"></a>
                <div class="button">
                    <a href="" class="addcart add_to_cart ok" data-index="{{ $product['id'] }}"><span class="icon"></span>AGREGAR</a>
                    <a href="/productos/{{ $product['slug'] }}" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="product-item-info-related">
                <h4><a href="/productos/{{ $product['slug'] }}">{{ $product['name'] }}</a></h4>
                <div class="prod-price">
                    @if($product['promotion']['flag'] == 0)
                    <span class="price black">S/.{{ $product['price'] }}</span>
                    @else
                    <span class="price black">S/.{{ $product['promotion']['price'] }}</span>
                    <span class="price old">S/.{{ $product['price'] }}</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        <!--                         <div class="product-item">
            <div class="product-item-img-related prod-item-img">
                <a href="shop-single.html#"><img src="img/products/macmini2.jpg" alt="images" class="img-responsive"></a>
                <div class="button">
                    <a href="shop-single.html#" class="addcart">ADD TO CART</a>
                    <a href="shop-single.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                </div>
                <div class="label label-2 pink label-top-20">Sale</div>
            </div>
            <div class="product-item-info-related">
                <h3><a href="shop-single.html#">Sony Xperia X Compact - SN5605 VN Unlocked Smartphone...</a></h3>
                <div class="ratingstar">
                    <a href="shop-single.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-single.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-single.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-single.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-single.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <span class="number">(12)</span>
                </div>
                <div class="prod-price">
                    <span class="price black">$199.69</span>
                </div>
            </div>
        </div>
        <div class="product-item">
            <div class="product-item-img-related prod-item-img">
                <a href="shop-single.html#"><img src="img/products/canon.jpg" alt="images" class="img-responsive"></a>
                <div class="button">
                    <a href="shop-single.html#" class="addcart">ADD TO CART</a>
                    <a href="shop-single.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="product-item-info-related">
                <h3><a href="shop-single.html#">Sony MDRXB950BT/B Extra Bass Over Bluetooth Headphones...</a></h3>
                <div class="ratingstar">
                    <a href="shop-single.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-single.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-single.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-single.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <a href="shop-single.html#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                    <span class="number">(12)</span>
                </div>
                <div class="prod-price">
                    <span class="price old">$299.6</span>
                    <span class="price">$199.69</span>
                </div>
            </div>
        </div>
        <div class="product-item">
            <div class="product-item-img-related prod-item-img">
                <a href="shop-single.html#"><img src="img/products/seiko.jpg" alt="images" class="img-responsive"></a>
                <div class="button">
                    <a href="shop-single.html#" class="addcart">ADD TO CART</a>
                    <a href="shop-single.html#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="product-item-info-related">
                <h3><a href="shop-single.html#">Samsung UN65KS8000 65-Inch 4K Ultra HD Smart LED TV...</a></h3>
                <div class="prod-price">
                    <span class="price old">$299.6</span>
                    <span class="price">$199.69</span>
                </div>
            </div>
        </div> -->
    </div>
</div>
