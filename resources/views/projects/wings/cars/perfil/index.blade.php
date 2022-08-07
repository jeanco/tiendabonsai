@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style=" height: 600px; background-image:url({{ isset( $product->images[0]->resource) ? $product->images[0]->resource:  ''  }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">{{ $product->name }}</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/">Inicio</a></li>
                <li><a href="/catalogo">Vehículos</a></li>
                <li>Detalle de vehículo</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->

    <div class="car-details-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
            <div class="nav">
              <ul>
                <li class="active"><a href="/productos/{{ $product->slug }}">Detalles</a></li>
                <li><a href="/especificaciones/{{ $product->slug }}">Especificaciones</a></li>
                <li><a href="/galeria-automoviles/{{ $product->slug }}">Galería</a></li>
              </ul>
            </div>
          </div>
        </div>  
      </div>
    </div>

    <div class="section-full p-t50 bg-white content-inner-2">
        <div class="container">
            <div class="row">
                <!-- Side bar start -->
                <div class="col-md-8">
                  <!-- images -->
                  <div class="owl-fade-one owl-carousel owl-btn-center-lr">
                    @foreach ($product->images as $image)
                    <div class="item">
                    <div class="dlab-thum-bx"> <img src="{{ $image->resource }}" alt=""> </div>
                      </div>
                    @endforeach
                    {{-- <div class="item">
                      <div class="dlab-thum-bx"> <img src="/wings/img/head5.jpg" alt=""> </div>
                    </div>
                    <div class="item">
                      <div class="dlab-thum-bx"> <img src="https://wingsautomoviles.com/wp-content/uploads/2019/12/portada0.jpg" alt=""> </div>
                    </div>
                    <div class="item">
                      <div class="dlab-thum-bx"> <img src="https://wingsautomoviles.com/wp-content/uploads/2019/12/frontal1king-long-6706-VGF2.jpg" alt=""> </div>
                    </div>
                    <div class="item">
                      <div class="dlab-thum-bx"> <img src="https://wingsautomoviles.com/wp-content/uploads/2019/12/detras2king-long-6706-VGF2.jpg" alt=""> </div>
                    </div> --}}
                  </div>
                  <!-- title -->
                  <div class="m-b30 m-t30">
                    <h3 class="h3 m-t0">{{ $product->name }} </h3>
                    {{-- <ul class="used-car-dl-info">
                      <li><i class="fa fa-calendar"></i> 08-12-2019</li>
                    </ul> --}}
                  </div>

                  <div class="clearfix m-t30">
                    <!-- Description -->
                    <ul class="nav theme-tabs m-b10">
                      <li class="active">
                        <a data-toggle="tab" aria-controls="economy"  href="#economy"><i class="fa fa-automobile"></i>&emsp;Especificaciones</a>
                      </li>
                      <li>
                        <a data-toggle="tab" aria-controls="presentation" href="#presentation"><i class="fa fa-star"></i>&emsp;Descripción</a>
                      </li>
                    </ul>

                    <div class="dlab-tabs">
                      <div class="tab-content">
                        <!-- Especificaciones -->
                        <div id="economy"  class="tab-pane active clearfix city-list">
                          <div class="icon-bx-wraper bx-style-1 p-a30">
                            {!! $product->specifications !!}
                             {{-- <ul class="table-dl clearfix">
                              <li>
                                <div class="leftview">Modelo</div>
                                <div class="rightview">XMQ6706</div>
                              </li>
                              <li>
                                <div class="leftview">Dimensiones</div>
                                <div class="rightview">l x a x h = 7000x2050x2640 (mm)</div>
                              </li>
                              <li>
                                <div class="leftview">Motor</div>
                                <div class="rightview">YC4DI30-20</div>
                              </li>
                              <li>
                                <div class="leftview">Combustible</div>
                                <div class="rightview">Diesel</div>
                              </li>

                              <li>
                                <div class="leftview">Distribución de asientos</div>
                                <div class="rightview">2x1</div>
                              </li>
                              <li>
                                <div class="leftview">Cantidad de Asientos</div>
                                <div class="rightview">50</div>
                              </li>
                            </ul> --}}
                          </div>
                        </div>
                        <!-- Descripción -->
                        <div id="presentation"  class="tab-pane clearfix city-list">
                          <div class="icon-bx-wraper bx-style-1 p-a30">
                          <p>{!! $product->description !!}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Side bar END -->
                <div class="col-md-4">
                  <!--  -->
                  <div class="car-dl-info m-b30">
                    <div class="price">
                    @if($product->price > 0)  
                    <h2 class="m-t0 m-b5">Precio Soles S/ {{ $product->price }}</h2>
                    @else
                    @endif
                    
                    <span>{{ $product->name }}</span>
                    </div>
                    <form>
                      <div class="clearfix">
                      <a href="/win-cotizador?vehiculo={{ $product->slug }}" type="button" target="_blank" class="btn-primary site-button btn-block" title="Cotizar" rel="bookmark">Cotizar </a>
                      </div>
                    </form>
                  </div>
                  <!--  -->
                  <div class="car-dl-info m-b30">
                    <div class="price">
                      <span>Mas información</span>
                    </div>
                    <form>
                      <div class="clearfix">
                      <a href="{{ $product->pdf }}" target="_blank" type="button" class="btn-primary site-button btn-block" title="Especificaciones">Descargar Especificaciones </a>
                        @if ($video_code != '')
                          <button type="button" data-video_code={{ ($video_code != '') ? $video_code : '' }} class="btn-primary site-button btn-block" id="product__watch-video" title="Video" rel="" data-toggle="modal" data-target="#car-details">Video de Referencia </button>
                        @endif
                      </div>
                    </form>
                  </div>
                  <!--  -->
                  <div class="widget recent-posts-entry">
                      <h4 class="widget-title">Productos Relacionados</h4>
                      <div class="widget-post-bx">
                          @foreach ($related_products as $related_product)
                          <div class="widget-post clearfix">
                              <div class="dlab-post-media">
                              <a href="/productos/{{ $related_product->slug }}"><img src="{{ $related_product->photo->resource_thumb }}" width="200" height="143" alt=""></a>
                              </div>
                              <div class="dlab-post-info">
                                  <div class="dlab-post-header">
                                  <h6 class="post-title"><a href="/productos/{{ $related_product->slug }}">{{ $related_product->name }}</a></h6>
                                  </div>
                                  <div class="dlab-post-meta">
                                      <ul>
                                        @if($product->price > 0)  
                                        <li class="post-author">$ {{ $product->price }}</li>
                                        @else
                                        @endif
                                      
                                          <li class="post-comment">Turismo</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                          {{-- <div class="widget-post clearfix">
                              <div class="dlab-post-media">
                                <a href="/win-perfil-auto"><img src="https://wingsautomoviles.com/wp-content/uploads/2019/07/POWER-5.jpg" width="200" height="143" alt=""></a>
                              </div>
                              <div class="dlab-post-info">
                                  <div class="dlab-post-header">
                                      <h6 class="post-title"><a href="/win-perfil-auto">WINGS E3 POWER</a></h6>
                                  </div>
                                  <div class="dlab-post-meta">
                                      <ul>
                                          <li class="post-author">USD $10000</li>
                                          <li class="post-comment">Moto</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="widget-post clearfix">
                              <div class="dlab-post-media">
                                <a href="/win-perfil-auto"><img src="https://wingsautomoviles.com/wp-content/uploads/2019/07/JOYLONG-3.jpg" width="200" height="143" alt=""></a>
                              </div>
                              <div class="dlab-post-info">
                                  <div class="dlab-post-header">
                                      <h6 class="post-title"><a href="/win-perfil-auto">WINGS TOUR VAN</a></h6>
                                  </div>
                                  <div class="dlab-post-meta">
                                      <ul>
                                          <li class="post-author">USD $20000</li>
                                          <li class="post-comment">Combi</li>
                                      </ul>
                                  </div>
                              </div>
                          </div> --}}
                      </div>
                  </div>
                  <!--  -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="car-details" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
        <br>
      <iframe width="100%" height="480" class="video-youtube" id="product-perfil_video" src="" allowfullscreen="true"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
  <script src="/wings/js/product_perfil.js"></script>

@stop
