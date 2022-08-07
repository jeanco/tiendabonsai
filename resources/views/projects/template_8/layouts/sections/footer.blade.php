<footer class="main-footer" style="background-image:url( {{ isset( $gallery_company[0]->resource) ? $gallery_company[0]->resource:  ''  }});">
  <div class="auto-container">
        <!--Widgets Section-->
          <div class="widgets-section">
              <div class="row clearfix">

                <!--Footer Column-->
                <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget about-widget">
                        <h2>{{ $company->name_company }}</h2>
                        <div class="text">
                          {{--
                          <p>Un nuevo episodio de emprendimiento se  consolidó al inaugurarse la tienda concesionaria de venta de vehículos JMAutomotriz   por  parte   del  grupo  empresarial Martorell, que una vez más apuesta  por  Tacna trayendo  tecnología  y  generando  puestos  de trabajo, aun  cuando  la   recesión   y   la  crisis económica  son  latentes en el mundo.
                          </p>
                          --}}
                          {!! $company->description_company !!}
                        </div>
                        <a href="/nosotros" class="theme-btn btn-style-three">Leer Más</a>
                    </div>
                </div>

                <!--Footer Column-->
                <div class="footer-column col-md-2 col-sm-6 col-xs-12">
                    <div class="footer-widget links-widget">
                        <h2>Enlaces</h2>
                        <div class="widget-content">
                            <ul class="footer-links">
                                <li><a href="/nosotros">Nosotros</a></li>
                                <li><a href="/catalogo">ShowRoom</a></li>
                                <li><a href="/servicios">Post Venta</a></li>
                                <li><a href="/blog">Noticias</a></li>
                                <li><a href="/contacto">Contacto</a></li>
                                <li><a href="/cotizar">Cotizar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Footer Column-->
                <div class="footer-column col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget links-widget">
                        <h2>Contáctenos</h2>
                        <div class="widget-content">
                          <ul class="list-style-one">
                                <li><span class="icon flaticon-maps-and-flags"></span>{{ $company->address }}</li>
                                <li><span class="icon flaticon-telephone"></span>{{ $company->phone }}</li>
                                <!-- <li><span class="icon flaticon-fax"></span>Fax: (526) 326-985-7423</li> -->
                                <li><span class="icon flaticon-web"></span>{{ $company->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Footer Column-->
                <div class="footer-column col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget offer-widget">
                      <h2>Horario de Ventas</h2>
                      <div class="text">
                        <!-- Lunes a Viernes: 08:30 am – 06:40 pm<br>Sábado : 08:30 am – 05:00 pm -->
                        {{ $company->schedule }}
                      </div>
                      <h2>Síguenos</h2>
                      <div class="widget-content">
                        <ul class="social-icon-two">
                            <li><a href="{{ $company->facebook }}"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="{{ $company->youtube }}"><span class="fa fa-youtube-play"></span></a></li>
                            <!-- <li><a href="#"><span class="fa fa-twitter"></span></a></li> -->
                            <li><a href="{{ $company->whatsapp }}"><span class="fa fa-whatsapp"></span></a></li>
                        </ul>
                      </div>
                    </div>
                </div>

              </div>
          </div>
      </div>
      <!--Footer Bottom-->
      <div class="footer-bottom">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-12">
                    <div class="copyright"><span class="text_2 font-weight-bold">© JM Automotriz.</span> Todos los derechos reservados. Desarrollado por Noveltie.</div>
                </div>
                <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                    <ul class="footer-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="index.html#">About</a></li>
                        <li><a href="index.html#">Policies</a></li>
                        <li><a href="index.html#">Buy</a></li>
                        <li><a href="index.html#">Sell</a></li>
                        <li><a href="index.html#">Contact</a></li>
                    </ul>
                </div> -->
            </div>
          </div>
      </div>
</footer>
<!--End Main Footer-->
