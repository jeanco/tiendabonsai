@extends('template_8.layouts.index')
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url( {{ isset( $gallery_company[1]->resource) ? $gallery_company[1]->resource:  ''  }});">
    <div class="auto-container">
        <h1>Nosotros</h1>
    </div>
</section>
<!--End Page Title-->
<!--About Section-->
<section class="about-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title">
            <h2>{{ $company->name_company }}</h2>
        </div>
        <div class="row clearfix">
            <!--Content Column-->
            <div class="content-column col-md-4 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <!-- <div class="bold-text">Tenemos los productos adecuados para satisfacer sus necesidades</div> -->
                    <div class="text">
                      {{ $company->description_company }}
                      {{--
                      <p>Un nuevo episodio de emprendimiento se  consolidó al inaugurarse la tienda concesionaria de venta de vehículos JMAutomotriz   por  parte   del  grupo  empresarial Martorell, que una vez más apuesta  por  Tacna trayendo  tecnología  y  generando  puestos  de trabajo, aun  cuando  la   recesión   y   la  crisis económica  son  latentes en el mundo.<br><br>
                        La empresa pudo lograrse gracias al apoyo de sus colaboradores, aliados estratégicos y el respaldo del Grupo Gildemeister para ofrecer a los tacneños automóviles, camionetas, camiones y minibuses de primera línea.
                      </p>
                       --}}
                    </div>
                    <!-- <div class="clearfix">
                        <div class="pull-left">
                            <div class="signature"><img src="/template_8/images/resource/signature.png" alt="" /></div>
                        </div>
                        <div class="pull-right">
                            <h3>JM Automotriz,</h3>
                            <span class="designation">CEO & Founder</span>
                        </div>
                    </div> -->
                </div>
            </div>
            <!--Blocks Column-->
            <div class="blocks-column col-md-8 col-sm-12 col-xs-12">
                <div class="row clearfix">
                    <!--About Block-->
                    <div class="about-block col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="/template_8/images/resource/about-1.jpg" alt="" />
                            </div>
                            <div class="lower-box">
                                <h3><a href="#">Misión</a></h3>
                                <div class="text">{!! $company->mission !!}</div>
                            </div>
                        </div>
                    </div>

                    <!--About Block-->
                    <div class="about-block col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="/template_8/images/resource/about-2.jpg" alt="" />
                            </div>
                            <div class="lower-box">
                                <h3><a href="#">Visión</a></h3>
                                <div class="text">{!! $company->vision  !!}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--End About Section-->
