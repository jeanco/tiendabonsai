@extends('miranda.layouts.index')
@section('content')
<!--Breadcrumbs start-->
<div class="breadcrumbs overlay-black">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumbs-title text-center">
                        <h1>Sobre Nosotros</h1>
                    </div>
                    <div class="breadcrumbs-menu sm-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumbs end-->

<!--Quienes Somos section-->
<div class="welcome-haven" style="background: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 fadeInLeft wow welcome-pd" data-wow-delay="0.2s">
                <div class="welcome-title">
                    <h3 class="title-1">¿Quienes Somos?</h3>
                </div>
                <div class="welcome-content">
                    <p>{!! $company['description_company'] !!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="welcome-haven-img fadeInRight wow" data-wow-delay="0.2s">
                    <img src="{{ (isset($images[0])) ? $images[0]['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section end-->

<!--Atributos start-->
<div class="services-section bg-1" style="background: #f0f3ff; padding: 50px 0px;">
    <div class="container">
      <div class="welcome-title">
          <h3 class="title-1">Beneficios</h3>
      </div>
      <div class="welcome-services">
          <div class="row">
              @foreach($values as $g => $value)
              <div class="col-lg-6 col-md-6 col-12">
                  <div class="w-single-services">
                      <div class="services-img">
                          <img src="{{ $value['image_thumb'] }}" width="20%" alt="">
                      </div>
                      <div class="services-desc"><h6>{{ $value['title'] }}</h6></div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
    </div>
</div>
<!--section end-->

<!--PROPUESTA DE VALOR section-->
<div class="awesome-feature" style="background: #fff; padding: 50px 0px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h3>PROPUESTA DE VALOR</h3>
                    {!! $company['proposal_value'] !!}
                    <div class="mt-5"><img src="{{ (isset($images[1])) ? $images[1]['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" class="img-responsive" style="width: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--section end-->

<!-- mision vision section-->
<div class="awesome-feature" style="padding: 0px;">
  <div class="row">
    <div class="col-md-6 text-center" style="background: #41a200; padding: 50px;">
      <div class="container">
          <div class="section-title text-center">
              <h3 style="color: #fff;">MISIÓN</h3>

              <p style="color: #fff;">{!! $company['mission'] !!}</p>
          </div>
      </div>
    </div>
    <div class="col-md-6 text-center" style="background: #333333; padding: 50px;">
      <div class="container">
          <div class="section-title text-center">
              <h3  style="color: #fff;">VISIÓN</h3>

              <p  style="color: #fff;">{!! $company['vision'] !!}</p>
          </div>
      </div>
    </div>
  </div>
</div>
<!--section end-->

<!--Servicios section-->
<div class="awesome-feature" style="background: #fff;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center"><h3>Nuestros Servicios</h3></div>
            </div>
        </div>

        @if(count($services_array))
        <div class="row">
            <div class="col-12">
                <div class="awesome-feature-desc">
                    <div class="awesome-feature-img">
                        <div class="awesome-feature-img-border">
                            <div class="awesome-feature-img-inner">
                                <img src="{{ (isset($images[2])) ? $images[2]['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="awesome-feature-list">
                        <div class="col-4 left">
                            @foreach($services_array[0] as $a => $service)
                            <div class="single-awesome-feature one mb-87 wow fadeInLeft" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                <div class="s-awesome-feature-head">
                                    <div class="s-awesome-feature-title">
                                        <h6>{{ $service['name'] }}</h6>
                                    </div>
                                    <div class="s-awesome-feature-text">
                                        {!! $service['description'] !!}
                                    </div>
                                </div>
                                <div class="s-awesome-feature-icon">
                                    <!-- <i class="icofont icofont-tools-alt-2"></i> -->
                                    <img src="{{ $service['image'] }}" width="50%">

                                </div>
                            </div>
                            @endforeach
                           <!--  <div class="single-awesome-feature two mb-87 wow fadeInLeft" data-wow-delay="0.3s" data-wow-duration="1.3s">
                                <div class="s-awesome-feature-head">
                                    <div class="s-awesome-feature-title">
                                        <h6>Royal Touch Paint</h6>
                                    </div>
                                    <div class="s-awesome-feature-text">
                                        <p>Paint cost provides ar best for <br> elit, sed do eiusmod tempe</p>
                                    </div>
                                </div>
                                <div class="s-awesome-feature-icon">
                                    <i class="icofont icofont-paint-brush"></i>
                                </div>
                            </div> -->
<!--                             <div class="single-awesome-feature three wow fadeInLeft" data-wow-delay="0.3s" data-wow-duration="1.4s">
                                <div class="s-awesome-feature-head">
                                    <div class="s-awesome-feature-title">
                                        <h6>Non Stop Security</h6>
                                    </div>
                                    <div class="s-awesome-feature-text">
                                        <p>Paint cost provides ar best for <br> elit, sed do eiusmod tempe</p>
                                    </div>
                                </div>
                                <div class="s-awesome-feature-icon">
                                    <i class="zmdi zmdi-bug"></i>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-4 right">
                            @foreach($services_array[1] as $a => $service)
                            <div class="single-awesome-feature four mb-87 wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                <div class="s-awesome-feature-icon">
                                    <img src="{{ $service['image'] }}" width="30%">
                                </div>
                                <div class="s-awesome-feature-head">
                                    <div class="s-awesome-feature-title">
                                        <h6>{{ $service['name'] }}</h6>
                                    </div>
                                    <div class="s-awesome-feature-text">
                                        {!! $service['description']  !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
 <!--                            <div class="single-awesome-feature five mb-87 wow fadeInRight" data-wow-delay="0.3s" data-wow-duration="1.3s">
                                <div class="s-awesome-feature-icon">
                                    <i class="fa fa-leaf"></i>
                                </div>
                                <div class="s-awesome-feature-head">
                                    <div class="s-awesome-feature-title">
                                        <h6>Living Inside a Nature</h6>
                                    </div>
                                    <div class="s-awesome-feature-text">
                                        <p>Paint cost provides ar best for <br> elit, sed do eiusmod tempe</p>
                                    </div>
                                </div>
                            </div> -->
<!--                             <div class="single-awesome-feature six wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="1.4s">
                                <div class="s-awesome-feature-icon">
                                    <i class="icofont icofont-fix-tools"></i>
                                </div>
                                <div class="s-awesome-feature-head">
                                    <div class="s-awesome-feature-title">
                                        <h6>Luxurious Fittings</h6>
                                    </div>
                                    <div class="s-awesome-feature-text">
                                        <p>Paint cost provides ar best for <br> elit, sed do eiusmod tempe</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!--section end-->

<!--Download apps section start-->
<div class="download-apps overlay-blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12">
                <div class="download-apps-desc wow fadeInDown" data-wow-delay="0.1s">
                    <div class="download-apps-title">
                        <h3 class="title-1" style="color: #fff;">REGISTRATE</h3>
                        <h3 class="title-2" style="color: #fff;">y publica tu inmobiliario</h3>
                    </div>
                    <!-- <div class="download-apps-bottom">
                        <a href="#">PUBLICAR</a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="download-apps-caption-img f-right wow fadeUp" data-wow-duration="1.2s"
                    data-wow-delay="0.2s">
                    <img src="{{ (isset($images[3])) ? $images[3]['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!--Download apps section end-->

<!--Brand section start-->
<!-- <div class="brand-section">
    <div class="container">
      <div class="section-title text-center">
          <h3>Nuestros Asociados</h3>
      </div>
        <div class="row">
            <div class="col-12">
                <div class="brand-list owl-carousel">
                    @foreach($companies as $key => $company)
                    <div class="single-brand">
                        <a href="#"><img src="{{ $company['image_thumb'] }}" alt="">{{ $company->name_company}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--Brand section end-->
<br>
@stop
@section('plugins-js')
<script></script>
@stop
