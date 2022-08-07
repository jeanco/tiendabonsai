@foreach($products as $u => $product)
<div class="card card-catalog">
        <div class="card-body">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-4 col-xs-12 el-element-overlay">
                  <div class="el-card-item" style="padding-bottom: 0px;">
                      <div class="el-card-avatar el-overlay-1" style="margin-bottom: 0px; border-radius: 15px;">
                          <a href="/productos/{{ $product->slug }}">
                              <img src="{{ ($product->photo != '') ? $product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="user" style="width: 100%; height: 250px; border-radius: 15px;"/>
                          </a>
                          <div class="el-overlay" data-index={{ $product->id }} style="border-radius: 15px;">
                            @if(!in_array($product->id, (isset($_COOKIE['cart'])) ? explode(',', $_COOKIE['cart']) : []))
                            <div class="row align-items-center" style="height: 100%;">
                                  <div class="col-12 text-center">
                                    <button type="button" data-index={{ $product->id }} class="btn btn-sm btn-success catalog-select add_to_cart">Elegir Producto</button>
                                  </div>
                              </div>
                            @else
                            <div class="row align-items-center" style="height: 100%">
                              <div class="col-12">
                                <a href="javascript:void(0);" class="catalog-remove-select cart__remove-product" data-index={{ $product->id }}> <i class="fas fa-times-circle fa-3x" style="color: #fff;"></i> </a>
                              </div>
                            </div>
                            @endif
                          </div>

                          {{-- <!-- Sin visto -->
                          <div class="el-overlay" style="border-radius: 15px;">
                              <div class="row align-items-center" style="height: 100%;">
                                <div class="col-12 text-center">
                                  <button type="button" class="btn btn-sm btn-success catalog-select">Elegir Producto</button></div>
                              </div>
                          </div>

                          <div class="el-overlay" style="border-radius: 15px;">
                              <!-- Dibujo -->
                              <div class="row align-items-center" style="height: 100%">
                                <div class="col-12">
                                  <i class="fas fa-check-circle fa-3x" style="color: #fff;"></i> <br> <br>
                                  <button type="button" class="btn btn-sm btn-danger catalog-remove-select">No seleccionar</button>
                                </div>
                              </div>
                              <!-- ====== -->
                          </div> --}}
                      </div>
                  </div>
                </div>
                <div class="col-md-5 col-xs-12">
                    <a href="/productos/{{ $product->slug }}"><h4 class="card-title">{{ $product->name }}</h4></a>
                    <div class="text-justify">
                      <a href="/productos/{{ $product->slug }}" style="color: #22567f;">{!! $product->description !!}</a>
                    </div>
                    <div class="text-right">
                      <a href="/productos/{{ $product->slug }}">Leer más</a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
                  <a href="{{ $product->brochure }}" class="btn btn-info btn-block text-left"><i class="fas fa-file-upload fa-lg"></i>&nbsp;&nbsp;&nbsp;Brochure</a>
                <a href="{{ $product->pdf }}" class="btn btn-info btn-block text-left"><i class="fas fa-file-alt fa-lg"></i>&nbsp;&nbsp;&nbsp;Ficha Técnica</a>

                  @if ($product->link != '')
                    <a href="javascript:void(0)" class="btn btn-info btn-block text-left see-youtube-video" data-youtube_code="{{ (isset(explode('=', $product->link)[1])) ? explode('=', $product->link)[1] : '' }}" data-toggle="modal" data-target="#video-modal"><i class="fab fa-youtube-square fa-lg"></i>&nbsp;&nbsp;&nbsp;Ver Video</a>
                  @endif
                  <hr>

                </div>
            </div>
        </div>
</div>
@endforeach

<div class="product-pagination">
    {{ $products->appends(request()->except('page'))->links() }}
</div>
