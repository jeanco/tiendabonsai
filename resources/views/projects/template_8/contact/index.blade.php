@extends('template_8.layouts.index')
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url( {{ isset( $gallery_company[5]->resource) ? $gallery_company[5]->resource:  ''  }});">
    <div class="auto-container">
        <h1>Contacto</h1>
    </div>
</section>
<!--End Page Title-->
<!--Contact Form Section-->
<section class="contact-form-section">
  <div class="auto-container">
      <div class="sec-title">
          <h2>Consúltenos</h2>
            <div class="text">No dude en preguntarnos, nuestro equipo de atención al cliente siempre está listo para ayudarlo.</div>
        </div>

        <!--Contact Form-->
        <div class="contact-form">
            <form method="" action="">
                <div class="row clearfix">
                    <div class="column col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Nombre *" id="contact_name">
                            <div id="contact-name-error" class="mensaje-error text-danger"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email *" id="contact_email">
                            <div id="contact-email-error" class="mensaje-error text-danger"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Celular" id="contact_cellphone">
                            <div id="contact-cellphone-error" class="mensaje-error text-danger"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Asunto" id="contact_subject">
                            <div id="contact-subject-error" class="mensaje-error text-danger"></div>
                        </div>
                    </div>

                    <div class="column col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <textarea name="message" placeholder="Ingrese su mensaje..." id="contact_msg"></textarea>
                            <div id="contact-msg-error" class="mensaje-error text-danger"></div>
                        </div>
                    </div>
                    <div class="column btn-column col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <button class="theme-btn btn-style-one" type="button" name="submit-form" id="contact__send">Enviar</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
<!--End Contact Form Section-->
<!--Contact Detailed Section-->
<section class="contact-detailed-section">
  <div class="auto-container">
      <!--Sec Title-->
        <div class="sec-title light centered">
          <h2 class="blog_title" style="border: none;">Contáctanos</h2>
        </div>
        <div class="row clearfix">
          <!--Headquater-->
            <div class="column col-sm-6 col-xs-12">
              <div class="headquater-box">
                  <div class="inner-box">
                      <h2>Ubícanos</h2>
                        <ul class="list-style-six">
                            <li><span class="icon flaticon-maps-and-flags"></span><span class="bold">Dirección:</span>{{ $company->address }}</li>
                            <li><span class="icon flaticon-telephone"></span><span class="bold">Telefono:</span><br>{{ $company->phone }}</li>
                            {{--
                            <li><span class="icon flaticon-telephone"></span><span class="bold">Telefono:</span><br>(052) 412386 Anexos 247 -248</li>
                            --}}
                            <li><span class="icon flaticon-e-mail-envelope"></span><span class="bold">Correo:</span><br>{{ $company->email }}</li>
                        </ul>
                        <ul class="social-icon-four">
                            @if($company->facebook)
                                <li><a href="{{ $company->facebook }}"><span class="fa fa-facebook"></span></a></li>
                            @endif

                            @if($company->twitter)
                                <li><a href="{{ $company->twitter }}"><span class="fa fa-twitter"></span></a></li>
                            @endif

                            @if($company->youtube)
                                <li><a href="{{ $company->youtube }}"><span class="fa fa-youtube-play"></span></a></li>
                            @endif

                            @if($company->whatsapp)
                            <li><a href="{{ $company->whatsapp }}"><span class="fa fa-whatsapp"></span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!--Sales-->
            <div class="column col-sm-6 col-xs-12">
              <!--Sales Department-->
              <div class="sales-department">
                  <div class="inner-box">
                      {{--<h2 style="margin-bottom: 15px;">Asesores Comerciales</h2>
                        <div class="single-item-carousel owl-carousel owl-theme">
                          @php
                            $k = 0;
                          @endphp
                          @for($i=0;$i<$staff_sliders;$i++)
                          <div class="slide">
                                <div class="department-author">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="image">
                                                <img src="{{ $staff[$i+$k]['image'] }}" alt="" />
                                            </div>
                                            <h3>{{ $staff[$i+$k]['first_name'] }} {{ $staff[$i+$k]['last_name'] }}</h3>
                                            <ul>
                                                <li><span class="icon fa fa-phone"></span>{{ $staff[$i+$k]['cellphone'] }}</li>
                                                <li><span class="icon fa fa-envelope"></span>{{ $staff[$i+$k]['email'] }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $k++;
                                @endphp
                                @if(isset($staff[$i+$k]))
                                <div class="department-author">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="image">
                                                <img src="{{ $staff[$i+$k]['image'] }}" alt="" />
                                            </div>
                                            <h3>{{ $staff[$i+$k]['first_name'] }} {{ $staff[$i+$k]['last_name'] }}</h3>
                                            <ul>
                                                <li><span class="icon fa fa-phone"></span>{{ $staff[$i+$k]['cellphone'] }}</li>
                                                <li><span class="icon fa fa-envelope"></span>{{ $staff[$i+$k]['email'] }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endfor
                         
                        </div>--}}

                        <div class="map-outer">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3794.057182145427!2d-70.24471158551141!3d-18.022549686482176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915acf5fc0814e11%3A0x390e8877928574c7!2sJM%20Automotriz%20SAC!5e0!3m2!1ses!2sus!4v1598485244566!5m2!1ses!2sus"
          width="100%"
          height="350"
          frameborder="0"
          style="border:0;"
          allowfullscreen=""
          aria-hidden="false"
          tabindex="0">
        </iframe>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Contact Detailed Section-->
<!--Map Section-->
<!--section class="map-section">
   

    <div class="map-outer">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3794.057182145427!2d-70.24471158551141!3d-18.022549686482176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915acf5fc0814e11%3A0x390e8877928574c7!2sJM%20Automotriz%20SAC!5e0!3m2!1ses!2sus!4v1598485244566!5m2!1ses!2sus"
          width="100%"
          height="450"
          frameborder="0"
          style="border:0;"
          allowfullscreen=""
          aria-hidden="false"
          tabindex="0">
        </iframe>
    </div>
</section-->
<!--End Map Section-->
<!--Newsletter-->
<section class="subscribe-section">
  <div class="auto-container">
      <!--Sec Title-->
        <div class="sec-title centered">
          <h2>Suscríbete</h2>
        </div>
        <!--End Sec Title-->
        <div class="text">Suscríbete ahora y recibe toda la informacion actualizada y las novedades que traemos.</div>
        <div class="subscribe-form">
          <!--Subscribe Form-->
            <form method="" action="">
              <div class="row clearfix">
                    <div class="column col-md-9 col-sm-12 col-xs-12">
                        <div class="row clearfix">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="text" value="" placeholder="Nombre *" id="subscription_name">
                                <div class="mensaje-error text-danger" id="subscription-name-error"></div>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="email" name="email" value="" placeholder="Email *" id="subscription_email">
                                <div class="mensaje-error text-danger" id="subscription-email-error"></div>
                            </div>
                        </div>
                     </div>
                     <div class="column col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <button type="button" class="theme-btn btn-style-one" id="subscription__save">Suscríbete</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--End Subscribe Form-->

        </div>
    </div>
</section>
<!--End Newsletter-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script>
<!-- <script src="/template_8/js/gmaps.js"></script> -->
<!-- <script src="/template_8/js/map-script.js"></script> -->
<script type="text/javascript" src="/template_8/js/contact.js"></script>
<script type="text/javascript" src="/template_8/js/subscription.js"></script>

<!--End Google Map APi-->
@stop
