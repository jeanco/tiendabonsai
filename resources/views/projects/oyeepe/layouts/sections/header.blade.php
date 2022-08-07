 <header class="v2">
        <div class="topbar-mobile hidden-lg hidden-md">
            <div class="active-mobile">
                <div class="language-popup dropdown" style="display: none;">
                    <a id="label" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="ion-ios-world-outline" aria-hidden="true"></i></span>
                  <span>English</span>
                  <span class="ion-chevron-down"></span>
                </a>
                    <ul class="dropdown-menu" aria-labelledby="label">
                        <li><a href="home-2.html#">English</a></li>
                        <li><a href="home-2.html#">Vietnamese</a></li>
                    </ul>
                </div>
            </div>
            <div class="right-nav">
                <div class="active-mobile">
                    <div class="header_user_info popup-over e-scale hidden-lg hidden-md dropdown">
                        <div data-toggle="dropdown" class="popup-title dropdown-toggle" title="Account">
                            <i class="ion-android-person"></i><span> Noveltie</span>
                        </div>
                        <ul class="links dropdown-menu list-unstyled">
                            <li>
                                <a id="customer_login_link" href="home-2.html#" title="Sign in"><i class="ion-log-in"></i> Iniciar Sesión</a>
                            </li>
                            <li>
                                <a id="customer_register_link" href="home-2.html#" title="Register"><i class="ion-ios-personadd"></i> Crear Cuenta</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="active-mobile search-popup pull-right">
                    <div class="search-popup dropdown" data-toggle="modal" data-target="#myModal">
                        <i class="ion-search fa-3a"></i>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="top-nav v2 hidden-xs hidden-sm" style="background: #01c5a7;">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="right-nav v2">
                            <ul>
                                {{--<li><a href="home-2.html#"><i class="ion-ios-heart fa-1a" aria-hidden="true"></i>wishlist</a></li>
                                <li><a href="home-2.html#"><i class="ion-arrow-swap fa-1a" aria-hidden="true"></i>compare</a></li>--}}

                                @if(!Auth::check())
                                <li><a href="/registro"><i class="ion-ios-personadd fa-1a" aria-hidden="true"></i>Registrarme</a></li>
                                <li><a href="/acceder"><i class="ion-log-in fa-1a" aria-hidden="true"></i>Ingresar</a></li>
                                @else
                                <li><a href="/miperfil/{{ Auth::user()->id }}"><i class="ion-log-in fa-1a" aria-hidden="true"></i>Mi panel</a></li>
                                <li><a href="/logout"><i class="ion-log-in fa-1a" aria-hidden="true"></i>Salir</a></li>
                                @endif
                            </ul>
                            <span class="phone v2" style="color: white">{{ $company_main->cel }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom v2">
            <div class="container">
                <div class="row">
                    <input type="hidden" name="" id="is_logged" value="{{ Auth::check() }}">
                    <input type="hidden" name="" id="user_index" value="{{ (Auth::check()) ? Auth::user()->id : '' }}">

                    <div class="col-md-3  logo">
                        <a href="/"><img src="{{ $company_main->logotype_thumb }}" alt="images" class="img-reponsive"></a>
                    </div>
                    <div class="col-md-9  nextlogo">
                        <div class="block block-2 v2">
                            <div class="cart">
                                <a href="/orden" title="" id="label3" >
                                    <div class="photo photo-cart">
                                        <img src="/website/img/cart_2.png" alt="images" class="img-reponsive">
                                        <span class="lbl v2" id="cart-header_quantity">05</span>
                                    </div>

                                </a>
                            {{--<div class="dropdown-menu dropdown-cart" aria-labelledby="label3">
                                    <ul>
                                        <li>
                                            <div class="item-order">
                                                <div class="item-photo">
                                                    <a href="home-2.html#"><img src="img/cart1.png" alt="images" class="img-responsive"></a>
                                                </div>
                                                <div class="item-content">
                                                    <h3><a href="home-2.html#" title="">iPad Pro MLMX2CL/A</a></h3>
                                                    <p class="price black">$199.69</p>
                                                    <p class="quantity">x1</p>
                                                </div>
                                            </div>
                                            <div class="btn-delete"><a href="home-2.html#" title="" class="btndel">x</a></div>
                                        </li>
                                        <li>
                                            <div class="item-order">
                                                <div class="item-photo">
                                                    <a href="home-2.html#"><img src="img/cart1.png" alt="images" class="img-responsive"></a>
                                                </div>
                                                <div class="item-content">
                                                    <h3><a href="home-2.html#" title="">iPad Pro MLMX2CL/A</a></h3>
                                                    <p class="price black">$199.69</p>
                                                    <p class="quantity">x1</p>
                                                </div>
                                            </div>
                                            <div class="btn-delete"><a href="home-2.html#" title="" class="btndel">x</a></div>
                                        </li>
                                    </ul>
                                    <div class="content-1">
                                        <span class="total">Total: <strong class="price black">$399.00</strong></span>
                                        <span class="quantity"><strong class="number">02</strong> products</span>
                                    </div>
                                    <div class="content-2">
                                        <a href="home-2.html#" class="addcart">ADD TO CART</a>
                                        <a href="home-2.html#" class="viewcart">View Cart</a>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                        <div class="block block-1">

                            <div class="return v2">
                                <div class="photo">
                                   <span class="ion-android-person" style="font-size: 30px; color: white" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="search v2 hidden-xs hidden-sm">
                            <form class="search-form v2">
                                <input type="text" name="" class="form-control" placeholder="Buscar ofertas"  style="border-radius: 5px;" id="search_product">
                                <button type="button" class="search-icon"></button>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu v2" style="    background: #01c5a7;">
            <div class="container">
                <div class="navbar-simple" style="background: #01c5a7;">
                    <aside id="column-left" class="v2">
                        {{--<nav class="navbar-default">
                            <div class="menu-heading v2 js-nav-menu" style="background: #01c5a7;"><i class="ion-android-menu"></i></div>
                            <div class="vertical-wrapper v2 js-dropdown-menu">
                                <ul class="level0-ver2">
                                    <!--li><a href="/catalogo">Todos</a></li-->
                                    @foreach($subcategories as $subcategory)
                                    <li><a href="/catalogo?category={{ $subcategory['category']['slug'] }}&subcategory={{ $subcategory['slug'] }}" data-slug_category={{ $subcategory['category']['slug'] }} data-slug="{{ $subcategory['slug'] }}" class="catalog-subcategory__change">{{ $subcategory['name'] }}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </nav>--}}
                        <div class="collapse navbar-collapse v2" id="myNavbar">
                            <ul class="menubar v2" style="    text-align: center;">
                                <li>
                                                <a href="/" class="" style="font-weight: 700; padding-top: 30px;">INICIO
                                                </a>

                                        </li>
                            </ul>
                        </div>
                    </aside>

                    <aside id="">
                        <div class="collapse navbar-collapse v2" id="myNavbar">
                            <ul class="menubar v2" style="    text-align: center;">
                                <!--li>
                                    <a href="/catalogo">
                                    <span class="plus-more">+</span>
                                    Todos
                                </a>
                                </li-->
                                @foreach($categories as $key =>  $category)

                                    @if($category['slug'] == 'cupones')

                                        @foreach($category['subcategories'] as $subcategory)

                                            <li>
                                                <a href="/catalogo?category={{ $subcategory['category']['slug'] }}&subcategory={{ $subcategory['slug'] }}" data-slug_category={{ $subcategory['category']['slug'] }} data-slug="{{ $subcategory['slug'] }}"  class="catalog-subcategory__change">
                                                    <span><img src="{{ $category['icon'] }}" width="26" height="26" id="" data-name="" ></span>
                                                    {{ $subcategory['name'] }}
                                                </a>
                                            </li>


                                        {{-- <li>
                                                <a href="/catalogo?category={{ $subcategory['category']['slug'] }}&subcategory={{ $subcategory['slug'] }}" data-slug_category={{ $subcategory['category']['slug'] }} data-slug="{{ $subcategory['slug'] }}" class="catalog-category__change"></a>
                                                <span><img src="{{ $category['icon'] }}" width="26" height="26" id="" data-name="" ></span>
                                                    {{ $subcategory['name'] }}
                                                </a>

                                        </li> --}}
                                        @endforeach
                                        {{-- <li>
                                                <a href="/catalogo?category={{ $category['slug'] }}" data-slug={{ $category['slug'] }} class="catalog-category__change">
                                                    <span><img src="{{ $category['icon'] }}" width="26" height="26" id="" data-name="" ></span>
                                                    {{ $category['name'] }}
                                                </a>
                                                <ul class="dropdown-menu menu-level">
                                                    @foreach($category['subcategories'] as $subcategory)
                                                    <li><a href="/catalogo?category={{ $subcategory['category']['slug'] }}&subcategory={{ $subcategory['slug'] }}" data-slug_category={{ $subcategory['category']['slug'] }} data-slug="{{ $subcategory['slug'] }}" class="catalog-subcategory__change">{{ $subcategory['name'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                        </li> --}}

                                    @else
                                    <li>
                                        <a href="/catalogo?category={{ $category['slug'] }}" data-slug={{ $category['slug'] }} class="catalog-category__change">
                                            <span><img src="{{ $category['icon'] }}" width="26" height="26" id="" data-name="" ></span>
                                            {{ $category['name'] }}
                                        </a>
                                        {{-- @if($category['id']==2) --}}
                                        <ul class="dropdown-menu menu-level">
                                            @foreach($category['subcategories'] as $subcategory)
                                            <li><a href="/catalogo?category={{ $subcategory['category']['slug'] }}&subcategory={{ $subcategory['slug'] }}" data-slug_category={{ $subcategory['category']['slug'] }} data-slug="{{ $subcategory['slug'] }}" class="catalog-subcategory__change">{{ $subcategory['name'] }}</a></li>
                                            @endforeach
                                        </ul>
                                            {{-- @endif --}}
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </header>
