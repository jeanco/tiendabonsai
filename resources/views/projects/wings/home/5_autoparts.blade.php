<!-- brands -->
<div class ="section-full content-inner brand">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-head style-1 text-center" data-name="V">
          <h2 class="h2"><span class="font-weight-800">REPUESTOS</span> Y ACCESORIOS  </h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-4">
        <div class="site-filters brand-tab clearfix  m-b40">
          <ul class="filters" data-toggle="buttons">
            <li data-filter="" class="btn active">
              <input type="radio">
              <a href="JavaScript:Void(0);" class="active"><span>Todos los accesorios</span></a>
            </li>
            @foreach ($spare_parts['subcategories'] as $key => $subcategory)
            <li data-filter="{{ $subcategory['slug'] }}" class="btn">
                <input type="radio" >
                <a href="JavaScript:Void(0);" class=""><span> {{ $subcategory['name'] }} </span></a>
            </li>
            @endforeach
            {{-- <li data-filter="luces" class="btn">
              <input type="radio" >
              <a href="JavaScript:Void(0);" class=""><span> Luces </span></a>
            </li>
            <li data-filter="repuestos" class="btn">
              <input type="radio">
              <a href="JavaScript:Void(0);" class=""><span> Repuestos</span></a>
            </li>
            <li data-filter="potencia" class="btn">
              <input type="radio">
              <a href="JavaScript:Void(0);" class=""><span> Potencia </span></a>
            </li>
            <li data-filter="exterior" class="btn">
              <input type="radio">
              <a href="JavaScript:Void(0);" class=""><span> Exterior</span></a>
            </li> --}}
          </ul>
        </div>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-8">
        <ul id="" class="row dlab-gallery-listing gallery mfp-gallery masonry brand-variety" style="border-bottom: 1px solid #e2e2e2; border-right: : 1px solid #e2e2e2;">
          <!-- Item 1 -->
          @foreach ($spare_parts['subcategories'] as $subcategory)
            @foreach ($subcategory['products'] as $product)
                <li class="card-container col-lg-4 col-md-6 col-sm-6 col-xs-6 {{ $subcategory->slug }}" style="border-top: 1px solid #e2e2e2; 
                border-right: 1px solid #e2e2e2;">
                  <div class="car-brand bg-white">
                    <figure class="text-center">
                    <img src="{{ ($product['photo'] != null) ? $product['photo']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" style="height: 120px;">
                    </figure>
                    <div class="p-a20 text-center">
                      <h3 class="m-t5 font-weight-100" style="    height: 43px;"> <a href="/repuestos/{{ $product->slug }}">{{ $product->name }}</a> </h3>
                      <ul class="list-inline car-brand-value m-b0">
                      <a href="/win-cotizador" class="site-button-catalog text-center" style="margin:0 auto;  width: 150px; float:left;">S/ {{ $product->price }}</a>
                      </ul>
                    </div>
                  </div>
                </li>
            @endforeach
          @endforeach
          {{-- <li class="card-container col-lg-4 col-md-6 col-sm-6 col-xs-6 luces">
            <div class="car-brand bg-white">
              <figure class="text-center">
                <img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap1-2.png" alt="" style="height: 120px;">
              </figure>
              <div class="p-a20">
                <h3 class="m-t5 font-weight-700">Volkswagen <span class="text-primary font-weight-400">GTR</span> </h3>
                <ul class="list-inline car-brand-value m-b0">
                  <li>S/ 120.00</li>
                </ul>
              </div>
            </div>
          </li>
          <!-- Fin Item 1 -->
          <!-- Item 2 -->
          <li class="card-container col-lg-4 col-md-6 col-sm-6 col-xs-6 repuestos">
            <div class="car-brand bg-white">
              <figure class="text-center">
                <img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap2.png" alt="" style="height: 120px;">
              </figure>
              <div class="p-a20">
                <h3 class="m-t5 font-weight-700">Audi Sports <span class="text-primary font-weight-400">S8</span> </h3>
                <ul class="list-inline car-brand-value m-b0">
                  <li>S/ 120.00</li>
                </ul>
              </div>
            </div>
          </li>
          <!-- Fin Item 2 -->
          <!-- Item 3 -->
          <li class="card-container col-lg-4 col-md-6 col-sm-6 col-xs-6 repuestos potencia">
            <div class="car-brand bg-white">
              <figure class="text-center">
                <img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap3.png" alt="" style="height: 120px;">
              </figure>
              <div class="p-a20">
                <h3 class="m-t5 font-weight-700">Bugatti Feyron <span class="text-primary font-weight-400">F2</span> </h3>
                <ul class="list-inline car-brand-value m-b0">
                  <li>S/ 120.00</li>
                </ul>
              </div>
            </div>
          </li>
          <!-- Fin Item 3 -->
          <!-- Item 4 -->
          <li class="card-container col-lg-4 col-md-6 col-sm-6 col-xs-6 exterior">
            <div class="car-brand bg-white">
              <figure class="text-center">
                <img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap4-1.png" alt="" style="height: 120px;">
              </figure>
              <div class="p-a20">
                <h3 class="m-t5 font-weight-700">Mercedes Benz<span class="text-primary font-weight-400">R3</span> </h3>
                <ul class="list-inline car-brand-value m-b0">
                  <li>S/ 120.00</li>
                </ul>
              </div>
            </div>
          </li>
          <!-- Fin Item 4 -->
          <!-- Item 5 -->
          <li class="card-container col-lg-4 col-md-6 col-sm-6 col-xs-6 luces exterior">
            <div class="car-brand bg-white">
              <figure class="text-center">
                <img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap1-2.png" alt="" style="height: 120px;">
              </figure>
              <div class="p-a20">
                <h3 class="m-t5 font-weight-700">Toyota Avanza  <span class="text-primary font-weight-400">RX</span> </h3>
                <ul class="list-inline car-brand-value m-b0">
                  <li>S/ 120.00</li>
                </ul>
              </div>
            </div>
          </li>
          <!-- Fin Item 5 -->
          <!-- Item 6 -->
          <li class="card-container col-lg-4 col-md-6 col-sm-6 col-xs-6 luces repuestos">
            <div class="car-brand bg-white">
              <figure class="text-center">
                <img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap1-2.png" alt="" style="height: 120px;">
              </figure>
              <div class="p-a20">
                <h3 class="m-t5 font-weight-700">Chevrolet <span class="text-primary font-weight-400">GTR</span> </h3>
                <ul class="list-inline car-brand-value m-b0">
                  <li>S/ 120.00</li>
                </ul>
              </div>
            </div>
          </li> --}}
          <!-- Fin Item 6 -->
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- brands end -->
