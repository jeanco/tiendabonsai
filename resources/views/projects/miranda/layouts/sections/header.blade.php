<!--Header section start-->
<header class="header header-2">
        {{-- @include('miranda.layouts.sections.header_top') --}}
        <div class="header-top sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="logo">
                            <a href="{{ URL::to('/') }}" class="content-logo"><img src="{{ $company_main->logotype_thumb }}" alt="" class="img-logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-10 d-none d-lg-block">
                        <div class="mgea-full-width">
                            <div class="header-menu">
                                <nav>
                                    <ul>
                                      <li><a href="{{ URL::to('/nosotros') }}">Nosotros</a>
                                        <!-- <ul class="dropdown_menu">
                                            <li><a href="#">Misión</a></li>
                                            <li><a href="#">Visión</a></li>
                                        </ul> -->
                                      </li>
                                      <li><a href="{{ URL::to('/catalogo?category=1') }}">Ventas</a></li>
                                      <li><a href="{{ URL::to('/catalogo?category=2') }}">Alquiler</a></li>
                                      <li><a href="{{ URL::to('/blog') }}">Blog</a></li>
                                      <li><a href="{{ URL::to('/contacto') }}">Contacto</a></li>
                                      <!-- <li class="mega-parent"><a href="index-2.html#">Elements</a>
                                          <ul class="mega_menu">
                                              <li><a href="index-2.html#" class="title">Column 1</a>
                                                  <ul class="mega-submenu">
                                                      <li><a href="elements-accordion.html">Accordion</a></li>
                                                      <li><a href="elements-agent.html">Agent</a></li>
                                                      <li><a href="elements-alerts.html">Alerts</a></li>
                                                      <li><a href="elements-audio.html">Audio</a></li>
                                                      <li><a href="elements-video.html">Video</a></li>
                                                  </ul>
                                              </li>
                                              <li><a href="index-2.html#" class="title">Column 2</a>
                                                  <ul class="mega-submenu">
                                                      <li><a href="elements-blog.html">Blog</a></li>
                                                      <li><a href="elements-client-review.html">Cleint review</a>
                                                      </li>
                                                      <li><a href="elements-contact-form.html">Contact form</a>
                                                      </li>
                                                      <li><a href="elements-fun-factor.html">Fun factor</a></li>
                                                      <li><a href="elements-progressbar.html">progress bar</a>
                                                      </li>
                                                  </ul>
                                              </li>
                                              <li><a href="index-2.html#" class="title">Column 3</a>
                                                  <ul class="mega-submenu">
                                                      <li><a href="elements-properties.html">Properties</a></li>
                                                      <li><a href="elements-map.html">Map</a></li>
                                                      <li><a href="elements-map-2.html">Map 2</a></li>
                                                      <li><a href="elements-services.html">Services</a></li>
                                                      <li><a href="elements-tab.html">Tab</a></li>
                                                  </ul>
                                              </li>
                                              <li><a href="index-2.html#" class="title">Column 4</a>
                                                  <ul class="mega-submenu">
                                                      <li><a href="elements-sticky.html">Sticky page</a></li>
                                                      <li><a href="elements-table.html">Table</a></li>
                                                      <li><a href="elements-typography.html">typography</a></li>
                                                      <li><a href="single-services.html">single services</a></li>
                                                      <li><a href="single-properties.html">single properties</a>
                                                      </li>
                                                  </ul>
                                              </li>
                                          </ul>
                                      </li> -->
                                      @if(!Auth::check())
                                      <li><a href="{{ URL::to('/registro') }}" style="font-weight:400; font-size: 18px;"><i class="fas fa-sign-in-alt"></i>&nbsp;Publicar</a></li>
                                      @else
                                      <li><a style="font-size: 18px;" href="/plataforma"><i class="fas fa-hotel" aria-hidden="true"></i> Mi panel</a></li>
                                      <li><a style="font-size: 18px;" href="/logout"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Salir</a></li>
                                      @endif
                                      
                                      <!--li><a href="{{ URL::to('/') }}" style="font-weight:400; font-size: 12px;"><i class="fas fa-sign-in-alt fa-lg"></i>&nbsp;Ingresar</a></li-->
                                      <!--a href="https://api.whatsapp.com/send?phone={{ $company_main['cel'] }}&amp;text=Me%20interesa%20sus%20servicios%20.%20Más%20información%20por%20favor.&amp;source=&amp;data=" target="_blank" style="color: white; font-size: 20px; margin-right: 5px" ><i class="fab  fa-whatsapp fa-lg"></i></a-->
                                      <a style="color: white; font-size: 20px; margin-right: 5px" href="{{ $company_main['facebook'] }}" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
                                      <a style="color: white; font-size: 20px; margin-right: 5px" href="{{ $company_main['twitter'] }}" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
                                      <!--li><a href="#" style="font-weight:400; font-size: 12px;"><i class="fas fa-phone-alt"></i>&nbsp;+012345678102</a></li-->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile menu start -->
            <div class="mobile-menu-area d-block d-lg-none">
                <div class="container">
                    <div class="col-12">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{ URL::to('/') }}">Inicio</a></li>
                                <li><a href="{{ URL::to('/nosotros') }}">Nosotros</a>

                                </li>
                                <li><a href="{{ URL::to('/catalogo') }}">Catálogo</a></li>
                                <li><a href="{{ URL::to('/blog') }}"> BLOG</a></li>
                                <li><a href="{{ URL::to('/contacto') }}"> Contactos</a></li>
                                @if(!Auth::check())
                                <li><a href="{{ URL::to('/registro') }}" style="font-weight:400; font-size: 18px;"><i class="fas fa-sign-in-alt"></i>&nbsp;Publicar</a></li>
                                @else
                                <li><a style="font-size: 18px;" href="/plataforma"><i class="fas fa-hotel" aria-hidden="true"></i> Mi panel</a></li>
                                <li><a style="font-size: 18px;" href="/logout"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Salir</a></li>
                                @endif
                                <!-- <li><a href="register.html#">Elements</a>
                                    <ul>
                                        <li><a href="register.html#" class="title">Column 1</a>
                                            <ul>
                                                <li><a href="elements-accordion.html">Accordion</a></li>
                                                <li><a href="elements-agent.html">Agent</a></li>
                                                <li><a href="elements-alerts.html">Alerts</a></li>
                                                <li><a href="elements-audio.html">Audio</a></li>
                                                <li><a href="elements-video.html">Video</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="register.html#" class="title">Column 2</a>
                                            <ul>
                                                <li><a href="elements-blog.html">Blog</a></li>
                                                <li><a href="elements-client-review.html">Cleint review</a></li>
                                                <li><a href="elements-contact-form.html">Contact form</a></li>
                                                <li><a href="elements-fun-factor.html">Fun factor</a></li>
                                                <li><a href="elements-progressbar.html">progress bar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="register.html#" class="title">Column 3</a>
                                            <ul>
                                                <li><a href="elements-properties.html">Properties</a></li>
                                                <li><a href="elements-map.html">Map</a></li>
                                                <li><a href="elements-map-2.html">Map 2</a></li>
                                                <li><a href="elements-services.html">Services</a></li>
                                                <li><a href="elements-tab.html">Tab</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="register.html#" class="title">Column 4</a>
                                            <ul>
                                                <li><a href="elements-sticky.html">Sticky page</a></li>
                                                <li><a href="elements-table.html">Table</a></li>
                                                <li><a href="elements-typography.html">typography</a></li>
                                                <li><a href="single-services.html">single services</a></li>
                                                <li><a href="single-properties.html">single properties</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Mobile menu end -->
            <!-- Mobile features start -->
              <a href="" class="btn-features" id="menufeatures"><i class="fas fa-search"></i></a>
              
            <!-- Mobile features end -->
        </div>
        <!-- //////// -->
        <!-- <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="add-property">
                            <a href="add-property.html">ADD PROPERTY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--Search box inner start-->
        <div class="search-box-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search-form">
                            <div class="search-form-inner">
                                <form action="#">
                                    <input type="text" placeholder="Search..">
                                    <button type="submit"><i class="icofont icofont-search-alt-1"></i></button>
                                </form>
                            </div>
                            <div class="search-close-btn">
                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Search box inner end-->
    </header>
<!--Header section end-->
<div id='feature-bar' class="md-none features-menu">
  @include('miranda.layouts.sections.feature_menu')
</div>
