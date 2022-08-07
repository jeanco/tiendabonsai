@extends('template_4.layouts.index')
@section('content')
<!-- Slide Section -->
<section class="contact-us font-template" style="margin-bottom: 30px;">
    <div class="container py-5">
      <div class="heading-sub mb-3">
          <h3 class="text-center">Edición de Perfil</h3>
          <div class="clearfix"></div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="nav flex-column nav-pills sm_none" role="tablist" aria-orientation="vertical">
            <a class="nav-link active data_" data-toggle="pill"  id="data_" href="#data" role="tab">Datos Generales</a>
            <!--a class="nav-link" data-toggle="pill" href="#coupons" role="tab">Mis Cupones</a-->
            <a class="nav-link orders_" data-toggle="pill"href="#orders" role="tab">Mis Pedidos</a>
            <a class="nav-link logistic_" data-toggle="pill"  href="#logistic" role="tab">Seguimiento de mi Pedido</a>
          </div>
          <div class="nav flex-column nav-pills md_none" role="tablist" aria-orientation="vertical">
            <a class="nav-link active data_" data-toggle="pill" href="#data" role="tab"><i class="fas fa-address-book fa-2x" style="margin: 0px 10px;"></i></a>
            <a class="nav-link" data-toggle="pill" href="#coupons" role="tab"><i class="fas fa-ticket-alt fa-2x" style="margin: 0px 10px;"></i></a>
            <a class="nav-link orders_" data-toggle="pill"  href="#orders" role="tab"><i class="fas fa-cart-arrow-down fa-2x" style="margin: 0px 10px;"></i></a>
            <a class="nav-link logistic_" data-toggle="pill"  href="#logistic" role="tab"><i class="fas fa-truck fa-2x" style="margin: 0px 10px;"></i></a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active data_" id="data">
              @include('template_4.users.perfil.1_data')
            </div>
            <div role="tabpanel" class="tab-pane" id="coupons">
              {{-- @include('template_4.users.perfil.2_coupons') --}}
              Codigo comentado, revisar vista
            </div>
            <div role="tabpanel" class="tab-pane orders_" id="orders">
               @include('template_4.users.perfil.3_orders')
            </div>
            <div role="tabpanel" class="tab-pane logistic_" id="logistic">
              @include('template_4.users.perfil.4_logistics')
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- ///////////// -->
<script type="text/javascript">

</script>
@stop
@section('plugins-css')
<link href="/template_4/css/error_track.css" rel="stylesheet">
@stop
@section('plugins-js')
<script src="/template_4/js/profile.js"></script>
<script src="/template_4/js/logistics.js"></script>
<script>
    $(`#profile_birthday`).datepicker({
        format: 'dd/mm/yyyy',
        language: 'es-ES',
    });
  $(".windows8").hide();

  var URLhash = window.location.hash;
if (URLhash == '#orders') {

$('.data_').removeClass('active');
 $('.orders_').addClass('active');
 $('.logistic_').removeClass('active');

}

if (URLhash == '#data') {

$('.orders_').removeClass('active');
 $('.data_').addClass('active');
 $('.logistic_').removeClass('active');

}

if (URLhash == '#logistic') {

$('.orders_').removeClass('active');
 $('.logistic_').addClass('active');
 $('.data_').removeClass('active');

}


</script>
@stop
