@extends('miranda.layouts.index')
@section('content')
  <!-- slider section -->
  @include('miranda.home.1_slider')
  <!-- Feature section -->
  @include('miranda.home.2_feature')
  <!-- Download apps section -->
  @include('miranda.home.4_download')
  <!--Latest blog -->
  @include('miranda.home.10_blog')
  {{-- <!-- Welcome section -->
  @include('miranda.home.3_welcome')
  <!-- Services section -->
  @include('miranda.home.5_services')
  <!--Feature property section end-->
  @include('miranda.home.6_property')
  <!--Benefit section -->
  @include('miranda.home.7_benefit')
  <!--Fun fact section -->
  @include('miranda.home.8_statistics')
  <!--Team area end-->
  @include('miranda.home.9_team')
  <!--Happy client section end-->
  @include('miranda.home.11_testimonials')
  <!--Brand section -->
  @include('miranda.home.12_brand') --}}
@stop
@section('plugins-js')
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>
<script src="/miranda/js/home.js"></script>
@stop
