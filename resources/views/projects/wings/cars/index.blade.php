@extends('wings.layouts.index')
@section('content')
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-origin: content-box;background-image:url( {{ isset( $gallery_company[3]->resource) ? $gallery_company[3]->resource:  ''  }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Nuestra Flota de Vehículos</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/">Inicio</a></li>
                <li>Vehículos</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                <!-- Filtros -->
                @include('wings.cars.1_filters')
                <!-- Productos -->

                <div class="col-sm-8 col-md-8 col-lg-9" id="table_data_product">
                    @include('wings.cars.2_list')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
    <script src="/wings/js/catalog.js"></script>
@stop
