@extends('admin.layouts.index') @section('styles')
<link href="{{ URL::asset('admin/plugins/datepicker/datepicker3.css') }}" rel="stylesheet"> @endsection @section('content')
<header class="c-sub-header u-bg-white">
  <div class="u-flex u-flex-1">
    <div class="c-category__wrapper">

    <input type="date" name="name" id="order-date__" class="form-control" value="">
    </div>

    <div class="c-sub-header__search">
      <input class="" type="text" name="dates" placeholder="05/30/2020 - 05/30/2020" />
    </div>


<!--     <div class="c-sub-header__search">
      <input class="" id="order-to-search" type="text" name="search" placeholder="Buscar por nombre del cliente" />
      <i class="glyphicon glyphicon-search"></i>
    </div> -->

    <div class="c-category__wrapper">

      <select class="c-category__dropdown" id="order-select__status" name="">
        <option value="">Todos</option>
        <option value="1">Pendientes</option>
        <option value="2">Confirmados</option>
        <option value="3">Cancelados</option>
      </select>
    </div>

    <div style="padding: 10px;">
      <a href="/admin/pedidos"><button  title="Ver en formato grillas" class=" btn-info glyphicon glyphicon-th" style="width: 45px; height: 32px;"> </button></a> 
      <!--span style="padding: 15px; font-weight: bold;">Ver en grillas</span--> 
    </div>
  </div>
</header>


<a href="" class="btn btn-primary" id="order__export">Exportar</a>
{{-- <button class="btn btn-success" id="order__export"></button> --}}

<section class="row u-mx4 u-mb4 u-mt5 u-px4 u-pt5 u-bg-white" id="order-grid">
  <div class="col-md-12">
    <div class="table-responsive box-body">
      <table id="orders-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Código del pedido</th>
            <th>DNI/RUC</th>
            <th>Nombres/Razón social</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection @section('scripts')
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/orders_list.js') }}"></script>

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
