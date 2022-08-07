<div class="features">
    <div class="container">
        <div class="row">
            @foreach($values as $key => $value)
            <div class="col-md-3 col-sm-6 col-xs-12 fea-column-inner">
                <div class="fea-box">
                    <div class="photo">
                        <img src="{{ $value['image_thumb'] }}" alt="images" class="img-reponsive" style="width: 300px;">
                    </div>
                    <p class="inform-ver2">
                        <span class="strong">{{ $value['title'] }}<br></span> {{ $value['description'] }}
                    </p>
                </div>
            </div>
            @endforeach
<!--             <div class="col-md-3 col-sm-6 col-xs-12 fea-column-inner">
                <div class="fea-box">
                    <div class="photo">
                        <img src="/website/img/gift.png" alt="images" class="img-reponsive">
                    </div>
                    <p class="inform-ver2">
                        <span class="strong">Oferta del día<br></span> mira que tenemos para hoy
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 fea-column-inner">
                <div class="fea-box">
                    <div class="photo">
                        <img src="/website/img/fly.png" alt="images" class="img-reponsive">
                    </div>
                    <p class="inform-ver2">
                        <span class="strong">Envío gratis<br></span> en miles de productos
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 fea-column-inner">
                <div class="fea-box">
                    <div class="photo">
                        <img src="/website/img/return.png" alt="images" class="img-reponsive">
                    </div>
                    <p class="inform-ver2">
                        <span class="strong">Reembolso Fácil<br></span> en todas tus compras
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 fea-column-inner">
                <div class="fea-box">
                    <div class="photo">
                        <img src="/website/img/secu.png" alt="images" class="img-reponsive">
                    </div>
                    <p class="inform-ver2">
                        <span class="strong">Servicio Seguro<br></span> proteccion garantizada
                    </p>
                </div>
            </div> -->
        </div>
    </div>
</div>

