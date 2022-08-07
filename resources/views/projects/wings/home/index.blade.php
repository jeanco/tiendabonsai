@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- Slider -->
    @include('wings.home.1_banner')
    <!-- New Car -->
   {{-- @include('wings.home.2_newcars') --}}
    <!-- For Your Quick Look -->
    @include('wings.home.4_slider')
    <!-- For Your Quick Look -->
    @include('wings.home.5_autoparts')
    <!-- Testimonial -->
    @include('wings.home.6_testimonials')
    <!-- About Us -->
    {{-- @include('wings.home.3_about') --}}
    <!-- Latest News -->
    @include('wings.home.7_blog')
    <!-- Wrapper for slides -->
    <div class="" style="    background: #0067ce;
    padding: 30px;
    text-align: center; ">
   <img src="https://dl.dropboxusercontent.com/s/hmkjfb7lv2s4d04/generamos%20confianza%20letra%20%281%29.png?dl=0" style="text-align: center;
    width: 300px;">
</div>

    {{-- @include('wings.home.8_video') --}}
    <!-- client -->
    @include('wings.home.9_client')
</div>
<!-- Content END-->
@stop
@section('plugins-css')
<style type="text/css">
.form-slide {bottom: 10%;}
</style>
@stop
@section('plugins-js')
@stop
