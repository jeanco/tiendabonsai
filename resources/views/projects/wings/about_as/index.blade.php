@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-origin: content-box; background-image:url( {{ isset( $gallery_company[2]->resource) ? $gallery_company[2]->resource:  ''  }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Nosotros</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/">Inicio</a></li>
                <li>Nosotros</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- About Us -->
    <div class="section-full bg-white content-inner-1">
      <div class="container">
        <div class="row dzseth">
          <div class="col-md-6 col-sm-6 dis-tbl">
            <div class="dis-tbl-cell">
              <h2 class="h2 p-b20">Wings <span class="text-info"> ¿Quienes Somos?</span></h2>
              <p>{{ $company->description_company  }}</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6" >
          <img src="{{ $company->logotype }}" alt=""/>
          </div>
        </div>
      </div>
    </div>
    <!-- About Us End -->
    <!--  -->
    <div class="section-full content-inner bg-img-fix overlay-primary-dark" style="background-image: url({{ isset( $gallery_company[2]->resource) ? $gallery_company[2]->resource:  ''  }});">
        <div class="container">
            <div class="section-content">
              <div class="row">
                  <div class="col-md-6">
                      <div class="section-head text-center head-1">
                        <h3 class="h3 text-uppercase" style="color: #fff;">Nuestra Misión</h3>
                        <div class="dlab-separator bg-gray-dark"></div>
                      <p style="color: #fff;">{{ $company->mission }}</p>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="section-head text-center head-1">
                        <h3 class="h3 text-uppercase" style="color: #fff;">Nuestra Visión</h3>
                        <div class="dlab-separator bg-gray-dark"></div>
                      <p style="color: #fff;">{{ $company->vision }}</p>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
    <!--  -->
    <!-- About -->
    <div class="section-full p-t50 bg-white content-inner">
        <div class="container">
          <div class="section-head text-center head-1">
            <h3 class="h3 text-uppercase">Nuestros Beneficios</h3>
          </div>
          <div class="row">
            @foreach ($values as $key =>  $value)
      <div class="col-md-3 col-sm-6  col-xs-6">
          <div class="dlab-box-bg m-b30 box-hover" style="background-image: url()">
            <div class="icon-bx-wraper center p-lr20 p-tb30">
              <div class="text-info m-b20">
              <img src="{{ $value->image_thumb }}" alt="" style="height: 100px;">
                <!--span class="icon-cell">
                  <i class="glyph-icon flaticon-steering-wheel"></i>
                </span--> 
              </div>
              <div class="icon-content">
                <h4 class="dlab-tilte text-uppercase">{{ $value->title }}
                </h4>
                <p>{{ $value->description }}</p>
              </div>
            </div>
            <!--div class="icon-box-btn text-center">
              <a href="#" class="site-button btn-block">Leer más</a>
            </div-->
          </div>
      </div>
      @endforeach
          </div>
        </div>
    </div>
<!-- About End -->
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
