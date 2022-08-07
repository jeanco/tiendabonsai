<div class="brand slider-view" style="padding-top: 0px;">
    @foreach($categories_with_products as $i => $category)
    <div class="container">
        <h2>{{ $category['name'] }}</h2><br>
        <div class="owl-carousel owl-theme js-owl-brand">
          <!-- Producto 1 -->
            @foreach($category['products'] as $u => $product)
            <div class="item" style="padding: 0px 10px;">
              <div class="product-item ver2 shop-border">
                <div class="prod-item-img bd-style-2" style="border-bottom: 0px;">
                  <a href="#">
                    <img src="{{ ($product['photo'] != null) ? $product['photo']['resource_thumb'] : ''}}" alt="images" class="img-responsive" style="background: #ffffff; border-radius: 5px;width: 100%; height: 200px; object-fit: cover; "></a>
                  <div class="button" style="padding: 10px 0px 10px 10px; background: #000000ad; width: 100%; height: 201px; border-radius: 5px;">
                    <div style="height: 140px;">
                      <a href="#" style="color: #555;"><span style="font-size: 18px; font-weight: 700">{{ $product['name'] }}</span></a>
                      <div class="ratingstar sm">
                        <span class="number" style="margin-left: 0px; color: #fff;">stock (12)</span>
                      </div>
                    </div>
                    <a href="" class="addcart add_to_cart" data-index="">Agregar</a>
                    <a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  </div>
                </div>
                <div class="prod-info" style="padding-left: 10px; padding-top: 0px;">
                  <div class="prod-price">
                    @if($product['promotion_available'])
                    <span class="price black" style="color: #555;">S/. {{ $product['price_promotion'] }}</span><br>
                    <span style="color: #505050; text-decoration:line-through; font-size: 10px;">S/. {{ $product['price'] }}</span>
                    @else
                    <span class="price black" style="color: #555;">S/. {{ $product['price'] }}</span><br>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="brand slider-none" style="padding-top: 0px;">
    <div class="container">
        <h2>Promociones destacadas</h2><br>
        <div class="owl-carousel owl-theme js-owl-brand">
          <!-- Producto 1 -->
            <div class="item" style="padding: 0px 10px;">
              <div class="product-item ver2 shop-border">
                <div class="prod-item-img bd-style-2" style="border-bottom: 0px;">
                  <a href="#">
                    <img src="/website/img/products/canon_pixma.jpg" alt="images" class="img-responsive" style="background: #ffffff; border-radius: 5px;width: 100%; height: 200px; object-fit: cover;"></a>
                  <div class="button" style="padding: 0px 0px 10px 10px;">
                    <a href="" class="addcart" data-index="">Agregar</a>
                    <a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  </div>
                </div>
                <div class="prod-info" style="padding-left: 10px;     height: 125px;">
                  <h3><a href="#" style="color: #555;">Canon MX492 Wireless All-IN-One Small...</a></h3>
                  <div class="ratingstar sm">
                    <span class="number" style="margin-left: 0px; color: #505050;">stock (12)</span>
                  </div>
                  <div class="prod-price">
                    <span class="price black" style="color: #555;">S/. 999.99</span><br>
                    <span style="color: #505050; text-decoration:line-through; font-size: 10px;">S/. 999.99</span>
                  </div>
                </div>
              </div>
            </div>
          <!-- ////////////////////////// -->
        </div>
    </div>
</div>
