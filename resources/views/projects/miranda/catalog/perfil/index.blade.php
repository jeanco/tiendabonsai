@extends('miranda.layouts.index')
@section('content')
<!--Breadcrumbs start-->
<div style="background: #333;">
    <div class="container">
        <div class="row align-items-center" style="height: 150px;">
            <div class="col-12 text-center">
                <h2 style="color: #fff;">Más <span style="color: #4498ff;">propiedades</span> para buscar</h2>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumbs end-->

<!--Feature property section-->
<div class="feature-property properties-list pt-5">
    <div class="container">
        <div class="row">
          <!--List catalog section -->
          @include('miranda.catalog.perfil.1_description')
          <!--Feature catalog section -->
          @include('miranda.catalog.perfil.2_feature')
        </div>
    </div>
</div>
@include('miranda.catalog.perfil.3_contact')
{{--@include('miranda.catalog.4_contact')--}}

<!--Feature property section end-->
@stop
@section('plugins-js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>
<script src="/miranda/js/product_perfil.js"></script>
<script src="/miranda/js/product_perfil_contact.js"></script>
@stop
