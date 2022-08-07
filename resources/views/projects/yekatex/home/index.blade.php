@extends('yekatex.layouts.index')
@section('content')
<!-- Categorie Menu & Slider Area Start Here -->
<div class="main-page-banner pb-50 off-white-bg">
  <div class="container">
    <div class="row">
      <!-- Vertical Menu Start Here -->
      <div class="col-xl-3 col-lg-4 d-none d-lg-block">
        <div class="vertical-menu mb-all-30">
          <nav>
            <ul class="vertical-menu-list">
              @foreach($categories as $key => $category)
              <li class="">
                <a href="#"><span>
                  @if($category['icon'] != '')
                  <img src="{{$category['icon']}}" alt="menu-icon" width="30%">
                  @endif
                </span>{{ $category['name'] }}<i class="fa fa-angle-right" aria-hidden="true"></i>
              </a>
              <ul class="ht-dropdown mega-child">
                @foreach($category['subcategories'] as $k => $subcategory)
                <li><a href="/catalogo?category={{ $category['slug'] }}&subcategory={{ $subcategory['slug'] }}">{{ $subcategory['name'] }}</a></li>
                @endforeach
              </ul>
            </li>
            @endforeach
            <!--          <li><a href="shop.html"><span><img src="yekatex/img/vertical-menu/3.png" alt="menu-icon"></span>Cobertores<i class="fa fa-angle-right" aria-hidden="true"></i></a>
          </li> -->
          <!-- <li id="cate-toggle" class="category-menu v-cat-menu">
            <ul>
              <li class="has-sub"><a href="index.html#">Mas Categorias</a>
              <ul class="category-sub">
                <li><a href="shop.html"><span><img src="yekatex/img/vertical-menu/11.png" alt="menu-icon"></span>Accessories</a></li>
              </ul>
            </li>
          </ul>
        </li> -->
            <!-- More Categoies End -->
            </ul>
          </nav>
        </div>
      </div>
      <!-- Vertical Menu End Here -->
      <!-- Slider Area Start Here -->
      <div class="col-xl-9 col-lg-8 slider_box">
          <div class="slider-wrapper theme-default">
              <!-- Slider Background  Image Start-->
              <div id="slider" class="nivoSlider">
                @foreach($covers as $cover)
              <a href="{{ $cover['link'] }}"><img class="slider__img" src="{{ $cover['image'] }}" data-thumb="{{ $cover['image'] }}" alt="" /></a>
                @endforeach
              </div>
              <!-- Slider Background  Image Start-->
          </div>
      </div>
      <!-- Slider Area End Here -->
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</div>
<!-- Categorie Menu & Slider Area End Here -->
<!-- //////////////////////////////// -->
<div class="pad-home" style="margin-top: 25px;">
  <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
      <div class="grid-list-view  mb-sm-15">
          <ul class="nav tabs-area d-flex align-items-center">
              <li><a class="featured-products_category active" data-toggle="tab" href="">Todos</a></li>&nbsp;&nbsp;
              @foreach($categories as $category)
                <li><a class="featured-products_category" data-toggle="tab" href="#{{ $category['id'] }}" data-index="{{ $category['id'] }}">{{ $category['name'] }}</a></li>&nbsp;&nbsp;
              @endforeach
          </ul>
      </div>
      <!-- Toolbar Short Area Start -->
  </div>
  <!-- Grid & List View End -->
  <div class="main-categorie mb-all-40">
      <!-- Grid & List Main Area End -->
      <div class="tab-content fix">
          <!-- Tab Grid -->
          <div id="all" class="tab-pane fade show active">
              <div class="row"  id="featured_products">
                  <!-- Single Product Start -->
                  <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                      <div class="single-product">
                          <!-- Product Image Start -->
                          <div class="pro-img">
                              <a href="{{ URL::to('/catalogo/perfil') }}">
                                  <img class="primary-img" src="${value.image}" alt="single-product">
                                  <img class="secondary-img" src="${value.image}" alt="single-product">
                              </a>
                              <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                          </div>
                          <!-- Product Image End -->
                          <!-- Product Content Start -->
                          <div class="pro-content">
                              <div class="pro-info">
                                  <h4><a href="{{ URL::to('/catalogo/perfil') }}">${value.name}</a></h4>
                                  <p>
                                    ${_price}
                                    <!-- <span class="price">$84.45</span><del class="prev-price">$300.50</del> -->
                                  </p>
                                  <div class="label-product l_sale">25<span class="symbol-percent">%</span></div>
                              </div>
                              <div class="pro-actions">
                                  <div class="actions-primary">
                                      <a href="" class="add_to_cart" data-index=${value.id} title="Add to Cart"> + Agregar</a>
                                  </div>
                                  <!-- <div class="actions-secondary">
                                      <a href="#" title="Compare"><i class="lnr lnr-sync"></i> <span>Comparar</span></a>
                                      <a href="#" title="WishList"><i class="lnr lnr-heart"></i> <span>Añadir a lista</span></a>
                                  </div> -->
                              </div>
                          </div>
                          <!-- Product Content End -->
                          ${_labelSale}
                          <!-- <span class="sticker-new">new</span> -->
                      </div>
                  </div>
                  <!-- Single Product End -->
              </div>
          </div>
          <!-- END Tab Grid -->
      </div>
  </div>
</div>
<!-- //////////////////////////////// -->
<!-- Brand Banner Area End Here -->
<div class="big-banner pb-100 pb-sm-60">
    <div class="container big-banner-box">
        @foreach ($promotions as $key => $promotion)
        <div class="col-img">
          <a href="{{ $promotion['link'] }}">
            <img src="{{ $promotion['image'] }}" alt="">
          </a>
        </div>
        @endforeach
        {{-- <div class="col-img">
            <a href="index.html#">
              <img src="yekatex/img/banner/h1-banner3.jpg" alt="">
            </a>
        </div> --}}
    </div>
    <!-- Container End -->
</div>
<!-- Support Area Start Here -->
{{--<div class="support-area bdr-top">
    <div class="container">
        <div class="d-flex flex-wrap text-center">
            @foreach($values as $key => $value)
            <div class="single-support">
                  <div class="support-icon">
                    <img src="{{ $value['image_thumb'] }}" alt="images" class="img-reponsive" style="width: 100px; height: 70px;">
                  </div>
                  <div class="support-desc">
                    <h6>{{ $value['title'] }}</h6>
                    <span>{{ $value['description'] }}</span>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Container End -->
</div> --}}

<!-- Support Area End Here -->
@stop
@section('plugins-js')
<script type="text/javascript" src="{{ URL::asset('/yekatex/js/featured_products.js') }}"></script>
@stop
