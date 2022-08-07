@if(count($promoted_products))
<div class="container margin_60_35 add_bottom_30">
  <!-- nueva seccion -->
  <div class="title_1 linea mb-5"><span>Nuestras <b>ofertas</b></span></div>
  <div id="promotions" class="owl-carousel owl-theme">
    @foreach($promoted_products as $product)
    <div>
      <a href="/catalogo/{{ $product->slug }}"><img src="{{ $product->promotion_image }}" alt="" style="width: 100%;"></a>
    </div>
    @endforeach
    {{-- 
    <div>
      <a href="#"><img src="/template_13/img/oferta_2.jpg" alt="" style="width: 100%;"></a>
    </div>
    <div>
      <a href="#"><img src="/template_13/img/oferta_1.jpg" alt="" style="width: 100%;"></a>
    </div>
    <div>
      <a href="#"><img src="/template_13/img/oferta_3.jpg" alt="" style="width: 100%;"></a>
    </div>
    <div>
      <a href="#"><img src="/template_13/img/oferta_1.jpg" alt="" style="width: 100%;"></a>
    </div>
    <div>
      <a href="#"><img src="/template_13/img/oferta_2.jpg" alt="" style="width: 100%;"></a>
    </div>
    <div>
      <a href="#"><img src="/template_13/img/oferta_3.jpg" alt="" style="width: 100%;"></a>
    </div>
    --}}
  </div>
  <!-- /////////////////////////////////////////////// -->
</div>
@endif