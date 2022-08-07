@extends('template_8.layouts.index')
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url( {{ isset( $gallery_company[2]->resource) ? $gallery_company[2]->resource:  ''  }});">
    <div class="auto-container">
        <h1>Encuentra tu auto aquí</h1>
    </div>
</section>
<!--End Page Title-->
<!--Inventory Section-->
<section class="inventory-section">
    <div class="auto-container">
        <div class="row clearfix">
          @include('template_8.catalog.1_left_filters')
          <div class="column pull-right col-md-9 col-xs-12" id="table_data_product">
          	@include('template_8.catalog.2_right_catalog')
		  </div>
        </div>
    </div>
</section>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
	<script src="/template_8/js/catalog.js"></script>
@stop
