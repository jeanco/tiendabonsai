<footer class="footer wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.5s">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <input type="hidden" value="{{$company_main->latitude}}" name="" id="home_company-latitude">
                    <input type="hidden" value="{{$company_main->longitude}}" name="" id="home_company-longitude">
                    <div class="map-area">
                        <div class="map-area">
                            <div id="home_company-map" style="width:100%;height:465px;"></div>
                        </div>
                        <!--Footer desc start-->
                        <div class="footer-desc">
                            <div class="singe-footer-newsletter">
                                <div class="footer-logo">
                                    <div class="f-logo">
                                        <a href="/"><img src="{{ $company_main->logotype_white_thumb }}" alt=""></a>
                                    </div>
                                </div>
                                <p class="text-center" style="color: #fff">Somos una plataforma que promociona tus inmobliliarios</p>
                                <div class="text-center mb-2 font-weight-bold" style="color: #fff">Suscríbete</div>
                                <div class="form-group">
                                    <input class="form-control footer-input" id="subscription_name" type="text" placeholder="Nombres y Apellidos">
                                    <div id="subscription-error-name" class="text-error"></div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control footer-input" id="subscription_email" type="text" placeholder="Correo Electronico">
                                    <div id="subscription-error-email" class="text-error"></div>
                                </div>
                                <button type="button" id="subscription__save" class="btn footer-btn btn-block font-weight-bold">ENVIAR</button>
                            </div>
                            <div class="single-footer-contact">
                              <div class="contact-head"><h2>Contáctanos</h2></div>
                              <div class="mb-5" style="color: #fff">Para mayor información escribenos o encuentranos en los siguientes datos.</div>
                              <div class="row align-items-center">
                                  <div class="col-md-2 mb-3"><img src="/miranda/img/icon/c-1.png" alt=""></div>
                                  <div class="col-md-10 mb-3" style="color: #fff">{{ $company_main->address }}</div>
                              </div>
                              <div class="row align-items-center">
                                  <div class="col-md-2 mb-3"><img src="/miranda/img/icon/c-2.png" alt=""></div>
                                  <div class="col-md-10 mb-3" style="color: #fff">{{ $company_main->cel }}</div>
                              </div>
                              <div class="row align-items-center">
                                  <div class="col-md-2 mb-3"><img src="/miranda/img/icon/c-2.png" alt=""></div>
                                  <div class="col-md-10 mb-3" style="color: #fff">{{ $company_main->phone }}</div>
                              </div>
                              <div class="row align-items-center">
                                  <div class="col-md-2 mb-3"><img src="/miranda/img/icon/c-3.png" alt=""></div>
                                  <div class="col-md-10 mb-3" style="color: #fff">{{ $company_main->email }}</div>
                              </div>
                              <a href="{{ URL::to('/contacto') }}" class="btn footer-btn btn-block font-weight-bold">ÚNETE A NOSOTROS</a>
                            </div>
                        </div>
                        <!--Footer desc end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Footer bottom start-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <div class="footer-menu">
                        <!-- <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about-us.html">About</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="blog.html">BLog </a></li>
                            <li><a href="contact.html">Contact </a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="copyright">
                        <p>Copyright <i class="fa fa-copyright"></i>
                            <script>
                            document.write(new Date().getFullYear());
                            </script> <a href="#">Noveltie</a>. Derechos Reservados.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Footer bottom end-->
</footer>
