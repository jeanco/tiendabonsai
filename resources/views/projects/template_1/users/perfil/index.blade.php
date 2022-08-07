@extends('template_1.layouts.index')
@section('content')
<!-- Slide Section -->
<section class="contact-us font-template" style="margin-bottom: 30px;">
    <div class="container py-5">
      <div class="heading-sub mb-3">
          <h3 class="text-center">Mi Panel </h3>
          <div class="clearfix"></div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-4">
          <div class="nav perfil_column nav-pills" role="tablist">
            <a class="nav-link active" data-toggle="pill" href="#data" role="tab" title="Datos Generales">
              <i class="fas fa-user-edit icon_tab_perfil"></i>
              <span class="name_tab_perfil">Datos Generales</span>
            </a>
            <!--a class="nav-link" data-toggle="pill" href="#coupons" role="tab">Mis Cupones</a-->
            <a class="nav-link" data-toggle="pill" href="#orders" role="tab" title="Mis Pedidos">
              <i class="fas fa-cubes icon_tab_perfil"></i>
              <span class="name_tab_perfil">Mis Pedidos</span>
            </a>
            <a class="nav-link" data-toggle="pill" href="#logistic" role="tab" title="Estado de Mi Pedido">
              <i class="fas fa-shipping-fast icon_tab_perfil"></i>
              <span class="name_tab_perfil">Estado de Mi Pedido</span>
            </a>
          </div>
          <!--div class="nav flex-column nav-pills md_none" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" data-toggle="pill" href="#data" role="tab"><i class="fas fa-address-book fa-2x" style="margin: 0px 10px;"></i></a>
            <a class="nav-link" data-toggle="pill" href="#coupons" role="tab"><i class="fas fa-ticket-alt fa-2x" style="margin: 0px 10px;"></i></a>
            <a class="nav-link" data-toggle="pill" href="#orders" role="tab"><i class="fas fa-cart-arrow-down fa-2x" style="margin: 0px 10px;"></i></a>
            <a class="nav-link" data-toggle="pill" href="#logistic" role="tab"><i class="fas fa-truck fa-2x" style="margin: 0px 10px;"></i></a>
          </div-->
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="data">
              @include('template_1.users.perfil.1_data')
            </div>
            <div role="tabpanel" class="tab-pane" id="coupons">
              {{-- @include('template_1.users.perfil.2_coupons') --}}
              Codigo comentado, revisar vista
            </div>
            <div role="tabpanel" class="tab-pane" id="orders">
               @include('template_1.users.perfil.3_orders')
            </div>
            <div role="tabpanel" class="tab-pane" id="logistic">
              @include('template_1.users.perfil.4_logistics')
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
<link href="/template_1/css/error_track.css" rel="stylesheet">
@stop
@section('plugins-js')
<script src="/template_1/js/profile.js"></script>
<script src="/template_1/js/logistics.js"></script>
<script>
    $(`#profile_birthday`).datepicker({
        format: 'dd/mm/yyyy',
        language: 'es-ES',
    });
  $(".windows8").hide();
</script>
@stop
