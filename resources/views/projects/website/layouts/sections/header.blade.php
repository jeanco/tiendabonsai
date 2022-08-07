<header>
    @include('website.layouts.sections.header_top')
    <div class="bottom">
        <div class="container">
            @php
                $company_main = \App\Company::whereMain(1)->first();
            @endphp

            <div class="row">
                <div class="col-md-3 col-sm-8 col-xs-7 logo " style="padding: 12px;">
                    <a href="/" title="Clickbuy"><img src="{{ $company_main->logotype_thumb }}" alt="images" class="img-reponsive animated bounce delay-0s"></a>
                </div>
                <input type="hidden" name="" id="is_logged" value="{{ Auth::check() }}">
                <input type="hidden" name="" id="user_index" value="{{ (Auth::check()) ? Auth::user()->id : '' }}">
                <div class="col-md-9 col-sm-4 col-xs-5 nextlogo">
                    <div class="block block-2">
                        <div class="">
                            <a href="/orden">
                                <div class="photo photo-cart">
                                    <img src="/website/img/cart.png" alt="images" class="img-reponsive">
                                    <span class="lbl" id="cart-header_quantity">0</span>
                                </div>
                                <p class="inform inform-cart">
                                    <span class="strong">CARRITO<br></span>
                                    <span class="price-cart" id="cart-header_total">S/0.00</span>
                                </p>
                            </a>
                            <!--  <div class="dropdown-menu dropdown-cart" aria-labelledby="label3">
                                <ul>
                                    <li>
                                        <div class="item-order">
                                            <div class="item-photo">
                                                <a href="index.html#"><img src="website/img/cart1.png" alt="images" class="img-responsive"></a>
                                            </div>
                                            <div class="item-content">
                                                <h3><a href="index.html#" title="">iPad Pro MLMX2CL/A</a></h3>
                                                <p class="price black">$199.69</p>
                                                <p class="quantity">x1</p>
                                            </div>
                                        </div>
                                        <div class="btn-delete"><a href="index.html#" title="" class="btndel">x</a></div>
                                    </li>
                                    <li>
                                        <div class="item-order">
                                            <div class="item-photo">
                                                <a href="index.html#"><img src="website/img/cart1.png" alt="images" class="img-responsive"></a>
                                            </div>
                                            <div class="item-content">
                                                <h3><a href="index.html#" title="">iPad Pro MLMX2CL/A</a></h3>
                                                <p class="price black">$199.69</p>
                                                <p class="quantity">x1</p>
                                            </div>
                                        </div>
                                        <div class="btn-delete"><a href="index.html#" title="" class="btndel">x</a></div>
                                    </li>
                                </ul>
                                <div class="content-1">
                                    <span class="total">Total: <strong class="price black">$399.00</strong></span>
                                    <span class="quantity"><strong class="number">02</strong> products</span>
                                </div>
                                <div class="content-2">
                                    <a href="index.html#" class="addcart">ADD TO CART</a>
                                    <a href="index.html#" class="viewcart">View Cart</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    {{--<div class="block block-1">
                        <div class="protect">
                            <div class="photo">
                                <svg width="28" height="33" id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180.05 214.27">
                                    <title>security</title>
                                    <path d="M196.93,55.17c-.11-5.78-.21-11.25-.21-16.54a7.5,7.5,0,0,0-7.5-7.5c-32.07,0-56.5-9.22-76.85-29a7.5,7.5,0,0,0-10.46,0c-20.35,19.79-44.77,29-76.84,29a7.5,7.5,0,0,0-7.5,7.5c0,5.29-.1,10.76-.22,16.54-1,53.84-2.44,127.57,87.33,158.68a7.49,7.49,0,0,0,4.91,0C199.36,182.74,198,109,196.93,55.17ZM107.13,198.81c-77-28-75.82-89.23-74.79-143.35.06-3.25.12-6.4.16-9.48,30-1.27,54.06-10.37,74.63-28.28,20.57,17.91,44.59,27,74.63,28.28,0,3.08.1,6.23.16,9.48C183,109.58,184.12,170.84,107.13,198.81Z" transform="translate(-17.11 0)" />
                                    <path d="M133,81.08l-36.2,36.2L81.31,101.83a7.5,7.5,0,0,0-10.61,10.61l20.75,20.75a7.5,7.5,0,0,0,10.61,0l41.5-41.5A7.5,7.5,0,1,0,133,81.08Z" transform="translate(-17.11 0)" />
                                </svg>
                            </div>
                            <p class="inform">
                                <span class="strong">Infomation<br></span> Protected
                            </p>
                        </div>
                        <div class="return">
                            <div class="photo">
                                <svg width="30" height="30" id="Capa_2" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 612.85">
                                    <title>update-arrows</title>
                                    <path d="M600.48,221.79c-14.43-50.5-40.14-94.33-77.94-132.13a300.48,300.48,0,0,0-100-66.57C385,7.84,346.58,0,306.78,0V37.47c69.91,0,138.93,27,190,78.28A264.15,264.15,0,0,1,564.7,231.16c12.55,43.87,14.38,88,4.68,132.47A261.77,261.77,0,0,1,509.83,482l-52.18-51.18V558.33l130.13,2-52.18-52.18Q587.78,448.93,604.84,373A301.45,301.45,0,0,0,600.48,221.79Z" transform="translate(-0.43)" />
                                    <path d="M47.85,382A267.44,267.44,0,0,1,43.5,249.56,263.58,263.58,0,0,1,103.38,130.8l52.18,51.85V54.53L25.44,53.19l51.85,51.52Q25.11,163.92,8,239.85a301.82,301.82,0,0,0,4.35,151.54c14.34,50.2,40.14,94,77.95,131.81a300.35,300.35,0,0,0,100,66.57,306.59,306.59,0,0,0,116.42,23.08v-36.8a267,267,0,0,1-190.35-78.94C83.54,464.09,60.41,425.9,47.85,382Z" transform="translate(-0.43)" />
                                </svg>
                            </div>
                            <p class="inform">
                                <span class="strong">Free<br></span> Return
                            </p>
                        </div>
                    </div>--}}
                    <div class="search hidden-xs hidden-sm">
                        <form action="index.html#" class="search-form">
                            <input type="text" name="s" class="form-control" placeholder="Buscar productos">
                            <button type="submit" class="search-icon"></button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu  " > <!-- navbar-fixed-top-->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-6 column-left">
                <aside id="column-left">
                    <nav class="navbar-default">
                        <div class="menu-heading js-nav-menu">Categorias</div>
                        {{--<div class="vertical-wrapper js-dropdown-menu js-dropdown-open active">--}}
                            <div class="vertical-wrapper v3 js-dropdown-menu ">
                                <ul class="level0">
                                    @foreach($categories as $category)
                                    <li>
                                        <a href="/catalogo?category={{ $category['slug'] }}" data-slug="{{ $category['slug'] }}" class="click-menu catalog-category__change">
                                        <img src="{{ $category['icon'] }}" style="width: 10%;">&nbsp {{ $category['name'] }}</a>
                                        <div class="dropdown-content" style="height: 550px;">
                                            <ul class="level1">
                                                <li class="sub-menu col-3">
                                                    <a href="index.html#">Subcategorías</a>
                                                    <ul class="level2">
                                                        @foreach($category['subcategories'] as $subcategory)

                                                        <li class="col-inner"><a href="/catalogo?category={{ $category['slug'] }}&subcategory={{ $subcategory['slug'] }}" data-slug="{{ $subcategory['slug'] }}" class="click-menu catalog-subcategory__change">{{ $subcategory['name'] }}</a></li>
                                                        @endforeach
                                                        <!--
                                                        <li class="col-inner"><a href="index.html#">Maybellin Face Power</a></li> -->
                                                    </ul>
                                                </li>
                                                <!--                                                <li class="sub-menu col-3">
                                                    <a href="index.html#">Electronic</a>
                                                    <ul class="level2">
                                                        <li class="col-inner"><a href="index.html#">Maybellin Face Power</a></li>
                                                        <li class="col-inner"><a href="index.html#">Chanel Mascara</a></li>
                                                        <li class="col-inner"><a href="index.html#">Mascara For Full Lashes Mascara</a></li>
                                                        <li class="col-inner"><a href="index.html#">Offical Cosme-Decom Maybellin Face</a></li>
                                                        <li class="col-inner"><a href="index.html#">Offical Cosme-Decom</a></li>
                                                        <li class="col-inner"><a href="index.html#">Lady Dior Mascara</a></li>
                                                        <li class="col-inner"><a href="index.html#">Casopia</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sub-menu col-3">
                                                    <a href="index.html#">COMPUTER & OTHERS</a>
                                                    <ul class="level2">
                                                        <li class="col-inner"><a href="index.html#">Maybellin Face Power</a></li>
                                                        <li class="col-inner"><a href="index.html#">Chanel Mascara</a></li>
                                                        <li class="col-inner"><a href="index.html#">Mascara For Full Lashes Mascara</a></li>
                                                        <li class="col-inner"><a href="index.html#">Offical Cosme-Decom Maybellin Face</a></li>
                                                        <li class="col-inner"><a href="index.html#">Offical Cosme-Decom</a></li>
                                                        <li class="col-inner"><a href="index.html#">Lady Dior Mascara</a></li>
                                                        <li class="col-inner"><a href="index.html#">Draven</a></li>
                                                    </ul>
                                                </li> -->
                                            </ul>
                                            <div class="clearfix"></div>
                                            <!-- <div class="banner">
                                                <a href="index.html#"><img src="website/img/megamenubanner.png" alt="images" class="img-responsive"></a>
                                            </div> -->
                                        </div>
                                    </li>
                                    @endforeach
                                    <!--li><a href="index.html#">otros</a></li>
                                    <li class="sub-form-li">
                                        <div>Subscribete</div>
                                        <form action="index.html#" class="sub-form">
                                            <input type="text" name="e" class="form-control" placeholder="Ingrese su email...">
                                            <button type="submit" class="btn btn-sub">Enviar <span class="ion-chevron-right"></span></button>
                                        </form>
                                    </li-->
                                </ul>
                            </div>
                        </nav>
                    </aside>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-6 column-right">
                    <div class="deal">
                        <a href="/catalogo?category=&subcategory=&promotion=true" class="btn-deal" id="catalog_special-offers">Oferta especial</a>
                    </div>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="menu-title">MENU</span>
                    </button>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="menubar js-menubar">
                            <li class="menu-collection-page menu-item-has-child dropdown">
                                <a href="/nosotros" title="Marketplace"><i class="fa fa-home"></i>Nosotros</a>
                            </li>
                            <li class="menu-collection-page menu-item-has-child dropdown">
                                <a href="/catalogo" title="Marketplace">Catálogo</a>
                            </li>
                            <li class=" menu-demo-page menu-item-has-child dropdown">
                                <a href="/tiendas" title="Sellerdemo">Tiendas</a>
                                <span class="plus js-plus-icon"></span>
                                <div class="dropdown-menu dropdown-menu-bg">
                                    <ul class="level1">
                                        @foreach($company_categories as $key => $category)
                                        <li class="sub-menu col-2 text-center" >
                                            <a href="index.html#" >{{ $category['name'] }}</a>
                                            <ul class="level2">
                                                @foreach($category['companies'] as $company)
                                                <li class="col-inner text-center"><a href="/{{ $company['slug_company'] }}" title=""><img style=" width: 100%; height: 50px; object-fit: contain; filter: brightness(70%);" src="{{ $company['logotype_thumb'] }}">{{ $company['name_company'] }}</a></li>
                                               @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="clearfix"></div>
                                    <div class="deal">
                                        <a href="/tiendas" class="btn-deal">ver más tiendas</a>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-collection-page menu-item-has-child dropdown">
                                <a href="/contacto" title="ContactUs">Contacto</a>
                            </li>
                            <li class="menu-collection-page menu-item-has-child dropdown">
                                <a href="/blog" title="ContactUs">Blog</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</header>
