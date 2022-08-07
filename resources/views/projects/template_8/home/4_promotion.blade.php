<!--Offer Section-->
<section class="offer-section" style="background-color: var(--main-bg-color-primario);">
  <div class="auto-container">
    <div class="text-white">
      <div class="row justify-content-md-center" style="min-height: 320px;">
          @if(isset($videos[0]))
          <div class="col-md-6">
              <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ explode('=', $videos[0]->resource)[1] }}" allowfullscreen frameborder="0"></iframe>
          </div>
          @endif

          @if(isset($videos[1]))
          <div class="col-md-6">
              <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ explode('=', $videos[1]->resource)[1] }}" allowfullscreen frameborder="0"></iframe>
          </div>
          @endif
      </div>
      <!--Sec Title-->
      <!-- <div class="sec-title light centered"><h2 class="blog_title" style="border: none;">Ofertas Especiales</h2></div> -->
      <div class="slider_basic owl-carousel owl-theme" style="display: none;">
         {{-- @foreach($promoted_products as $product)
          <div class="item">
            <div class="offer-block">
              <div class="inner-box">
                  <div class="image">
                      <a href="/catalogo/{{ $product['slug'] }}"><img src="{{ $product['photo']['resource'] }}" alt="" class="img_feature"/></a>
                      <div class="price bg_4">Nuevo</div>
                  </div>
                  <h3><a href="/catalogo/{{ $product['slug'] }}">{{ $product['name'] }}</a></h3>
                  <div class="lower-box">
                      <div class="plus-box">
                          <span class="icon fa fa-plus"></span>
                          <ul class="tooltip-data">
                              <li>5 Años de Garantía</li>
                              <li>Atencion 24 horas</li>
                              <li>Servicio gratuito 2 años</li>
                              <li style="display:none;"></li>
                          </ul>
                        </div>
                      <div class="lower-price"></div>
                      <ul>
                          <li><span class="icon fa fa-car"></span>{{ $product['subcategory']['name'] }}</li>
                          <li><span class="icon fa fa-clock-o"></span>2014</li>
                          <li><span class="icon fa fa-gear"></span>{{ $product['category']['name'] }}</li>
                      </ul>
                  </div>
                </div>
            </div>
          </div>
          @endforeach--}}
      </div>
    </div>
  </div>
</section>
<!--End Offer Section-->
