@extends('oyeepe.layouts.index')
@section('content')
<!-- Slide Section -->

<!-- Contenido -->
<div class="content-margin">
  <div class="text-center" style="font: bold 24px 'Poppins', sans-serif; margin-bottom: 20px;">Edición de Perfil</div>
  <div class="row">
    <div class="col-md-3">
      <ul class="nav nav-pills brand-pills nav-stacked nav-none" role="tablist" style="background: none;">
        <li role="presentation" class="brand-nav active" style="margin: 0px;"><a href="#data" data-toggle="tab" class="btn btn-nav1 btn-block">Datos Generales</a></li>
        <li role="presentation" class="brand-nav" style="margin: 0px;"><a href="#coupons" data-toggle="tab" class="btn btn-nav1 btn-block" id="profile_my-coupons">Mis Cupones</a></li>
        <li role="presentation" class="brand-nav" style="margin: 0px;"><a href="#orders" data-toggle="tab" class="btn btn-nav1 btn-block">Mis Pedidos</a></li>
      </ul>

      <ul class="nav nav-pills brand-pills nav-view" role="tablist">
        <li role="presentation" class="brand-nav active"><a href="#data" data-toggle="tab" class="btn btn-nav1"><i class="fas fa-address-book fa-2x" style="margin: 0px 10px;"></i></a></li>
        <li role="presentation" class="brand-nav"><a href="#coupons" data-toggle="tab" class="btn btn-nav1btn-block"><i class="fas fa-ticket-alt fa-2x" style="margin: 0px 10px;"></i></a></li>
        <li role="presentation" class="brand-nav"><a href="#orders" data-toggle="tab" class="btn btn-nav1 btn-block"><i class="fas fa-cart-arrow-down fa-2x"  style="margin: 0px 10px;"></i></a></li>
      </ul>
    </div>

    <div class="col-md-9">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="data">
          @include('oyeepe.users.perfil.1_data')
        </div>
        <div role="tabpanel" class="tab-pane" id="coupons">
          @include('oyeepe.users.perfil.2_coupons')
        </div>
        <div role="tabpanel" class="tab-pane" id="orders">
          @include('oyeepe.users.perfil.3_orders')
        </div>
      </div>
    </div>
  </div>
  <br>
</div>

@stop
@section('pulgins-js')
<script src="/oyeepe/js/profile.js"></script>
@stop
