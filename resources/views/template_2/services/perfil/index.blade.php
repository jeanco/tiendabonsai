@extends('template_2.layouts.index')
@section('content')
<main class="font-template">

  <div class="bg_white py-5">
    <div class="container">
      <div class="font-weight-bold text-uppercase mb-4 " style="color: var(--main-bg-color-secundario); font-size: 18px; text-align: center;">{{ isset( $service->name) ? $service->name:  ''  }}</div>
      <div class="row justify-content-center">
        
       	@if($service->image)
      	 <div class="col-md-5">
          <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
            {!! isset( $service->description) ? $service->description:  ''  !!}
          </div>
        </div>
        <div class="col-md-7 text-center">
                  <div id="carousel-home" >
      <div class="owl-carousel owl-theme" >
        @foreach($service->images as $image)
        <div class="owl-slide cover" style="background-image: url({{ $image->resource }});" style="height:250px;">
        
        @endforeach
      </div>
      
      <div id="icon_drag_mobile"></div>
</div>
          </div>
        </div>
      	@else
      	<div class="col-md-12">
          <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
            {!! isset( $service->description) ? $service->description:  ''  !!}
          </div>
        </div>
      	@endif






        {{--@if(count($service->images))
          @foreach($service->images as $image)
            <img src="{{ $image->resource }}" width="400">
          @endforeach
        @endif--}}
      </div>
    </div>
  </div>

 
</main>
@stop
@section('plugins-css')

<style type="text/css">
  

#carousel-home .owl-carousel .owl-slide,
#carousel-home-2 .owl-carousel .owl-slide {
  height: 240px !important;
  position: relative
}

</style>
@stop
@section('plugins-js')
@stop
