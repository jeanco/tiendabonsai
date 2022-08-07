<!-- header -->
<!--header class="site-header header-transparent"-->
<header class="site-header ">
    @include('wings.layouts.sections.header_top')
    <!-- main header -->
    <div class="sticky-header main-bar-wraper">
        <div class="main-bar clearfix " style="-webkit-box-shadow: -2px 9px 16px -9px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 9px 16px -9px rgba(0,0,0,0.75);
box-shadow: -2px 9px 16px -9px rgba(0,0,0,0.75); border-bottom: 35px solid #e0e0e0;">
            <div class="container-header clearfix" style="padding-top: 8px;
    padding-left: 15px;
    padding-right: 15px;">
                <!-- website logo -->
                <div class="logo-header mostion" style="width: 290px;">
                  <a href="/"><img src="{{ $company->logotype }}" class="logo" alt=""></a>
                  <input type="hidden"  id="logo_url"  value="{{ $company->logotype }}">
                </div>
                <!-- nav toggle button -->
                <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed" aria-expanded="false" >
                  <i class="fas fa-bars"></i>
                </button>
                <!-- extra nav -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        <button id="quik-search-btn" type="button" class="site-button-link btn-head"><i class="fa fa-search"></i></button>
                        <div class="car-count" id="cart-header_quantity">1</div>
                    </div>
                </div>
                <!-- Quik search -->
                <div class="dlab-quik-search bg-primary ">
                    <form>
                        <input name="" value="" type="text" class="form-control" id="home_text-to-search" placeholder="Buscar modelo">
                        <span id="quik-search-remove"><i class="fa fa-close"></i></span>
                    </form>
                </div>
                <!-- extra nav -->
                <div class="extra-nav carrito-responsivo">
                    <div class="extra-cell">
                        <a href="/orden" type="button" class="site-button-link btn-head">
                        <i class="fas fa-shopping-cart " style="padding: 5px 10px; color: white; background: red;">  
                        
                          </i></a>
                    </div>
                </div>
                <div class="extra-nav carrito-no-responsivo">
                    <div class="extra-cell">
                        <a href="/orden" type="button" class="site-button-link btn-head">
                        <i class="fas fa-shopping-cart " style="padding: 0px 0px; color: white; background: red;">  
                        <span  style="color: #fff;
    background: #0066cc;
    display: inline-block;
    font-size: 14px;
    padding: 5px 15px 5px 15px;
    font-weight: 400;
    text-align: center;">COMPRAR</span>
                          </i></a>
                    </div>
                </div>
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <!-- <li class="active"><a href="/win-inicio">Inicio</a></li> -->
                    <li><a href="/nosotros">La Empresa</a></li>
                    <li>
                      {{-- <a href="/catalogo">Vehículos</a> --}}
                      <a href="javascript:;">Vehículos
                          <i class="fa fa-chevron-down">
                          </i>
                      </a>
                        <ul class="sub-menu">
                          @foreach ($category_autos->subcategories as $subcategory)
                            <li><a href="/catalogo?category={{ $subcategory->id }}">{{ $subcategory->name }}</a></li>
                          @endforeach
                        </ul>
                    </li>
                    <!-- <li><a href="javascript:;">Cotizador</a></li> -->
                    <li>
                      <a href="javascript:;">Servicios
                        <i class="fa fa-chevron-down">
                        </i>
                    </a>
                      <ul class="sub-menu">
                        @foreach ($services as $service)
                          <li><a href="/servicios/{{ $service->slug }}">{{ $service->name }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    <li><a href="/repuestos">Repuestos</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/contacto">Contacto</a></li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>
<!-- header END -->
