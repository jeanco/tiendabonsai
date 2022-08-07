<!--Header section start-->
<header class="header header-2">
        {{-- @include('antofagasta.layouts.sections.header_top') --}}
        <div class="header-top sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6 pt-logo" style="background: #fff;">
                        <a href="{{ URL::to('/') }}" class="content-logo"><img src="{{ $company_main->logotype_thumb }}" alt="" class="img-logo"></a>
                    </div>
                    <div class="col-lg-10 d-none d-lg-block">
                        <div class="mgea-full-width">
                            <div class="header-menu">
                                <nav>
                                    <ul>
                                      <li><a href="{{ URL::to('/nosotros') }}">Nosotros</a></li>
                                      <li><a href="{{ URL::to('/catalogo') }}">Propiedades</a></li>
                                      <!-- <li><a href="{{ URL::to('/blog') }}">Blog</a></li> -->
                                      <li><a href="{{ URL::to('/trabaje-con-nosotros') }}">Trabaje con Nosotros</a></li>
                                      <li><a href="{{ URL::to('/confianos-su-propiedad') }}">Administramos tu propiedad</a></li>
                                      <li><a href="{{ URL::to('/contacto') }}">Contacto</a></li>
                                      <!-- <li><a href="{{ URL::to('/login') }}" style="font-weight:400; font-size: 12px;"><i class="fas fa-sign-in-alt"></i>&nbsp;Ingresar</a></li> -->
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
                                <li><a href="{{ URL::to('/contactos') }}"> Contactos</a></li>
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
  @include('antofagasta.layouts.sections.feature_menu')
</div>
