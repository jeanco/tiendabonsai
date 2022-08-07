<div class="col-md-5" style="padding: 0px;">
  <div class="shop-single-item-img">
    <div class="main-img" style="border: 1px solid #ff6600; border-radius: 10px;">
      @foreach($product['images'] as $key => $image)
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="{{ $image['resource'] }}" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      @endforeach
      <!--           <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos_1.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos_2.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos_3.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos_4.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos_5.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos_6.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos_7.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos_8.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos_9.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div>
      <div class="main-img-item">
        <a href="javascript:void(0);"><img src="/website/img/products/canoneos_10.jpg" alt="images" class="img-responsive" style="border-radius: 10px;"></a>
      </div> -->
    </div>
    <ul class="multiple-img-list">
      @foreach($product['images'] as $key => $image)
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img style="border: 1px solid #ff6600;
            border-radius: 5px;" src="{{ $image['resource_thumb'] }}" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      @endforeach
      <!-- <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img style="    border: 1px solid #ff6600;
            border-radius: 5px;" src="/website/img/products/canoneos.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img style="    border: 1px solid #ff6600;
            border-radius: 5px;" src="/website/img/products/canoneos.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img style="    border: 1px solid #ff6600;
            border-radius: 5px;" src="/website/img/products/canoneos.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img style="    border: 1px solid #ff6600;
            border-radius: 5px;" src="/website/img/products/canoneos.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img style="    border: 1px solid #ff6600;
            border-radius: 5px;" src="/website/img/products/canoneos.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li> -->
      <!-- <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img src="/website/img/products/canoneos_1.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img src="/website/img/products/canoneos_2.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img src="/website/img/products/canoneos_3.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img src="/website/img/products/canoneos_4.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img src="/website/img/products/canoneos_5.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img src="/website/img/products/canoneos_6.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img src="/website/img/products/canoneos_7.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img src="/website/img/products/canoneos_8.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img src="/website/img/products/canoneos_9.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li>
      <li>
        <div class="product-col">
          <div class="img">
            <a href="javascript:void(0);"><img src="/website/img/products/canoneos_10.jpg" alt="images" class="img-responsive"></a>
          </div>
        </div>
      </li> -->
    </ul>
  </div>
</div>
<div class="col-md-7">
  <center>
  <div>
    <div class="bg-info" style="padding: 15px; 0px;">
      <h3 class="text-uppercase">{{ $product['name'] }}</h3><br>
      <h5 class="text-uppercase">TE ENVIAMOS TU CUPÓN DE DESCUENTO A TU CORREO</h5>
    </div>
    < <a href="" class="btn btn-shop1 btn-lg btn-block addcart add_to_cart shop_right_now" data-index={{ $product['id'] }} {{ ($product['stock'] == 0) ? 'disabled=true' : '' }}>COMPRAR</a>
    <a href="#" class="btn btn-shop2 btn-lg btn-block addcart add_to_cart" style="margin-top: 0px;" data-index={{ $product['id'] }} {{ ($product['stock'] == 0) ? 'disabled=true' : '' }}>Agregar Carrito</a>
    @if($product->category != null)
    <a href="#" class="btn btn-shop2 btn-lg btn-block addcart save_coupon" style="margin-top: 0px;     background-color: #01c5a7;" data-index={{ $product['id'] }} {{ ($product['stock'] == 0) ? 'disabled=true' : '' }}>Agregar Cupón</a>
    @else
    <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $company_main->phone }}&text=Me%20interesa%20{{ $product['name'] }}%20.%20Más%20información%20por%20favor.&source=&data="  class="btn btn-shop2 btn-lg btn-block  " style="margin-top: 0px; background-color: #6bce04;" data-index={{ $product['id'] }} {{ ($product['stock'] == 0) ? 'disabled=true' : '' }}>Contactar por whatsapp</a>
    @endif
  <span>{{ ($product['stock'] == 0) ? 'Agotado' : '' }}</span>
    <div style="padding: 20px; f">
      @if($product['promotion_available'] == 1)
                                    <span class="price" style="font-size: 30px">S/ {{ $product['price_promotion'] }}</span><br>
                                    <span class="price old" style="font-size: 25px">S/ {{ $product['price'] }}</span>

                                @else
                                    <span class="price" style="font-size: 30px">S/ {{ $product['price'] }}</span>
                                @endif
    </div>
  </div>
  <div id="location" style="width: 100%; height: 200px;" class="u-mb3"></div>
<!--   <div class="product-feature">
    <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d948.592704489519!2d-70.24846614925363!3d-18.007986487715314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915acf7b0b858c4d%3A0x839f892938c7ac91!2sAv.+Augusto+B+Leguia+918%2C+Tacna!5e0!3m2!1ses-419!2spe!4v1481048214729" frameborder="0" allowfullscreen="allowfullscreen" style="border: 0px;"></iframe>
  </div> -->
  </center>
</div>
