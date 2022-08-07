<!-- Footer -->
<footer class="site-footer">
    <div class="footer-top">
         <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6 footer-col-4">
                    <div class="widget widget_about" style="">
                        <div class="logo-footer"><img src="{{ $company->logotype_white }}" alt=""></div>
                        <p class="m-tb20 text-justify">Wings es la plataforma ideal para que puedas encotrar el automovil para tu trabajo.</p>
                        <ul class="dlab-contact-info">
                            <li><i class="flaticon-placeholder"></i>Zofratacna Mz. O Lote 08 y 09 Tacna - Perú</li>
                            <li><i class="flaticon-customer-service"></i>Fono: +052 317090 Anexo Nº2380</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 footer-col-4">
                    <div class="widget widget_services" style="">
                        <h4 class="m-b15 text-uppercase">Enlaces</h4>
                        <div class="dlab-separator bg-primary"></div>
                        <ul>
                            <li><a href="/nosotros">La Empresa</a></li>
                            <li><a href="/catalogo">Vehículos</a></li>
                            <li><a href="/servicios">Servicios</a></li>
                            <li><a href="/repuestos">Repuestos</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><a href="/contacto">Contacto</a></li>
                            <li><a href="/concesionario">Concesionarios</a></li>
                        </ul>
                    </div>
                </div>
                {{--<div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
                    <div class="widget recent-posts-entry">
                        <h4 class="m-b15 text-uppercase">Novedades </h4>
                        <div class="dlab-separator bg-primary"></div>
                        <div class="widget-post-bx">

                            @foreach ($last_autos_array as $x => $auto)
                                @if ($x <= 2)
                                    <div class="widget-post clearfix">
                                            <div class="dlab-post-media"> <img src="{{ $auto['photo'] }}" alt="" width="200" height="143"> </div>
                                            <div class="dlab-post-info">
                                                <div class="dlab-post-header">
                                                <h5><a href="/productos/{{ $auto['slug'] }}" class="text-info">{{ $auto['name'] }}</a></h5>
                                                </div>
                                                <div class="dlab-post-meta">
                                                    <ul>
                                                    <li class="post-author">S/.{{ $auto['price'] }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>--}}
                <div class="col-md-4 col-sm-6 col-xs-6 footer-col-4">
                    <div class="widget " style="">
                        <h4 class="m-b15 text-uppercase">Suscribete </h4>
                        <div class="dlab-separator bg-primary"></div>
                        <p class="m-tb20 text-justify">Si quieres enterarte de las publicaciones más recientes, déjanos tu correo electrónico para enivarte el boletín.</p>
                        <form action="https://carzone.dexignlab.com/xhtml/script/mailchamp.php" method="post" class="dlab-subscribe-form dzSubscribe">
                          <div class="dzSubscribeMsg"></div>
                          <div class="input-group m-b15">
                            <input name="" required="" type="" class="form-control" id="subscription_name" placeholder="Ingrese su Nombre">
                            <div id="subscription-error-name" class="text-error"></div>
                          </div>
                          <div class="input-group m-b15">
                            <input name="dzEmail" required="required" type="email" class="form-control" id="subscription_email" placeholder="Ingrese su correo">
                            <div id="subscription-error-email" class="text-error"></div>
                          </div>
                          <div class="input-group">
                            <button name="submit" value="Submit" type="submit" class="site-button btn-block" id="subscription__save">
                              ENVIAR <i class="fa fa-angle-right font-18 m-l10"></i>
                            </button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
    <div class="clearfix">
      <ul class="full-social-icon clearfix">
        <li class="fb col-md-6 col-xs-12 m-b30">
          <a href="{{ $company['facebook'] }}" target="_blank"><i class="fab fa-facebook"></i> Visita nuestro Facebook </a>
        </li>
        <li class="tw col-md-6 col-xs-12 m-b30">
          <a href="{{ $company['twitter'] }}" target="_blank"><i class="fab fa-twitter"></i> Siguenos en Twitter </a>
        </li>
        <!-- <li class="fb col-md-3 col-sm-6 col-xs-6 m-b30">
          <a href="/wings/plugins/imagegallery/img/loading.gif#"><i class="fab fa-facebook"></i> Visita nuestro Facebook </a>
        </li>
        <li class="tw col-md-3 col-sm-6 col-xs-6 m-b30">
          <a href="/wings/plugins/imagegallery/img/loading.gif#"><i class="fab fa-twitter"></i> Siguenos en Twitter </a>
        </li>
        <li class="gplus col-md-3 col-sm-6 col-xs-6 m-b30">
          <a href="/wings/plugins/imagegallery/img/loading.gif#"><i class="fab fa-google-plus"></i> Google Plus | 78+ </a>
        </li>
        <li class="linkd col-md-3 col-sm-6 col-xs-6 m-b30">
          <a href="/wings/plugins/imagegallery/img/loading.gif#"><i class="fab fa-linkedin"></i> Linkedin | 21k </a>
        </li> -->
      </ul>
    </div>
        </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 text-left"> © Copyright 2020 Desarrollado por <span class="text-primary"> Noveltie</span> </div>
                <!-- <div class="col-md-6 col-sm-6 text-right ">
                  <a href="page-about.html"> About Us</a> |
                  <a href="page-privacy-policy.html"> Contact Us</a> |
                  <a href="page-about.html"> Privacy Policy</a>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer END-->
<!-- scroll top button -->
<button class="scroltop fa fa-chevron-up" ></button>
