@extends('oyeepe.layouts.index')
@section('content')
<!-- Slide Section -->
@include('oyeepe.home.1_slide')
<!-- Contenido -->
<div class="hide" id="contenidox">
  <div class="container" >
    <!-- slider -->
    <!-- Shop -->
    <section class="featured-product">
        <div class="container" id="table_data_">
          @include('oyeepe.home.2_shop')
		    </div>
	</section>
    <!-- Promotion -->
    @include('oyeepe.home.3_promotion')
  </div>
</div>

@stop
@section('pulgins-js')
<script type="text/javascript" src="/oyeepe/js/catalog.js"></script>
@stop