<footer>
        <div class="info">
            @php
                $company_main = \App\Company::whereMain(1)->first();
            @endphp
            <div class="container">
                <div class="row ">

                    <div class="col-md-3 col-xs-12" style="margin-bottom: 15px;">
                        <div class="photo">
                            <a href="index.html#"><img src="{{ $company_main->logotype_white_thumb }}" alt="images" class="img-responsive" style="filter: invert(100%);"></a>
                        </div>
                        <p class="info-desc">{{ $company_main->description_company }}</p>
                       
                    </div>
                    <div class="col-md-5 col-xs-12" style="margin-bottom: 15px;">
                        <div class="row">
                            <div class="col-md-6 col-xs-12" style="margin-bottom: 15px;">
                                <h3 style="margin: 0px 0px 10px 0px;">Déjanos ayudarte</h3>
                                <ul class="fmenu">
                                    <li><a href="#">Nosotros</a></li>
                                    <li><a href="/catalogo">Catálogos</a></li>
                                    <li><a href="/tiendas">Tiendas</a></li>
                                    <li><a href="/contacto">Contactos</a></li>
                                    <li><a href="/blog">Blog</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-xs-12 pd-left">
                                <h3 style="margin: 0px 0px 10px 0px;">Enlaces útiles</h3>
                                <ul class="fmenu">
                                  <li><a href="#">Nosotros</a></li>
                                  <li><a href="/catalogo">Catálogos</a></li>
                                  <li><a href="/tiendas">Tiendas</a></li>
                                  <li><a href="/contacto">Contactos</a></li>
                                  <li><a href="/blog">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12" style="margin-bottom: 15px;">
                        <h3 style="margin: 0px 0px 15px 0px;">Datos de contacto</h3>
                        <div class="widget-info">
                            <ul>
                                <li><i class="fa fa-map-marker-alt fa-4" aria-hidden="true"></i>{{ $company_main->address }}</li>
                                <li class="clearfix"></li>
                                <li><i class="fa fa-phone fa-4" aria-hidden="true"></i>
                                    <p class="title-contain">{{ $company_main->phone }}</p>
                                </li>
                                <li class="clearfix"></li>
                                <li><i class="fa fa-envelope fa-4" aria-hidden="true"></i>
                                    <p class="title-contain">{{ $company_main->email }}</p>
                                </li>
                                <li class="clearfix"></li>
                            </ul>
                        </div>
                       
                        <ul class="social">
                            <li><a href="{{ $company_main['facebook'] }}"><i class="fa fa-facebook fa-3" aria-hidden="true"></i></a></li>
                            <li><a href="{{ $company_main['twitter'] }}"><i class="fa fa-twitter fa-3" aria-hidden="true"></i></a></li>
                           
                            <li><a href="{{ $company_main['youtube'] }}"><i class="fa fa-youtube fa-3" aria-hidden="true"></i></a></li>
                            <!-- <li><a href="index.html#"><i class="ion-social-linkedin fa-3" aria-hidden="true"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="top-footer">
            <div class="container">
                <h1 class="heading-default">Top Categories & Brands</h1>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 block-left">
                        <div class="block-footer">
                            <h2 class="heading-primary">WHAT'S NEW</h2>
                            <p class="description-primary">
                                <a title="smartphone" href="index.html#" >Huawei P9</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Samsung S7</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Samsung S7 Edge</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Electric Unicycle</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Electric Scooter</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Foldable Bicycle</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >OnePlus X</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Ninebot Mini Pro</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Samsung Note 5</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Samsung Edge</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Samsung S6</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Phone 6S</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >iPhone 6</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Oneplus-2</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Apple Watch</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Amazon Kindle</a>
                            </p>
                        </div>
                        <div class="block-footer">
                            <h2 class="heading-primary">MOBILES & TABLETS</h2>
                            <p class="description-primary">
                                <a title="smartphone" href="index.html#" >Apple</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Asus</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >HTC</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Huawei</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Lenovo</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >LG</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Nokia X</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Oppo</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >One Plus</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Kindle</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Samsung</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Sony</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Xiaomi</a>
                            </p>
                        </div>
                        <div class="block-footer no-padding-bottom">
                            <h2 class="heading-primary">COMPUTERS & LAPTOPS</h2>
                            <p class="description-primary">
                                <a title="smartphone" href="index.html#" >Acer</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Alienware</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Asus</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Corsair</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Dell</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Lenovo</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Logitech </a>,&nbsp;
                                <a title="smartphone" href="index.html#" >MSI</a>
                                <br>
                                <a title="smartphone" href="index.html#" >Altec Lansing</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Armaggeddon</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Audio Technica</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Beats</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Belkin</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Bose</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Fitbit</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Ninteno</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 block-right">
                        <div class="block-footer">
                            <h2 class="heading-primary">CONSUMER ELECTRONIC</h2>
                            <p class="description-primary">
                                <a title="smartphone" href="index.html#" >Altec Lansing</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Armaggeddon</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Audio Technica</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Beats</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Belkin</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Bose</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Fitbit</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Nintendo</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Panasonic</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >PS4</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Sennheiser</a>
                            </p>
                        </div>
                        <div class="block-footer">
                            <h2 class="heading-primary">FASHION</h2>
                            <p class="description-primary">
                                <a title="smartphone" href="index.html#" >Birkenstock</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Coach</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Herschel</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Kate Spade</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Longchamp</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >MCM</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Rayban</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Tory Burch</a>
                                <br>
                                <a title="smartphone" href="index.html#" >Canon</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Casio</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Fujifilm</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >GoPro</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Instax</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Leica</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Nikon</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Olympus</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Panasonic</a>
                            </p>
                        </div>
                        <div class="block-footer no-padding-bottom">
                            <h2 class="heading-primary">HEALTH & BEAUTY</h2>
                            <p class="description-primary">
                                <a title="smartphone" href="index.html#" >Biotherm</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Clarins</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Dior</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Estee Lauder</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Etude House</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >GNC</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Laneige</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Lancome</a>
                                <br>
                                <a title="smartphone" href="index.html#" >L-occitane</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Shiseido</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Shu Uemura</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Skin Food</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Herschel</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Jansport</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Samsonite</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Adidas</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Aeroline</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >AIBI</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Aleoca</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Billabong</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Columbia</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Converse</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Garmin</a>,&nbsp;
                                <a title="smartphone" href="index.html#" >Nike</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
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
