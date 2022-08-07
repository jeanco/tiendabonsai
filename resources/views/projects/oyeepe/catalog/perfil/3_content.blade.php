<div class="product-detail-bottom">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="shop-single.html#desc">+ Informacion</a></li>
    <li><a data-toggle="tab" href="shop-single.html#about">Sobre la empresa</a></li>
    <li><a data-toggle="tab" href="shop-single.html#special">Términos y Condiciones</a></li>
  </ul>
  <div class="tab-content padding-lr">
    <div id="desc" class="tab-pane fade in active">
      {!! $product['description'] !!}
    </div>
    <div id="about" class="tab-pane fade in active">
      {{ $product['company']['description_company'] }}
    </div>
    <div id="special" class="tab-pane fade">
        {{ $company_main->terms_and_conditions }}
    </div>
    <div id="video" class="tab-pane fade">
        <p>Smart never looked so good. The KS8000 4K SUHD TV features Quantum Dot Color technology, which covers you in our most superior picture yet, immersing you in whatever you’re watching. </p>
    </div>
    <div id="review" class="tab-pane fade">
        <p>Smart never looked so good. The KS8000 4K SUHD TV features Quantum Dot Color technology, which covers you in our most superior picture yet, immersing you in whatever you’re watching. </p>
    </div>
  </div>
</div>
<br>
<div class="row" style="margin: 0px; padding: 15px 0px;">
      <div class="col-md-2" style="padding: 0px; color: #ff6600; font: bold 18px 'Poppins', sans-serif;">
        Etiquetas
      </div>
      <div class="col-md-10 col-sm-12" style="border: 1px solid #6c6c6c; border-radius: 5px; font-size: 15px;">
         @foreach($product['own_attributes'] as $key => $attribute)
          <a href="#">#{{ $attribute->name }}</a>&nbsp;
         @endforeach
      </div>
</div>
