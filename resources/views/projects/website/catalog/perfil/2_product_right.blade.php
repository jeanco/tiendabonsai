<div class="shop-sing-item-detail">
    <div class="heading-sub" style="padding: 0px;"><h3 style="line-height: 1.9rem;"><a href="#">{{ $product['name'] }}</a></h3></div>
    <div class="brandname">vendido por <a href="/{{ $product['company']['slug_company'] }}"><strong>{{ $product['company']['name_company'] }}</strong></a></div>
    <!-- <div class="ratingstar">
        <a href="shop-single.html#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
        <a href="shop-single.html#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
        <a href="shop-single.html#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
        <a href="shop-single.html#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
        <a href="shop-single.html#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
        <span class="number">(12)</span>
        <a class="review">Add your review</a>
    </div> -->
    <div class="prod-price">
        @if($product['promotion_available'] == 1)
            <span class="price old">S/.{{ $product['price'] }}</span>
            <span class="price">S/.{{ $product['price_promotion'] }}</span>
        @else
            <span class="price" style="font-size: 18px;">S/.{{ $product['price'] }}</span>
        @endif
    </div>
    <div class="description">
        <p>{!! $product['description'] !!}</p>
    </div>
    <div class="group-button">
        <form action="shop-single.html#" class="cart">
            <div class="quantity">
                <button type="button" class="quantity-left-minus btn btn-number" data-type="minus" data-field="">
                    <span class="minus-icon"></span>
                </button>
                <input type="number" name="number" value="1" id="quantity">
                <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                    <span class="plus-icon"></span>
                </button>
            </div>
        </form>
        <div class="button-ver2  notification_cart">
            {{--<a href="" class="link-ver1 addcart-ver2 ok" id="add_item_to_cart_with_number" data-index="{{ $product['id'] }}"><span class="icon"></span>AGREGAR</a>--}}

            <a href="" class="addcart add_to_cart ok" id="add_item_to_cart_with_number"  data-index="{{ $product['id'] }}"><span class="icon"></span>AGREGAR</a>

        </div>
    </div>
    <div class="product-feature">
        <ul class="product-feature-1">
            @if($product['stock'] != 0)
            <li><strong>Stock:</strong> {{ $product['stock'] }} unidades</li>
            @else
            <li><strong>Stock:</strong> No disponible</li>
            @endif
        </ul>
    </div>
</div>
