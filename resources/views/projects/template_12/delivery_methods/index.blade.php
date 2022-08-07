@extends('template_12.layouts.index')
@section('content')
<main class="font-template">

  <div class="bg_white py-5">
    <div class="container">
      <div class="font-weight-bold text-uppercase mb-4 " style="color: var(--main-bg-color-secundario); font-size: 18px; text-align: center;">{{ isset( $services[1]->name) ? $services[1]->name:  ''  }}</div>
      <div class="row justify-content-center">
      	@if($services[1]->image)
      	 <div class="col-md-7">
          <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
            {!! isset( $services[1]->description) ? $services[1]->description:  ''  !!}
          </div>
        </div>
        <div class="col-md-5 text-center">
          <img src="{{ isset( $services[1]->image) ? $services[1]->image:  ''  }}" style="max-width: 100%;">
        </div>
      	@else
      	<div class="col-md-12">
          <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
            {!! isset( $services[1]->description) ? $services[1]->description:  ''  !!}
          </div>
        </div>
       
      	@endif
       
      </div>
    </div>
  </div>

 
</main>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
