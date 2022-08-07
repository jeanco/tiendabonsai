@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style=" height: 600px; background-image:url({{ isset( $product->images[0]->resource) ? $product->images[0]->resource:  ''  }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Faros led completos</h1>
    </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/">Inicio</a></li>
                <li><a href="/repuestos">Repuestos</a></li>
            <li>{{ $product->name }}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->

    <div class="section-full p-t50 bg-white content-inner-1">
        <div class="container">
            <div class="row">

                         <!-- Side bar END -->
      <div class="col-md-4 col-lg-3 col-sm-5">
        <aside  class="side-bar">

          <div class="widget widget_categories">
              <h4 class="widget-title">Categorías</h4>
              <ul>
                  <li><a href="JavaScript:Void(0);">Todos</a> (8) </li>
                  @foreach ($category->subcategories as $subcategory)
                    <li><a href="/repuestos?category={{ $subcategory->id }}">{{ $subcategory->name }}</a> ({{ count($subcategory->products) }}) </li>
                  @endforeach
              </ul>
          </div>

          <div class="widget recent-posts-entry">
            <h4 class="widget-title">Más Repuestos</h4>
            <div class="widget-post-bx">
              @foreach ($related_products as $related_product)
              <div class="widget-post clearfix">
              <div class="dlab-post-media"> <img src="{{ ($related_product->photo != null) ? $related_product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" width="200" height="143"> </div>
                <div class="dlab-post-info">
                  <div class="dlab-post-header">
                  <h5><a href="/repuestos/{{ $related_product->slug }}">{{ $related_product->name }}</a></h5>
                  </div>
                  <div class="dlab-post-meta">
                    <ul>
                    <li class="post-author open-sans"><b>S/. {{ $related_product->price }}</b></li>
                    </ul>
                  </div>
                </div>
              </div>
              @endforeach
              <a href="/repuestos" class="site-button btn-block text-center">Volver al Catálogo</a>
            </div>
          </div>

         </aside>
        </div>
                <!-- Side bar start -->
                <div class="col-md-8 col-lg-9 col-sm-7">
                  <div class="row">
                    <div class="col-md-7 m-b30">
                      <div class="owl-fade-one owl-carousel owl-btn-center-lr">
                        @foreach ($product->images as $image)
                        <div class="item">
                        <div class="dlab-thum-bx"> <img src="{{ $image->resource }}" alt=""> </div>
                          </div>
                        @endforeach
                        {{-- <div class="item">
                          <div class="dlab-thum-bx"> <img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap1-2.png" alt=""> </div>
                        </div> --}}
                      </div>
                    </div>

                    <div class="col-md-5">
                      <div class="icon-bx-wraper bx-style-1 p-a20 p-b10 m-b30">
                        <h3 class="h3 m-t0">{{ $product->name }} </h3>
                        <h3 class="">S/. {{ $product->price }} </h3>
                        <br>

                        <div style="margin-bottom: 15px">
                          <span class="">Cantidad: </span>
                          <input id="demo_vertical" type="text" value="1" name="demo_vertical"><br>
                        </div>

                        <ul class="used-car-dl-info">
                          <li>
                            <a href="#" id="add_item_to_cart_with_number" class="site-button" data-index={{ $product->id }} title="Añadir" rel="">
                            Añadir al carrito
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>


                  <div class="clearfix">
                    <div class="icon-bx-wraper bx-style-1 p-a20">
                      <h4>Descripción:</h4>
                      {!! $product->description !!}
                    </div>
                </div>
      </div>
     
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
<link href="/wings/plugins/touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" media="all">
@stop
@section('plugins-js')
<script src="/wings/plugins/touchspin/jquery.bootstrap-touchspin.js"></script>
<script type="text/javascript">
  $("input[name='demo_vertical']").TouchSpin({
    verticalbuttons: true
  });
</script>
<script src="/wings/js/add_cart_with_number.js"></script>
@stop
