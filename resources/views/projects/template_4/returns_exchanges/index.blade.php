@extends('template_4.layouts.index')
@section('content')
<main class="">

  <div class="bg_white py-5">
    <div class="container">
      {{--<div class="font-weight-bold mb-4 " style="color: var(--main-bg-color-primario); font-size: 20px; ">{{ isset( $services[3]->name) ? $services[3]->name:  ''  }}</div>--}}
      <div class="row justify-content-center">

       	@if($services[3]->image)
      	 <div class="col-md-7">
          <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
            {!! isset( $services[3]->description) ? $services[3]->description:  ''  !!}
          </div>
        </div>
        <div class="col-md-5 text-center">
          <img src="{{ isset( $services[3]->image) ? $services[3]->image:  ''  }}" style="width: 100%;">
        </div>
      	@else
      	<div class="col-md-12">
          <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
            {!! isset( $services[3]->description) ? $services[3]->description:  ''  !!}
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
