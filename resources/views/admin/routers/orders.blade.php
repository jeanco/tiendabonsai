@extends('admin.layouts.index') @section('styles')
<link href="{{ URL::asset('admin/plugins/datepicker/datepicker3.css') }}" rel="stylesheet"> @endsection @section('content')
<header class="c-sub-header u-bg-white">
  <div class="u-flex u-flex-1">
    <div class="c-category__wrapper" style="padding-top: 10px; padding-left: 10px;">
      <input type="date" name="name" id="order-date__" class="form-control" value="">
    </div>
    <div class="c-sub-header__search">
      <input class="" id="order-to-search" type="text" name="search" placeholder="Buscar por nombre del cliente" />
      <i class="glyphicon glyphicon-search"></i>
    </div>
    <div class="c-category__wrapper">
      <select class="c-category__dropdown" id="order-select__status" name="">
        <option value="">Todos</option>
        <option value="1">Pendientes</option>
        <option value="2">Confirmados</option>
        <option value="3">Cancelados</option>
      </select>
    </div>
    <div style="padding-top: 10px; padding-left: 10px;">
      <a href="/admin/orders/excel" class="btn btn-primary" id="order__export">Exportar</a>
    </div>
    <div  style="padding-top: 10px; padding-left: 10px;">
      <a href="/admin/pedidos-lista"><button  title="Ver en formato Lista de productos" class=" btn-info glyphicon glyphicon-th-list" style="width: 45px; height: 32px; display:none;"> </button></a>
    <!--span style="padding: 18px; font-weight: bold;">Ver en forma de lista</span-->
    </div>
  </div>
</header>

{{-- <button class="btn btn-success" id="order__export"></button> --}}

<section class="row u-mx4 u-mb4 u-mt5 u-px4 u-pt5 u-bg-white" id="order-grid">
  @foreach($orders as $key => $order)

  <div class="col-md-3 col-sm-6 order_card_pad">
    <div class="card_order">
      <div class="type_order_row">
        <a href="" class="text-danger font-bold order__see" data-order_id="{{$order['id']}}" data-target="" data-toggle="modal" style="font-size: 18px;">{{$order['code']}}</a>
        @if($order['status'] == 1)
        <label class="u-p2 text-white bg-warning">Pendiente</label>
        @endif @if($order['status'] == 2)
        <label class="u-p2 text-white bg-success">Confirmado</label>
        @endif @if($order['status'] == 3)
        <label class="u-p2 text-white bg-danger">Cancelado</label>
        @endif
      </div>
      <div>{{$order['date']}}</div>
      <div class="order_local">Web - Tienda</div>
      <div class="order_stock u-mb3">{{$order['quantity']}} productos</div>
      <div class="row">
        <div class="col-xs-3 order_local">Total:</div>
        <div class="col-xs-9 order_stock text-dark">{{$order['total']}}</div>
      </div>
      <div class="row">
        <div class="col-xs-3 order_local">Cliente:</div>
        <div class="col-xs-9 order_stock" title="{{$order['customer']['name']}}">{{$order['customer']['name']}}</div>
      </div>
      <div class="row">
        <div class="col-xs-3 order_local">Celular:</div>
        <div class="col-xs-9 order_stock" title="{{$order['customer']['cel']}}">{{$order['customer']['cel']}}</div>
      </div>
      <div class="row">
        <div class="col-xs-3 order_local">Región:</div>
        <div class="col-xs-9 order_stock"></div>
      </div>
      <div class="u-mt4">
        <!--a href="/admin/pedidos-perfil" class="btn btn_order_item"><i class="glyphicon glyphicon-eye-open"></i> Ver Órden</a-->
        <a href="" class="btn btn_order_item order__see" data-order_id="{{$order['id']}}" data-target="" data-toggle="modal"><i class="glyphicon glyphicon-eye-open"></i> Ver Órden</a>
        <a href="javascript:void(0);" data-index="{{ $order['id'] }}" class="btn btn_order_item tracking" data-toggle="modal" data-target="#tracking-order"><i class="fas fa-truck"></i> Seguimiento</a>
      </div>
    </div>
  </div>

  @endforeach
</section>
@include('admin.modals.order.tracking_order')

@endsection @section('scripts')
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/Orders/orders.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/trackings.js') }}"></script>
{{-- Date picker boostrap --}}
<script type="text/javascript" src="{{ URL::asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>


<script type="text/javascript">
  var altura = $('.c-sub-header').offset().top;
  var flag = false;
  $(window).on('scroll', function () {
    if ($(window).scrollTop() >= altura && !flag) {
      $('.c-sub-header').addClass('is-fixed');
      flag = true;

    } else if ($(window).scrollTop() < altura && flag) {
      $('.c-sub-header').removeClass('is-fixed');
      flag = false;
    }
  });

</script>
@endsection
