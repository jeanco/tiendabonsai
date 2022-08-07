<!-- Banner Popup Start -->
       {{-- <div class="popup_banner">
            <span class="popup_off_banner">×</span>
            <div class="banner_popup_area">
                    <img src="/yekatex/img/banner/pop-banner.jpg" alt="">
            </div>
        </div>
        <!-- Banner Popup End -->
       <!-- Newsletter Popup Start -->
        <div class="popup_wrapper">
            <div class="test">
                <span class="popup_off">Close</span>
                <div class="subscribe_area text-center mt-60">
                    <h2>Newsletter</h2>
                    <p>Subscribe to the Truemart mailing list to receive updates on new arrivals, special offers and other discount information.</p>
                    <div class="subscribe-form-group">
                        <form action="index.html#">
                            <input autocomplete="off" type="text" name="message" id="message" placeholder="Enter your email address">
                            <button type="submit">subscribe</button>
                        </form>
                    </div>
                    <div class="subscribe-bottom mt-15">
                        <input type="checkbox" id="newsletter-permission">
                        <label for="newsletter-permission">Don't show this popup again</label>
                    </div>
                </div>
            </div>
        </div>--}}
        <!-- Newsletter Popup End -->
        <!-- Main Header Area Start Here -->
        <header>
                <input type="hidden" name="" id="is_logged" value="{{ Auth::check() }}">
                <input type="hidden" name="" id="user_index" value="{{ (Auth::check()) ? Auth::user()->id : '' }}">
            <!-- Header Top Start Here -->
            <div class="header-top-area">
                <div class="container">
                    <!-- Header Top Start -->
                    <div class="header-top">
                        <ul>
                            <li><i class="lnr lnr-map-marker"></i><a href="">Dirección: {{ $company_main->address }}</a> </li>
                            <li><i class="lnr lnr-envelope"></i><a href="index.html#"> Correo: {{ $company_main->email }} </a></li>
                            <li><i class="lnr lnr-phone-handset"></i> <a href="">Teléfono: {{ $company_main->phone }}</a> </li>
                        </ul>
                         <ul class="">


                                        <li><a href="{{ $company_main->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="{{ $company_main->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                       

                            <!--li><a href="index.html#">Mi cuenta<i class="lnr lnr-chevron-down"></i></a>
                              
                                <ul class="ht-dropdown">
                                    <li><a href="login.html">Ingresar</a></li>
                                    <li><a href="register.html">Registrarse</a></li>
                                </ul>
                              
                            </li-->
                        </ul>
                    </div>
                    <!-- Header Top End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Top End Here -->
            <!-- Header Middle Start Here -->
            <div class="header-middle ptb-15">
                <div class="container">
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-3 col-md-12">
                            <div class="logo mb-all-30" style="text-align: center;">
                                <a href="/"><img src="/yekatex/img/logo1.png" width="100px" alt="logo-image"></a>
                            </div>
                        </div>
                        <!-- Categorie Search Box Start Here -->
                        <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                            <div class="categorie-search-box">
                                <form>
                                    <div class="form-group">
                                        <select class="bootstrap-select" id="home-search_category" >
                                            <option data-slug="" value="">Todas las categorías</option>
                                            @foreach ($categories as $u => $category)
                                                <option data-slug={{$category['slug']}} value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <input id="home-search_text" type="text" placeholder="Busca tu producto...">
                                    <button id="home-search__go"><i class="lnr lnr-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categorie Search Box End Here -->
                        <!-- Cart Box Start Here -->
                        <div class="col-lg-4 col-md-12">
                            <div class="cart-box mt-all-30">
                                <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                    <li class="d-none d-lg-block">
                                      <a href="{{ URL::to('/orden') }}"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro" id="cart-header_quantity">0</span><span>carrito</span></span></a>
                                        <ul class="ht-dropdown cart-box-width">
                                            <li id="cart_products">
                                               
                                                <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="index.html#"><img src="/yekatex/img/products/1.jpg" alt="cart-image"></a>
                                                        <span class="pro-quantity">1X</span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="product.html">Printed Summer Red </a></h6>
                                                        <span class="cart-price">27.45</span>
                                                        <span>Size: S</span>
                                                        <span>Color: Yellow</span>
                                                    </div>
                                                    <a class="del-icone" href="index.html#"><i class="ion-close"></i></a>
                                                </div>
                                                
                                                <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="index.html#"><img src="/yekatex/img/products/2.jpg" alt="cart-image"></a>
                                                        <span class="pro-quantity">1X</span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="product.html">Printed Round Neck</a></h6>
                                                        <span class="cart-price">45.00</span>
                                                        <span>Size: XL</span>
                                                        <span>Color: Green</span>
                                                    </div>
                                                    <a class="del-icone" href="index.html#"><i class="ion-close"></i></a>
                                                </div>
                                               
                                                <div class="cart-footer">
                                                   <ul class="price-content">
                                                       <li>Subtotal <span>S/ 57.95</span></li>
                                                       <li>Envío <span>S/ 7.00</span></li>

                                                       <li>Total <span>S/ 64.95</span></li>
                                                   </ul>
                                                    <div class="cart-actions text-center">
                                                        <a class="cart-checkout" href="/orden">Comprar</a>
                                                    </div>
                                                </div>
                                               
                                            </li>
                                        </ul>
                                    </li>
                                    {{--<li><a href="index.html#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Favoritos</span><span>lista (0)</span></span></a>
                                    </li> --}}
                                    <!-- <li>
                                      <a href="index.html#">
                                        <i class="lnr lnr-user"></i><span class="my-cart"><span> <strong>Ingresar</strong> o</span><span> Registrate</span></span>
                                      </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- Cart Box End Here -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Middle End Here -->
            <!-- Header Bottom Start Here -->
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                            <span class="categorie-title">Categorías </span>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-12 ">
                            <nav class="d-none d-lg-block">
                                <ul class="header-bottom-list d-flex">
                                    <li class="active"><a href="/nosotros">Nosotros</a></li>
                                    <li class=""><a href="/catalogo">Catálogo</a></li>
                                    <li class=""><a href="/blog">Blog</a></li>
                                    <li class=""><a href="/contacto">Contacto</a></li>
                                    <!-- <li><a href="index.html#">pages<i class="fa fa-angle-down"></i></a>
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="contact.html">contact us</a></li>
                                            <li><a href="register.html">register</a></li>
                                            <li><a href="login.html">sign in</a></li>
                                            <li><a href="forgot-password.html">forgot password</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </nav>
                            <div class="mobile-menu d-block d-lg-none">
                                <nav>
                                    <ul>
                                        <li><a href="/">Inicio</a></li>
                                        <li><a href="/nosotros">Nosotros</a></li>
                                        <li><a href="/catalogo">Catálogo</a></li>
                                        <li><a href="/blog">Blog</a></li>
                                        <li><a href="/contacto">Contacto</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="text-right d-block d-lg-none" style="position: absolute; top: 10px; right: 70px;">
                              <a href="/orden"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="color: #fff;"></i></a>&emsp;
                              <a href="/orden"><i class="fa fa-sliders fa-2x" id="menufeatures" aria-hidden="true" style="color: #fff;"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Bottom End Here -->
            <!-- Mobile Vertical Menu Start Here -->
            <div class="container d-block d-lg-none">
                <div class="vertical-menu mt-30">
                    <span class="categorie-title mobile-categorei-menu">Comprar por Categorías</span>
                    <nav>
                        <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                            <ul>
                              @foreach($categories as $key => $category)
                                <li class="has-sub"><a href="#">{{ $category['name'] }}</a>
                                    <ul class="category-sub">
                                        @foreach($category['subcategories'] as $k => $subcategory)
                                        <li><a href="/catalogo?category={{ $category['slug'] }}&subcategory={{ $subcategory['slug'] }}">{{ $subcategory['name'] }}</a></li>
                                        @endforeach
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- category-menu-end -->
                    </nav>
                </div>
            </div>
            <!-- Mobile Vertical Menu Start End -->
        </header>
        <!-- Main Header Area End Here -->
<!-- // -->
<!-- Categorie Menu & Slider Area Start Here -->
<div class="main-page-banner home-3">
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
                            <!-- More Categoies End -->
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Vertical Menu End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Categorie Menu & Slider Area End Here -->
<div id='feature-bar' class="md-none features-menu">
  @include('yekatex.layouts.sections.feature_menu')
</div>
