@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-origin: content-box;background-image:url( {{ isset( $gallery_company[4]->resource) ? $gallery_company[4]->resource:  ''  }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Servicios y Accesorios</h1>
    </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/">Inicio</a></li>
                <li>Servicios</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- About -->
<!--div class="section-full p-t50 bg-white content-inner">
        <div class="container">
    <div class="section-head text-center head-1">
      <span class="text-primary">Our Services</span>
      <h3 class="h3 text-uppercase">Car Dealer Quality Services</h3>
      <div class="dlab-separator bg-gray-dark"></div>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-6 m-b30">
        <div class="icon-bx-wraper bx-style-1 p-a30 center">
          <div class="icon-bx-sm radius bg-primary m-b20"> <a href="page-services.html#" class="icon-cell"><i class="flaticon-dashboard"></i></a> </div>
          <div class="icon-content">
            <h5 class="dlab-tilte text-uppercase">SUPER FAST</h5>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod [...]</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 m-b30">
        <div class="icon-bx-wraper bx-style-1 p-a30 center">
          <div class="icon-bx-sm radius bg-primary m-b20"> <a href="page-services.html#" class="icon-cell"><i class="flaticon-piston"></i></a> </div>
          <div class="icon-content">
            <h5 class="dlab-tilte text-uppercase">AFFORDABLE</h5>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod [...]</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 m-b30">
        <div class="icon-bx-wraper bx-style-1 p-a30 center">
          <div class="icon-bx-sm radius bg-primary m-b20"> <a href="page-services.html#" class="icon-cell"><i class="flaticon-oil"></i></a> </div>
          <div class="icon-content">
            <h5 class="dlab-tilte text-uppercase">OIL CHANGES</h5>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod [...]</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 m-b30">
        <div class="icon-bx-wraper bx-style-1 p-a30 center">
          <div class="icon-bx-sm radius bg-primary m-b20"> <a href="page-services.html#" class="icon-cell"><i class="flaticon-mechanic"></i></a> </div>
          <div class="icon-content">
            <h5 class="dlab-tilte text-uppercase">DEALERSHIP</h5>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod [...]</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 m-b30">
        <div class="icon-bx-wraper bx-style-1 p-a30 center">
          <div class="icon-bx-sm radius bg-primary m-b20"> <a href="page-services.html#" class="icon-cell"><i class="flaticon-temperature"></i></a> </div>
          <div class="icon-content">
            <h5 class="dlab-tilte text-uppercase">AIR conditioning</h5>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod [...]</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 m-b30">
        <div class="icon-bx-wraper bx-style-1 p-a30 center">
          <div class="icon-bx-sm radius bg-primary m-b20"> <a href="page-services.html#" class="icon-cell"><i class="flaticon-car-3"></i></a> </div>
          <div class="icon-content">
            <h5 class="dlab-tilte text-uppercase">transmission</h5>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod [...]</p>
          </div>
        </div>
      </div>
    </div>
        </div>
    </div-->
<!-- About End -->
<!-- Stats -->
<!--div class="section-full content-inner text-white bg-gray bg-img-fix overlay-black-middle" style="background-image: url(/wings/images/background/bg2.jpg);">
  <div class="container">
    <div class="section-content">
       <div class="row">
        <div class="col-md-3 col-sm-6 m-b30">
          <div class="counter-style-1">
            <div class="">
              <i class="icon flaticon-list"></i>
              <span class="counter">7652</span>
            </div>
            <span class="counter-text">Awards</span>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 m-b30">
          <div class="counter-style-1">
            <div class="">
              <i class="icon flaticon-mechanic"></i>
              <span class="counter">4562</span>
            </div>
            <span class="counter-text">Happy Clients</span>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 m-b30">
          <div class="counter-style-1">
            <div class="">
              <i class="icon flaticon-speech-bubble"></i>
              <span class="counter">3569</span>
            </div>
            <span class="counter-text">Questions Answered</span>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 m-b30">
          <div class="counter-style-1">
            <div class="">
              <i class="icon flaticon-steering-wheel"></i>
              <span class="counter">2089</span>
            </div>
            <span class="counter-text">Ordered's</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div-->
<!-- Stats End -->
<!-- About Us -->
<div class="section-full bg-white content-inner">
  <div class="container">
    <div class="row dzseth m-b50">
      <div class="col-md-6 col-sm-6">
      <img src="{{ ($service->image != '') ? $service->image : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="">
      </div>
      <div class="col-md-6 col-sm-6 dis-tbl">
        <div class="dis-tbl-cell">
        <h2 class="h2 p-b20">{{ $service->name }}</h2>
          {{-- <div class="p-b20 font-18"><i>Garden Lorem ipsum dolor sit amet, cons ectetur elit. ..</i></div> --}}
          {!! $service->description !!}
          <a href="/contacto"  target="_blank" class="site-button" style="text-align: center; font-size: 18px; font-weight: 700; display: flex; padding: 5px 15px; color: white; width: 175px; ">
              Contactáctanos
            </a>
          {{-- <a href="page-services.html#" class="site-button">Read More</a> --}}
        </div>
      </div>
    </div>
    <!--div class="row dzseth">
      <div class="col-md-6 col-sm-6 dis-tbl">
        <div class="dis-tbl-cell">
          <h2 class="h2 p-b20">A Car Dealer Makes you <span class="text-primary"> happy….Deeply!</span></h2>
          <div class="p-b20 font-18"><i>Garden Lorem ipsum dolor sit amet, cons ectetur elit. ..</i></div>
          <p>Garden Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus. cons ectetur elit. Garden Lorem ipsum dolor sit amet, cons ectetur elit... </p>
          <a href="page-services.html#" class="site-button">Read More</a>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <img src="/wings/images/car.png" alt="">
      </div>
    </div-->

  </div>
</div>
<!-- About Us End -->
<!-- Testimonial -->
    <div class="section-full content-inner bg-img-fix overlay-primary-dark" style="background-image: url(/wings/images/background/bg3.jpg);">
        <div class="container">
            <div class="section-head text-center head-1 text-white">
      {{-- <span>What Our Happy Clients say about us </span> --}}
      <h3 class="h3 text-uppercase">Testimonios de Nuestros Clientes</h3>
      <div class="dlab-separator bg-white"></div>
      {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p> --}}
    </div>
            <div class="section-content ">

      <div class="testimonial-center owl-carousel owl-btn-center-lr">
        @foreach ($testimonies as $testimony)
        <div class="item">
          <div class="testimonial-2 testimonial-bg style-1">
            <div class="testimonial-text">
              <p>{{ $testimony->description }}</p>
            </div>
            <div class="testimonial-detail clearfix">
              <div class="testimonial-box">
                <div class="testimonial-pic radius shadow"><img src="{{ $testimony->image }}" alt="" width="100" height="100"></div>
                <strong class="testimonial-name">{{ $testimony->full_name }}</strong>
                <span class="text-white">Cliente</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        {{-- <div class="item">
          <div class="testimonial-2 testimonial-bg style-1">
            <div class="testimonial-text">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
            <div class="testimonial-detail clearfix">
              <div class="testimonial-box">
                <div class="testimonial-pic radius shadow"><img src="/wings/images/testimonials/pic2.jpg" alt="" width="100" height="100"></div>
                <strong class="testimonial-name">John Doe</strong>
                <span class="text-white">Car Dealer</span>
              </div>
            </div>
          </div>
        </div> --}}
        {{-- <div class="item">
          <div class="testimonial-2 testimonial-bg style-1">
            <div class="testimonial-text">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
            <div class="testimonial-detail clearfix">
              <div class="testimonial-box">
                <div class="testimonial-pic radius shadow"><img src="/wings/images/testimonials/pic3.jpg" alt="" width="100" height="100"></div>
                <strong class="testimonial-name">John Doe</strong>
                <span class="text-white">Car Dealer</span>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
        </div>
    </div>
    <!-- Testimonial -->
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
