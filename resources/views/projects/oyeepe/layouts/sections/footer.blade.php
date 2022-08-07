<div class="features" style="background: #ffffff;">
   <div class="menu v2" style="    background: #01c5a7;">
            <div class="container">
                <div class="navbar-simple" style="background: #01c5a7;">

                    <aside >
                        <div class="collapse navbar-collapse v2" id="myNavbar">
                            <ul class="menubar v2" style="    text-align: center;">
                                @foreach($categories as $category)
                                <li>
                                    <a href="/catalogo?category={{ $category['slug'] }}" data-slug={{ $category['slug'] }} class="catalog-category__change">
                                <span><img src="{{ $category['icon'] }}" width="26" height="26" id="Capa_4" data-name="Capa 4" ></span>
                                {{ $category['name'] }}</a>
                                </li>
                                @endforeach
                            {{--<li>
                                    <a href="home-2.html#">
                                    <span class="plus-more">+</span>
                                    More Items
                                </a>
                                </li>--}}
                            </ul>
                        </div>
                    </aside>
                </div>

            </div>
        </div>
        <div class="container">
            <p>{!! $company_main->terms_and_conditions !!}</p>
        </div>

</div>

<footer>
        <div class="info" style="background: #141414;">
            @php
                $company_main = \App\Company::whereMain(1)->first();
            @endphp
            <div class="container">
                <div class="row ">

                    <div class="col-md-4 col-xs-12" style="margin-bottom: 15px;">
                        <div class="photo">
                            <a href="index.html#"><img src="{{ $company_main->logotype_white_thumb }}" alt="images" class="img-responsive"></a>
                        </div>
                        <p class="info-desc">{{ $company_main->description_company }}</p>
                        <div class="widget-info">
                            <ul>
                                <li style="color: #efefef;"><i  style="color: #efefef;" class="ion-ios-location fa-4" aria-hidden="true"></i>{{ $company_main->address }}</li>
                                <li class="clearfix"></li>
                                <li style="color: #efefef;"><i  style="color: #efefef;" class="ion-ios-telephone fa-4" aria-hidden="true"></i>
                                    <p class="title-contain">{{ $company_main->phone }}</p>
                                </li>
                                <li class="clearfix"></li>
                                <li style="color: #efefef;"><i style="color: #efefef;"  class="ion-email-unread fa-4" aria-hidden="true"></i>
                                    <p class="title-contain">{{ $company_main->email }}</p>
                                </li>
                                <li class="clearfix"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12" style="margin-bottom: 15px;">
                        <h3 style="margin: 0px 0px 10px 0px;color: #efefef;">Conócenos</h3>
                        <ul class="fmenu">
                            <li><a style="color: #efefef;" href="/catalogo" >Catálogos</a></li>
                           {{--  <li><a style="color: #efefef;" href="/tiendas" >Tiendas</a></li>--}}
                            <li><a style="color: #efefef;" href="/contacto" >Contactos</a></li>
                           {{-- <li><a style="color: #efefef;" href="/blog" >Blog</a></li>--}}
                           <li><a style="color: #efefef;" href="/empresa" >Registra tu empresa</a></li>
                           <li><a style="color: #efefef;" href="/plataforma" >Ingresar</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-xs-12" style="margin-bottom: 15px;">
                        <h3 style="margin: 0px 0px 15px 0px;color: #efefef;">Síguenos en nuestras Redes Sociales</h3>
                        <ul class="social">
                            <li><a href="{{ $company_main['facebook'] }}"><i class="ion-social-facebook fa-3" aria-hidden="true"></i></a></li>
                            <li><a href="{{ $company_main['twitter'] }}"><i class="ion-social-twitter fa-3" aria-hidden="true"></i></a></li>
                            <li><a href="{{ $company_main['google'] }}"><i class="ion-social-googleplus fa-3" aria-hidden="true"></i></a></li>
                            <li><a href="{{ $company_main['youtube'] }}"><i class="ion-social-youtube fa-3" aria-hidden="true"></i></a></li>
                            <!-- <li><a href="index.html#"><i class="ion-social-linkedin fa-3" aria-hidden="true"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <span>© <a href="#" title="">Noveltie</a> - Derechos Reservados.</span>
                <ul class="payment">
                    <li><a href="#"><img src="/website/img/paypal.png" alt="images" class="img-responsive"></a></li>
                    <li><a href="#"><img src="/website/img/visa.png" alt="images" class="img-responsive"></a></li>
                    <li><a href="#"><img src="/website/img/american.png" alt="images" class="img-responsive"></a></li>
                    <li><a href="#"><img src="/website/img/mastercard.png" alt="images" class="img-responsive"></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </footer>
