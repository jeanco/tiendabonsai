@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" 
    style="background-origin: content-box;background-image:url(  {{ isset( $gallery_company[5]->resource) ? $gallery_company[5]->resource:  ''  }} ) "> 

     {{--  <div class="dlab-bnr-inr overlay-black-middle" 
    style="background-image:url( {{ $gallery_company[3]->resource }} ) ">--}}

        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Repuestos</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/">Inicio</a></li>
                <li>Repuestos</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                <!-- Side bar start -->
                @include('wings.catalog.1_filters')
                <!-- Side bar END -->
                <!-- left part start -->
                <div class="col-sm-8 col-md-8 col-lg-9" id="table_data_product">
                    @include('wings.catalog.2_list')
                </div>

                <!-- left part END -->
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
    <script src="/wings/js/catalog_spare_parts.js"></script>
    <script src="/wings/js/add_to_cart.js"></script>
@stop
