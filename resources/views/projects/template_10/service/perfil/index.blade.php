@extends('template_10.layouts.index')
@section('content')
<main class="font-template">

  <div class="bg_white py-2">
    <div class="container">
      <div class="page_header" style="padding-bottom: 20px; padding-top: 25px;">
        <div class="breadcrumbs">
          <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/servicios">Servicios</a></li>
          </ul>
        </div>
        
      </div>

      <div class="row justify-content-center">
      	 <div class="col-md-12" style="padding-bottom: 20px;">
          <h3 class="text-center">{{ isset( $galleries_perfil[0]->title) ? $galleries_perfil[0]->title:  ''  }}</h3>
          <p class="portfolio-item__desc" style="text-align: center;" >{!! $galleries_perfil[0]->summary!!}</p>
          <p class="text__block-desc" style="text-align: center;">{!! $galleries_perfil[0]->description !!}
        </div>
        <div class="col-md-12">
        	@if(count($galleries_perfil[0]->photos)>0)
<section class="blog-grid pb-50">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-40">
              <h5 class="">Más Imágenes</h5>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
          <div class="row" style="text-align: center;">
          <!-- Blog Item #1 -->
          @foreach($galleries_perfil[0]->photos as $key => $value)
          <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="post-item">
              <div class="post-item__img" style="padding-bottom: 10px;">
           
                  <img src="{{ isset( $value->resource) ? $value->resource:  ''  }}" alt="blog image" width="300px">
              
              </div><!-- /.blog-img -->
             
            </div><!-- /.post-item -->
          </div><!-- /.col-lg-4 -->
          @endforeach
          <!-- Blog Item #3 -->
         
        </div><!-- /.row -->
        <div class="col-md-12 text-center" style="padding-top: 50px; padding-bottom: 30px;">
          <div class="btn_add_to_cartx" ><a href="{{ $company_main->whatsapp }} sobre {{$galleries_perfil[0]->title}} " target="_blank" class="btn_1"  style="background: #33ca04 !important; width: 100%; margin: 10px 0 10px 0; display: inline;    padding: 10px 18px;">Contactar por Whatsapp</a></div>
          
        </div>
        </div><!-- /.row -->
        
      </div><!-- /.container -->
    </section>
@endif
        </div>
        

      </div>

    </div>
  </div>
  
 
</main>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
