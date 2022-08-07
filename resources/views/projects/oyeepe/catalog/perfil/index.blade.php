@extends('oyeepe.layouts.index')
@section('content')

<!-- Slide Section -->
{{--@include('oyeepe.home.1_slide')--}}

<!-- Contenido -->
<div class="content-margin">
  <input type="hidden" name="" id="company_id" value={{ $product['company']['id'] }}>

  <!-- Slogan company -->
  @include('oyeepe.catalog.perfil.1_company')
  <!-- Product -->
  <div class="row" style="margin: 0px 15px;">
    @include('oyeepe.catalog.perfil.2_product')
  </div>
  <!-- Content & Etiquetas -->
  @include('oyeepe.catalog.perfil.3_content')
  <!-- Relation products -->
  @include('oyeepe.catalog.perfil.4_related_products')
</div>

@stop
@section('pulgins-js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>
<script src="/website/js/location.js"></script>
<script src="/oyeepe/js/catalog.perfil.js"></script>
@stop
