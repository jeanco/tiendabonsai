@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-origin: content-box;background-image:url( {{ isset( $gallery_company[8]->resource) ? $gallery_company[8]->resource:  ''  }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Confirmar Orden</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row END -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                  <a href="{{ URL::to('orden') }}" class="btn btn-block">01. Carrito de Compras</a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href="{{ URL::to('/orden-info') }}" class="btn btn-block">02. Confirmar</a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href="javascript:void(0);" class="btn site-button btn-block">03. Orden Completada</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="page-notfound text-center">
                      <form method="post">
                          <img src="/images/success.png" alt="" width="120">
                          <h5 class="m-b20 text-info text-uppercase">Pedido Realizado</h5>
                          <a href="{{ URL::to('/repuestos') }}" class="site-button-secondry button-lg"><span>Volver a Repuestos</span></a>
                      </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
