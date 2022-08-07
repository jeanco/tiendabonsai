<div class="container">
  @foreach($categories_with_products as $i => $category)

    <span id="controlL" class="left-controls" role="button" aria-label="See Previous Modules">
      <b class="oyeepe-left" style="color: #6c6c6c;"><i class="fa fa-chevron-circle-left fa-3x"></i></b>
    </span>

    <div class="h3" style="color: #555;     margin-top: 0px;">{{ $category['name'] }}</div>
    <div class="module-section clearfix">
        <!-- <button class="btn arrow-guides fa-chevron-left"></button> -->
        <ul class="slide-oyeepe" id="content">
              @foreach($category['products'] as $u => $product)
              <li id="imagen" class="card">

                    <img src="{{ ($product['photo'] != null) ? $product['photo']['resource_thumb'] : ''}}" style="height: 200px; width: 100%;">
                    <a href="/productos/{{ $product['slug'] }}">
                      <div id="contenido" class="text-center oyeepe-back">
                          <div style="color: #555; padding: 5px 35px;">
                            <div style="display: table;">
                              <div style="height: 135px; width: 300px; display: table-cell; vertical-align: middle;">
                                <span style="font-weight: 700;">{{ $product['name'] }}</span><br>
                              <span style="font-size: 10px;">{{ ($product['stock'] == 0) ? 'Agotado' : "stock(".$product['stock'].")" }}</span>
                              </div>
                            </div>
                            <div class="row tex-center">
                              <a href="" class="addcart add_to_cart" data-index="">Agregar</a>
                            <a href="/productos/{{ $product['slug'] }}" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>

                          </div>
                        </div>
                    </a>

              </li>
              @endforeach
        </ul>
    </div><!--end of module-section-->

    <span id="controlR" class="right-controls" role="button" aria-label="See Previous Modules">
        <b class="oyeepe-right" style="color: #6c6c6c;"><i class="fa fa-chevron-circle-right fa-3x"></i></b>
    </span>

  @endforeach
</div>
