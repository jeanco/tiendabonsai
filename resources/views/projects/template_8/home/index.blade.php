@extends('template_8.layouts.index')
@section('content')
  <!-- Banner -->
  @include('template_8.home.1_banner')
  <!-- Brands -->
  @include('template_8.home.2_brands')
  @include('template_8.home.6_categories')
  <!-- Models -->
  @include('template_8.home.3_models')
  <!-- Promotion -->
  @include('template_8.home.4_promotion')
  <!-- Blog -->
  @include('template_8.home.5_blog')

@stop
@section('plugins-css')
@stop
@section('plugins-js')
<script type="text/javascript">
  // Brands Slider, models slider
  $(document).ready(function() {
    $('.slider_basic').owlCarousel({
      margin: 10,
      rewind: true,
      autoplay:true,
      autoplayTimeout:6000,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
          },
          500:{
              items:2,
          },
          700:{
              items:3,
          },
          900:{
              items:4,
          }
      }
    });
  });
</script>
@stop
