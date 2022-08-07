@extends('divemotor.layouts.index')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="error-body text-center">
                  <h1 style="font-size: 30px; line-height: 35px;">Se ha generado <br> satisfactoriamente <br>su Cotización</h1>
                  <img src="/images/success.png" alt="" width="200"><br>
                  <a href="{{ URL::to('/dive-categorias') }}" class="btn btn-info btn-rounded m-b-10">Generar otra Cotización</a>
                  <br>
                  <a href="{{ URL::to('/ver-cotizacion') }}" class="btn btn-order btn-rounded m-b-10" style=" ">Ver e Imprimir cotización</a>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@stop

@section('plugins-css')
@stop
@section('plugins-js')
@stop
