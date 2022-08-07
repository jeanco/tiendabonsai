@extends('antofagasta.layouts.index')
@section('content')
<style type="text/css">
.property-desc-top h4.price {
    top: 40%;
}
</style>
  <!--Feature property section-->
  <div class="feature-property pt-50">
      <div class="container">
          <h3 style="font-weight: 700;">Lista de propiedades</h3><br>
          <div class="row">
            <!--List catalog section -->
            <div class="col-lg-8 col-12 order-lg-2" id="table_data_product">
              @include('antofagasta.catalog.1_list')
            </div>
            <!--Feature catalog section -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 sm-none">
              @include('antofagasta.catalog.2_feature')
            </div>
          </div>
      </div>
  </div>
  <!--Feature property section end-->
  @include('antofagasta.catalog.3_contact')
@stop
@section('css')
<link rel="stylesheet" href="/website/css/bootstrap-slider.css">
@stop
@section('plugins-js')
@stop
