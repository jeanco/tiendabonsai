<div class="related-product-page">
                <div class="heading-shop">
                    <h3>Descuentos Relacionados</h3>
                </div>
                <div class="widget-product-related">
                    <div class="owl-carousel owl-theme js-owl-product">
                    	@foreach($interests as $key => $item)
                        <div class="product-item">
                           <div class="product-item ver2 shop-border">
					          <div class="prod-item-img bd-style-2" style="border-bottom: 0px;">
					              <a href="#"><img src="{{ $item['imageThumbUrl'] }}" alt="images" class="img-responsive" style="      background: #ffffff; border-radius: 5px;width: 100%; height: 200px; object-fit: cover; "></a>
					              <div class="button" style="padding: 0px 0px 10px 10px;">
					                  <a href="#" class="addcart save_coupon" data-index={{ $item['id'] }}>Agregar Cupón</a>
								  <a href="/productos/{{ $item['slug'] }}" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
					              </div>
					          </div>
					          <div class="prod-info" style="padding-left: 10px;     height: 125px;">
					              <h3><a href="#" style="color: #fff;">{{ $item['name'] }}</a></h3>
					              <div class="ratingstar sm">
					                  <span class="number" style="margin-left: 0px; color: #505050;">stock ({{ $item['stock'] }})</span>
					              </div>
					              <div class="prod-price">
				              	      @if($product['promotion']['flag'] == true)
					                  <span class="price black" style="color: #fff;">S/.{{ $product['promotion']['price'] }}</span><br>
					                  <span style="color: #505050; text-decoration:line-through; font-size: 10px;">S/.{{ $product['price'] }}</span>
					                  @else
					                  <span class="price black" style="color: #fff;">S/.{{ $product['price'] }}</span>
					                  @endif
					              </div>
					          </div>
					      </div>
                        </div>
                        @endforeach
  <!--
                        <div class="product-item">
                           <div class="product-item ver2 shop-border">
					          <div class="prod-item-img bd-style-2" style="border-bottom: 0px;">
					              <a href="#"><img src="website/img/products/smarphone.jpg" alt="images" class="img-responsive" style="border-radius: 5px;"></a>
					              <div class="button" style="padding: 0px 0px 10px 10px;">
					                  <a href="#" class="addcart">Agregar</a>
					                  <a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
					              </div>
					          </div>
					          <div class="prod-info" style="padding-left: 10px;">
					              <h3><a href="#" style="color: #fff;">Sony Xperia X Compact - Unlocked Smartphone...</a></h3>
					              <div class="ratingstar sm">
					                  <span class="number" style="margin-left: 0px; color: #505050;">stock (12)</span>
					              </div>
					              <div class="prod-price">
					                  <span class="price black" style="color: #fff;">$212.20</span><br>
					                  <span style="color: #505050; text-decoration:line-through; font-size: 10px;">$250.00</span>
					              </div>
					          </div>
					      </div>
                        </div>
                        <div class="product-item">
                           <div class="product-item ver2 shop-border">
					          <div class="prod-item-img bd-style-2" style="border-bottom: 0px;">
					              <a href="#"><img src="website/img/products/smarphone.jpg" alt="images" class="img-responsive" style="border-radius: 5px;"></a>
					              <div class="button" style="padding: 0px 0px 10px 10px;">
					                  <a href="#" class="addcart">Agregar</a>
					                  <a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
					              </div>
					          </div>
					          <div class="prod-info" style="padding-left: 10px;">
					              <h3><a href="#" style="color: #fff;">Sony Xperia X Compact - Unlocked Smartphone...</a></h3>
					              <div class="ratingstar sm">
					                  <span class="number" style="margin-left: 0px; color: #505050;">stock (12)</span>
					              </div>
					              <div class="prod-price">
					                  <span class="price black" style="color: #fff;">$212.20</span><br>
					                  <span style="color: #505050; text-decoration:line-through; font-size: 10px;">$250.00</span>
					              </div>
					          </div>
					      </div>
                        </div>
                        <div class="product-item">
                           <div class="product-item ver2 shop-border">
					          <div class="prod-item-img bd-style-2" style="border-bottom: 0px;">
					              <a href="#"><img src="website/img/products/smarphone.jpg" alt="images" class="img-responsive" style="border-radius: 5px;"></a>
					              <div class="button" style="padding: 0px 0px 10px 10px;">
					                  <a href="#" class="addcart">Agregar</a>
					                  <a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
					              </div>
					          </div>
					          <div class="prod-info" style="padding-left: 10px;">
					              <h3><a href="#" style="color: #fff;">Sony Xperia X Compact - Unlocked Smartphone...</a></h3>
					              <div class="ratingstar sm">
					                  <span class="number" style="margin-left: 0px; color: #505050;">stock (12)</span>
					              </div>
					              <div class="prod-price">
					                  <span class="price black" style="color: #fff;">$212.20</span><br>
					                  <span style="color: #505050; text-decoration:line-through; font-size: 10px;">$250.00</span>
					              </div>
					          </div>
					      </div>
                        </div> -->
                    </div>
                </div>
            </div>