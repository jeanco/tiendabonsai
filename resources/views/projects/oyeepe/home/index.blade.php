@extends('oyeepe.layouts.index')
@section('content')
<!-- Slide Section -->
@include('oyeepe.home.1_slide')

@include('oyeepe.home.slider')
<!-- Contenido -->
<div class="hide" id="contenidox" style="padding-bottom: 40px;">
  <div class="container" >
    <!-- slider -->
    {{-- @include('oyeepe.home.5_item_slider') --}}
    <!-- Shop -->
    {{--<section class="featured-product">
        <div class="container" id="table_data_">
          @include('oyeepe.home.2_shop')
		    </div>
	  </section>--}}
    <!-- Promotion -->
    @include('oyeepe.home.3_promotion')
  </div>
</div>

@stop
@section('plugins-css')
<link rel="stylesheet" href="/oyeepe/css/slider.css">
@stop
@section('pulgins-js')
<script type="text/javascript" src="/oyeepe/js/slider.js"></script>
@stop