<!--Advantage Section-->
<section class="advantage-section">
  <div class="auto-container">
    <div class="row clearfix">
        <!--Blocks Column-->
        <div class="blocks-column col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="sec-title light">
                <h2 class="blog_title" style="border: none;">Nuestros Valores Corporativos</h2>
            </div>
            <div class="row clearfix">
                <!--Services Block-->
                @foreach($values as $value)
                    <div class="services-block-three col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <img src="{{ $value['image_thumb'] }}" alt="" style="width: 65px;">
                            </div>
                            <h3 class="text_white">{{ $value['title'] }}</h3>
                            <div class="text mt-3" style="line-height: 1.2;">
                              {{ $value['description'] }}
                            </div>
                        </div>
                    </div>
                @endforeach

                {{--
                <div class="services-block-three col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="/images/benefits/benefit_1.png" alt="" style="width: 65px;">
                        </div>
                        <h3 class="text_white">Trabajo en equipo</h3>
                        <div class="text mt-3" style="line-height: 1.2;">
                          El trabajo en equipo se define como la unión de dos o más personas organizadas de una forma determinada, las cuales cooperan para lograr un fin común que es la ejecución de un proyecto.
                        </div>
                    </div>
                </div>
                <!--Services Block-->
                <div class="services-block-three col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="/images/benefits/benefit_2.png" alt="" style="width: 65px;">
                        </div>
                        <h3 class="text_white">Conciencia de costo</h3>
                        <div class="text mt-3" style="line-height: 1.2;">
                          Significa conocer los costos de hacer negocios dentro de su área. Ser tenaz en la búsqueda de maneras de reducir los costos sin perjudicar o sacrificar la calidad.
                        </div>
                    </div>
                </div>
                <!--Services Block-->
                <div class="services-block-three col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="/images/benefits/benefit_3.png" alt="" style="width: 65px;">
                        </div>
                        <h3 class="text_white">Respeto</h3>
                        <div class="text mt-3" style="line-height: 1.2;">
                          El respeto en el ámbito laboral crea un ambiente de seguridad y cordialidad; permite aceptar las limitaciones ajenas y reconocer sus virtudes; evita las ofensas y las ironías y no deja que la violencia o el abuso se conviertan en el medio para imponer criterios.
                        </div>
                    </div>
                </div>
                <!--Services Block-->
                <div class="services-block-three col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="/images/benefits/benefit_4.png" alt="" style="width: 65px;">
                        </div>
                        <h3 class="text_white">Voluntad</h3>
                        <div class="text mt-3" style="line-height: 1.2;">
                          se conoce a la Voluntad como la capacidad que tiene un ser humano de llevar adelante procesos de su vida de forma constante, así como al empuje de seguir a pesar de las dificultades que pueda conseguir, hasta completar su meta.
                        </div>
                    </div>
                </div>
                --}}
            </div>
        </div>
        <!--Customer Column-->
        <div class="customer-column col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="inner-box">
                <div class="upper-box">
                    <div class="icon flaticon-24-hours"></div>
                    <h3>Contáctenos</h3>
                    <div class="title">Para responder sus dudas</div>
                </div>
                <div class="lower-box">
                    {{--
                    <div class="number">(052) 412386</div>
                    <div class="text">Anexos 247 -248</div>
                    --}}
                    <div class="number">{{ $company->phone }}</div>
                    <h4>Escribanos:</h4>
                    <ul>
                        <!-- <li><span class="theme_color">Tel:</span> (+321) 123-45-678</li> -->
                        <li><span class="theme_color">Email:</span> {{ $company->email }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
<!--End Advantage Section-->
<!--Team Section-->
<section class="team-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <h2>Equipo de Profesionales</h2>
        </div>
        <div class="two-item-carousel owl-carousel owl-theme">
            <!--Team Block-->
            @foreach($staff as $person)
            <div class="team-block">
                <div class="inner-box">
                    <div class="clearfix">
                        <div class="image-column col-md-6 col-sm-6 col-xs-12">
                            <div class="image">
                                <img src="{{ $person['image'] }}" alt="" />
                                <div class="overlay-box">
                                    <ul class="social-icon-one">
                                        @if($person['facebook'])
                                        <li><a href="{{ $person['facebook'] }}"><span class="fa fa-facebook"></span></a></li>
                                        @endif

                                        @if($person['twitter'])
                                        <li><a href="{{ $person['twitter'] }}"><span class="fa fa-twitter"></span></a></li>
                                        @endif

                                        @if($person['linkedin'])
                                        <li><a href="{{ $person['linkedin'] }}"><span class="fa fa-linkedin"></span></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="content-column col-md-6 col-sm-6 col-xs-12">
                            <div class="content-inner">
                                <h3><a href="#">{{ $person['first_name'] }} {{ $person['last_name'] }}</a></h3>
                                <div class="sub-title">{{ $person['role'] }}</div>
                                <div class="text">{{ $person['description'] }}</div>
                                <ul class="list-style-three">
                                    <li><span class="icon fa fa-phone"></span>Cel: {{ $person['cellphone'] }}</li>
                                    <li><span class="icon fa fa-envelope"></span>Email: {{ $person['email'] }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!--Team Block-->
            {{--
            <div class="team-block">
                <div class="inner-box">
                    <div class="clearfix">
                        <div class="image-column col-md-6 col-sm-6 col-xs-12">
                            <div class="image">
                                <img src="/template_8/images/resource/team-2.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="social-icon-one">
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="content-column col-md-6 col-sm-6 col-xs-12">
                            <div class="content-inner">
                                <h3><a href="#">Stephen Fernando</a></h3>
                                <div class="sub-title">Hyundai Partner</div>
                                <div class="text">Actual teachings of  great explorer of the truth, the master.</div>
                                <ul class="list-style-three">
                                    <li><span class="icon fa fa-phone"></span>Cel: 900-123-4567</li>
                                    <li><span class="icon fa fa-envelope"></span>Email: Stephen@Carworld.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Team Block-->
            <div class="team-block">
                <div class="inner-box">
                    <div class="clearfix">
                        <div class="image-column col-md-6 col-sm-6 col-xs-12">
                            <div class="image">
                                <img src="/template_8/images/resource/team-1.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="social-icon-one">
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="content-column col-md-6 col-sm-6 col-xs-12">
                            <div class="content-inner">
                                <h3><a href="#">Michael Jeorge</a></h3>
                                <div class="sub-title">Asesor Comercial</div>
                                <div class="text">Explain to you how this mistaken <br> idea of denouncing pleasure.</div>
                                <ul class="list-style-three">
                                    <li><span class="icon fa fa-phone"></span>Cel: 900-789-0123</li>
                                    <li><span class="icon fa fa-envelope"></span>Email: Jeorge@Carworld.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Team Block-->
            <div class="team-block">
                <div class="inner-box">
                    <div class="clearfix">
                        <div class="image-column col-md-6 col-sm-6 col-xs-12">
                            <div class="image">
                                <img src="/template_8/images/resource/team-2.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="social-icon-one">
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="content-column col-md-6 col-sm-6 col-xs-12">
                            <div class="content-inner">
                                <h3><a href="#">Stephen Fernando</a></h3>
                                <div class="sub-title">Hyundai Partner</div>
                                <div class="text">Actual teachings of  great explorer of the truth, the master.</div>
                                <ul class="list-style-three">
                                    <li><span class="icon fa fa-phone"></span>Cel: 900-123-4567</li>
                                    <li><span class="icon fa fa-envelope"></span>Email: Stephen@Carworld.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            --}}
        </div>
    </div>
</section>
<!--End Team Section-->
<!--Client Section-->
<section class="client-section style-two" style="display: none;">
  <div class="auto-container">
      <div class="row clearfix">
          <!--Title Column-->
          <div class="title-column col-md-4 col-sm-12 col-xs-12">
              <div class="sec-title no-border">
                  <h2>Aliados Comerciales</h2>
                </div>
                <div class="style-text">Here are some of the brands that have trusted us for car performance.</div>
                <div class="text">Great explorer of the truth, the master-builder of human happiness one rejects, dislikes, or avoids sed pleasure because it is pleasure.</div>
                <a class="partners" href="#">All Partners <span class="arrow fa fa-caret-right"></span></a>
            </div>
            <!--Client Column-->
            <div class="client-column col-md-8 col-sm-12 col-xs-12">
              <div class="clients-box">
                  <div class="clearfix">

                      <!--Client Box-->
                      <div class="client-box col-md-3 col-sm-6 col-xs-12">
                          <div class="image">
                              <a href="#"><img src="/template_8/images/clients/9.png" alt="" /></a>
                            </div>
                        </div>

                        <!--Client Box-->
                      <div class="client-box col-md-3 col-sm-6 col-xs-12">
                          <div class="image">
                              <a href="#"><img src="/template_8/images/clients/10.png" alt="" /></a>
                            </div>
                        </div>

                        <!--Client Box-->
                      <div class="client-box col-md-3 col-sm-6 col-xs-12">
                          <div class="image">
                              <a href="#"><img src="/template_8/images/clients/11.png" alt="" /></a>
                            </div>
                        </div>

                        <!--Client Box-->
                      <div class="client-box col-md-3 col-sm-6 col-xs-12">
                          <div class="image">
                              <a href="#"><img src="/template_8/images/clients/12.png" alt="" /></a>
                            </div>
                        </div>

                        <!--Client Box-->
                      <div class="client-box col-md-3 col-sm-6 col-xs-12">
                          <div class="image">
                              <a href="#"><img src="/template_8/images/clients/13.png" alt="" /></a>
                            </div>
                        </div>

                        <!--Client Box-->
                      <div class="client-box col-md-3 col-sm-6 col-xs-12">
                          <div class="image">
                              <a href="#"><img src="/template_8/images/clients/14.png" alt="" /></a>
                            </div>
                        </div>

                        <!--Client Box-->
                      <div class="client-box col-md-3 col-sm-6 col-xs-12">
                          <div class="image">
                              <a href="#"><img src="/template_8/images/clients/15.png" alt="" /></a>
                            </div>
                        </div>

                        <!--Client Box-->
                      <div class="client-box col-md-3 col-sm-6 col-xs-12">
                          <div class="image">
                              <a href="#"><img src="/template_8/images/clients/16.png" alt="" /></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Client Section-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
