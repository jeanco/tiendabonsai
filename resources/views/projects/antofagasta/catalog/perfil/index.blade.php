@extends('antofagasta.layouts.index')
@section('content')


<!--Feature property section-->
<div class="feature-property properties-list pt-5">
    <div class="container">
        <div class="row" style="margin-bottom: 50px;">
          <!--List catalog section -->
          @include('antofagasta.catalog.perfil.1_description')
          <!--Feature catalog section -->
          @include('antofagasta.catalog.perfil.2_feature')
        </div>
    </div>
</div>

@include('antofagasta.catalog.3_contact')
<!--Feature property section end-->
@stop
@section('plugins-js')
<script src="/miranda/js/product_perfil.js"></script>
<script src="/miranda/js/product_perfil_contact.js"></script>
@stop
