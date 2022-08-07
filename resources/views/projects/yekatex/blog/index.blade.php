@extends('yekatex.layouts.index')
@section('content')
<!-- Blog Page Start Here -->
<div class="blog ptb-100  ptb-sm-60">
    <div class="container">
      <div class="row">
          <!-- Single Blog Sidebar Start -->
          <div class="col-lg-3 order-2 order-lg-1">
            <aside>
                <div class="single-sidebar mb-30">
                     <h3 class="sidebar-title">Categorías</h3>
                     <ul class="sidbar-style">
                         <li><a href="#">Noticias</a></li>
                         <li><a href="#">Eventos</a></li>
                         <li><a href="#">Publicidad</a></li>
                         <li><a href="#">Novedades</a></li>
                     </ul>
                </div>
                {{-- <div class="single-sidebar latest-pro mb-30">
                    <h3 class="sidebar-title">Más Publicaciones</h3>
                    <ul class="sidbar-style">
                        <li>
                          <!-- Cart Box Start -->
                          <div class="single-cart-box">
                              <div class="cart-img">
                                  <a href="#"><img src="/yekatex/img/products/1.jpg" alt="cart-image"></a>
                              </div>
                              <div class="cart-content">
                                  <a href="#" style="font-size: 20px; line-height: normal;">Nuevas ofertas en ropa</a>
                              </div>
                          </div>
                          <!-- Cart Box End -->
                          <!-- Cart Box Start -->
                          <div class="single-cart-box">
                              <div class="cart-img">
                                  <a href="#"><img src="/yekatex/img/products/2.jpg" alt="cart-image"></a>
                              </div>
                              <div class="cart-content">
                                  <a href="#" style="font-size: 20px; line-height: normal;">Novedades en nuestras tiendas</a>
                              </div>
                          </div>
                          <!-- Cart Box End -->
                          <!-- Cart Box Start -->
                          <div class="single-cart-box">
                              <div class="cart-img">
                                  <a href="#"><img src="/yekatex/img/products/1.jpg" alt="cart-image"></a>
                              </div>
                              <div class="cart-content">
                                  <a href="#" style="font-size: 20px; line-height: normal;">Las mejores ofertas para ti</a>
                              </div>
                          </div>
                          <!-- Cart Box End -->
                        </li>
                    </ul>
                </div> --}}
            </aside>
          </div>
          <!-- Single Blog Sidebar End -->
          <!-- Single Blog Sidebar Description Start -->
          <div class="col-lg-9 order-1 order-lg-2">
            <div class="main-blog" id="table_data_blog">
                @include('yekatex.blog.list_blog')
                <!-- Row End -->
            </div>
          </div>
      </div>
    </div>
    <!-- Container End -->
</div>
<!-- Blog Page End Here -->

@stop
@section('plugins-js')
<script src="/yekatex/js/search_product.js"></script>
@stop
