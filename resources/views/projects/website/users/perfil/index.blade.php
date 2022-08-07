@extends('website.layouts.index')
@section('content')
<!-- Slide Section -->
<section class="contact-us" style="margin-bottom: 30px;">
    <div class="container">
      <div class="heading-sub">
          <h3 class="text-center">Edición de Perfil</h3>
          <div class="clearfix"></div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <ul class="nav nav-pills brand-pills nav-stacked nav-none" role="tablist" style="background: none;">
            <li role="presentation" class="brand-nav active" style="margin: 0px;"><a href="#data" data-toggle="tab" class="btn btn-nav1 btn-block">Datos Generales</a></li>
            <li role="presentation" class="brand-nav" style="margin: 0px;"><a href="#coupons" data-toggle="tab" class="btn btn-nav1 btn-block">Mis Cupones</a></li>
            <li role="presentation" class="brand-nav" style="margin: 0px;"><a href="#orders" data-toggle="tab" class="btn btn-nav1 btn-block">Mis Pedidos</a></li>
          </ul>
          <ul class="nav nav-pills brand-pills nav-view" role="tablist">
            <li role="presentation" class="brand-nav active"><a href="#data" data-toggle="tab" class="btn btn-nav1"><i class="fas fa-address-book fa-2x" style="margin: 0px 10px;"></i></a></li>
            <li role="presentation" class="brand-nav"><a href="#coupons" data-toggle="tab" class="btn btn-nav1 btn-block"><i class="fas fa-ticket-alt fa-2x" style="margin: 0px 10px;"></i></a></li>
            <li role="presentation" class="brand-nav"><a href="#orders" data-toggle="tab" class="btn btn-nav1 btn-block"><i class="fas fa-cart-arrow-down fa-2x"  style="margin: 0px 10px;"></i></a></li>
          </ul>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="data">
              @include('website.users.perfil.1_data')
            </div>
            <div role="tabpanel" class="tab-pane" id="coupons">
              @include('website.users.perfil.2_coupons')
            </div>
            <div role="tabpanel" class="tab-pane" id="orders">
              @include('website.users.perfil.3_orders')
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- ///////////// -->

@stop
@section('pulgins-js')
<script src="/oyeepe/js/profile.js"></script>
<script type="text/javascript">
  $(".windows8").hide();
</script>
@stop
