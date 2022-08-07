@extends('template_8.layouts.index')
@section('content')
<div class="p-0 bg_quot">
  <!--News Section-->
  <section class="py-5">
    <div class="auto-container">
        <!--Sec Title-->
          <div class="row clearfix">
            <!--News Block-->
            <div class="col-md-4 centered">
              <a href="/cotizar" class="select_quot">1. Seleccione un vehículo</a>
            </div>
            <!--News Block-->
            <div class="col-md-4 centered">
              <a href="/cotizar-modelo" class="select_quot">2. Introduzca su información</a>
            </div>
            <!--News Block-->
            <div class="col-md-4 quot_active centered">
              <span>3. Solicitud completada</span>
            </div>
          </div>
      </div>
  </section>
  <!--End News Section-->
  <!--News Section-->
  <section class="py-5">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="centered text_1"><i class="fa fa-check-circle fa-4x"></i></div>
        <div class="sec-title centered">
            <h2 style="border: none;">Cotización Completada</h2>
        </div>
        <div class="centered quot_complete mb-5">
            Gracias por confiar en JM Automotriz
        </div>
        <div class="centered">
          <a href="/" class="btn_1 px-5 py-3">Volver</a>
        </div>
    </div>
  </section>
  <!--End News Section-->
</div>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
