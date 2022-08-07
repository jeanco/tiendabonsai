<header class="version_1 header_movil">
   <div class="layer"></div>
   <!-- /main_header -->
   <div class="main_nav Sticky">
      <div class="container">
         <div class="row small-gutters">

            <div class="col-xl-3 col-lg-3 col-md-3">
               <nav class="categories">
                  <ul class="clearfix">
                     <li>
                        <span>
                          <a href="#" style="color: #fff">
                          <span class="hamburger hamburger--spin">
                          <span class="hamburger-box">
                          <span class="hamburger-inner"></span>
                          </span>
                          </span>
                          Categorías
                          </a>
                        </span>
                        <div id="menu">
                           <ul>
                              @foreach ($header_categories as $key => $category)
                              <li>
                                 <span><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria="><span><img src="{{ $category['icon'] }}" style="width: 24px;"></span>  {{ $category['name'] }}</a></span>
                                 <ul>
                                    @foreach ($category['subcategories'] as $subcategory)
                                    <li><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria={{ $subcategory['slug'] }}">{{ $subcategory['name'] }}</a></li>
                                    @endforeach
                                    {{--
                                    <li><a href="listing-grid-2-full.html">Life style</a></li>
                                    <li><a href="listing-grid-3.html">Running</a></li>
                                    <li><a href="listing-grid-4-sidebar-left.html">Training</a></li>
                                    <li><a href="listing-grid-5-sidebar-right.html">View all Collections</a></li>
                                    --}}
                                 </ul>
                              </li>
                              @endforeach
                              <li style="text-align: center;     padding-top: 20px;">
		                        <a    href="/">INICIO</a>
		                     </li>
		                     <li style="text-align: center;" >
		                        <a href="/nosotros">NOSOTROS</a>
		                     </li>
		                     <li style="text-align: center;" >
		                        <a    href="/blog?tag=publicaciones">PUBLICACIONES</a>
		                     </li>
		                     <li style="text-align: center;" >
		                        <a    href="/catalogo">TIENDA</a>
		                     </li>
		                     <li style="text-align: center;" >
		                        <a    href="/libros">LIBROS</a>
		                     </li>
                           <li  style="text-align: center;" >
                           <a    href="/blog?tag=workshops">CLASES Y WORKSHOPS</a>
                        </li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </nav>
            </div>

            <!--div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
               <div class="custom-search-input" style="margin-top: 10px;">
                  <input type="text" placeholder="Buscar Productos" id="search_product">
                  <button type="submit" style="margin-top: 10px;"><i class="header-icon_search_custom"></i></button>
               </div>
            </div-->

            <div class="col-xl-3 col-lg-2 col-md-3">
               <ul class="top_tools">
               	  <li style="display: none;">
               	  	<a href="{{ $company_main->whatsapp }}" target="_blank" class="header_desktop"><img src="/template_1/img/whatsapp.png" class="button_select" width="40px" style="padding: 4px;  "></a>
               	  </li>
                  <li>
                     <div class="dropdown dropdown-cart">
                        {{--<a href="/checkout" style="padding-top: 5px;">
                          <img src="/template_1/img/icon_5_.png" width="30px">
                          <strong id="cart-header_quantity_mobil" style="background: #252525;
                           padding: 1px 2px;
                           border-radius: 15px;
                           position: absolute;
                           right: -10px;
                           line-height: 1;
                           top: 18px;">0</strong>
                         </a>--}}
                        <div class="dropdown-menu" >
                           <div style="    height: 310px;   overflow-y: scroll;  overflow-x: hidden;">
                              <ul id="cart_products">
                                 <!--li>
                                    <a href="product-detail-1.html">
                                    	<figure><img src="/template_1/img/products/product_placeholder_square_small.jpg" data-src="/template_1/img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                    	<strong><span>1x Armor Air x Fear</span>$90.00</strong>
                                    </a>
                                    <a href="index.html#0" class="action"><i class="ti-trash"></i></a>
                                    </li>
                                    <li>
                                    <a href="product-detail-1.html">
                                    	<figure><img src="/template_1/img/products/product_placeholder_square_small.jpg" data-src="/template_1/img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                    	<strong><span>1x Armor Okwahn II</span>$110.00</strong>
                                    </a>
                                    <a href="http://www.ansonika.com/allaia/0" class="action"><i class="ti-trash"></i></a>
                                    </li-->
                              </ul>
                           </div>
                           <div class="total_drop">
                              <div class="clearfix"><strong>Total</strong><span id="cart_subtotal"></span></div>
                              <!--a href="/checkout" class="btn_1 outline">Ver carrito</a-->
                              <a href="/checkout" class="btn_1 outline">Ver Carrito</a>
                              <a href="/checkout/info" class="btn_1">Comprar</a>
                           </div>
                        </div>
                     </div>
                     <!-- /dropdown-cart-->
                  </li>
                  @if(!Auth::check())
                  <li>
                     <div class="dropdown dropdown-access">
                        <!--a href="/acceder" class="access_link" style="padding-top: 6px;"><span>Account</span></a-->
                        <div class="dropdown-menu">
                           <a href="/acceder" class="btn_1">Ingresar</a>
                           <ul>
                              <!--li>
                                 <a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
                                 </li>
                                 <li>
                                 <a href="account.html"><i class="ti-package"></i>My Orders</a>
                                 </li-->
                              <li>
                                 <a href="/registro">
                                    <!--i class="ti-user"></i-->¡Crear Mi Cuenta Ahora!
                                 </a>
                              </li>
                              <!--li>
                                 <a href="/logout"><i class="ti-share-alt"></i>Cerrar Sesión</a>
                                 </li-->
                           </ul>
                        </div>
                     </div>
                     <!-- /dropdown-access-->
                  </li>
                  @else
                  <li>
                     <div class="dropdown dropdown-access">
                        <a href="/miperfil" class="access_link" style="padding-top: 6px;"><span>Account</span></a>
                        <div class="dropdown-menu">
                           <!--a href="/registro" class="btn_1">Registrarme</a-->
                           Hola, {{ Auth::user()->first_name  }} {{ Auth::user()->last_name}}
                           <ul>
                              <!--li>
                                 <a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
                                 </li>
                                 <li>
                                 <a href="account.html"><i class="ti-package"></i>My Orders</a>
                                 </li-->
                              <li>
                                 <a href="/miperfil"><i class="ti-user"></i>Mi Panel</a>
                              </li>
                              <li>
                                 <a href="/logout"><i class="ti-share-alt"></i>Cerrar Sesión</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <!-- /dropdown-access-->
                  </li>
                  @endif
                  <li>
                     <a href="javascript:void(0);" class="btn_search_mob" style="padding-top: 6px; padding-left: 20px;"><span>Buscar</span></a>
                  </li>
                  <li>
                     <div id="logo" class="row mx-0">
                        <a href="#menu" class="btn_cat_mob" style="padding-right: 30px;">
                           <div class="hamburger hamburger--spin" id="hamburger">
                              <div class="hamburger-box" style="margin-top: 8px;">
                                 <div class="hamburger-inner"></div>
                              </div>
                           </div>
                           {{--Productos--}}
                        </a>
                        {{--<a href="/" class="logo_iphone"><img src="{{ $company_main->logotype }}" alt=""  style="height: 30px; margin-top: 5px;"></a>--}}
                     </div>
                  </li>

               </ul>
            </div>

         </div>
         <!-- /row -->
      </div>
      <div class="search_mob_wp">
         <input type="text" class="form-control" id="value_search" placeholder="¿Qué estás buscando?">
         <input type="submit"  id="search_product_mobile" class="btn_1 full-width" value="Buscar">
      </div>
      <!-- /search_mobile -->
   </div>
   <!-- /main_nav -->
</header>
<!-- /header -->
