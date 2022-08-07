@extends('yekatex.layouts.index')
@section('content')
<div class="container mt-30 mb-30">
  <div class="row">
    <div class="col-md-4 col-sm-12 text-center">
      <a href="{{ URL::to('/orden') }}" class="btn btn-order">01. Carrito de Compras</a>
    </div>
    <div class="col-md-4 col-sm-12 text-center">
      <a href="{{ URL::to('/orden/info') }}" class="btn btn-order">02. Confirmar</a>
    </div>
    <div class="col-md-4 col-sm-12 text-center">
      <a href="javascript:void(0);" class="btn btn-danger btn-block">03. Orden Completada</a>
    </div>
  </div>
</div>
<div class="checkout-area pb-100 pt-15 pb-sm-60">
    <div class="container">
      <div class="error-wrapper text-center">
          <div class="error-text">
              <h1><i class="fa fa-thumbs-o-up"></i></h1>
              <h2>¡Felicidades! Has completado el pago.</h2>
              <p>Verfique su correo, le hemos enviado el detalle de su pedido, <br> Gracias por su compra!</p>
          </div>
          <div class="error-button">
              <a href="/catalogo">Volver al Catálogo</a>
          </div>
      </div>
    </div>
</div>
@stop
@section('plugins-js')
<script></script>
@stop
