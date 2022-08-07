@extends('admin.layouts.index') @section('content')
<br>
<!-- Main content -->
<section class="container">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Configuración</span>
          <span class="info-box-number"><small>1 Empresa</small></span>
          <a href="{{ route('company')}}"><u>Ver</u></a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fas fa-box-open"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Items</span>
          <span class="info-box-number"><small>{{ $quantity_products }}</small></span>
          <a href="{{ route('products')}}"><u>Ver</u></a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pedidos</span>
          <span class="info-box-number"><small id="quantity_orders"></small></span>
          <a href="{{ route('orders-list')}}"><u>Ver</u></a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Suscritos</span>
          <span class="info-box-number"><small id="quantity_subscriptions"></small></span>
          <a href="{{ route('subscriptions')}}"><u>Ver</u></a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Resumen de Ventas</h3>
          <div class="box-tools pull-right" style="display: flex; align-items: center;">
            <span>Periodo:&nbsp;</span>
            <input type="text" value="" class="daterange-form form-control" id="myrange_date"  />
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <!-- <p class="text-center">
                <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
              </p> -->

              <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" style="height: 180px;"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-8">

      <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Últimos Pedidos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th width="20%">Fecha</th>
                <th width="20%">Código</th>
                <th width="20%">Cliente</th>
                <th width="10%">Items</th>
                <th width="10%">Estado</th>
                <th width="20%">Monto</th>
              </tr>
              </thead>
              <tbody>
              @foreach($orders as $i => $order)



                @php
                  $state = '<span class="label label-warning">Pendiente</span>';

                  if($order->status == 2)
                  {
                    $state = '<span class="label label-success">Confirmado</span>';
                  } 

                  if($order->status == 3)
                  {
                    $state = '<span class="label label-danger">Cancelado</span>';
                  }
                @endphp


              <tr>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d/m/Y H:i')}}</td>

                <td><a href="/pdf-pedido/{{ $order->uuid }}" target="_blank">{{ $order->code }}</a></td>
                <td>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                <td>{{ count($order->products) }}</td>
                <td>{!! $state !!}</td>
                <td>S/. {{ $order->total }}</td>
              </tr>
              @endforeach
              {{-- 
              <tr>
                <td><a href="pages/examples/invoice.html">P-0006</a></td>
                <td>Jean Carlos Anchapuri</td>
                <td>4</td>
                <td><span class="label label-danger">Cancelado</span></td>
                <td>S/. 370</td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">P-0005</a></td>
                <td>Kevin Chura</td>
                <td>1</td>
                <td>S/. 90</td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">P-0004</a></td>
                <td>Luis A. Charres</td>
                <td>5</td>
                <td><span class="label label-warning">Pendiente</span></td>
                <td>S/. 520</td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">P-0003</a></td>
                <td>Julio Ticona</td>
                <td>2</td>
                <td><span class="label label-success">Confirmado</span></td>
                <td>S/. 180</td>
              </tr>
              --}}
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a> -->
          <a href="/admin/pedidos" class="btn btn-sm btn-default btn-flat pull-right">Ver más Pedidos</a>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4">
      <!-- Info Boxes Style 2 -->
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Órdenes pendientes</span>
          <span class="info-box-number" id="pending_orders">5,200</span>

         <!--div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
                70% Increase in 30 Days
              </span-->
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Órdenes confirmadas</span>
          <span class="info-box-number" id="confirmed_orders">5,200</span>

          <!--div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
                70% Increase in 30 Days
              </span-->
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Órdenes canceladas</span>
          <span class="info-box-number" id="canceled_orders">114,381</span>

          <!--div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
                70% Increase in 30 Days
              </span-->
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <!--div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Direct Messages</span>
          <span class="info-box-number">163,921</span>

          <div class="progress">
            <div class="progress-bar" style="width: 40%"></div>
          </div>
          <span class="progress-description">
                40% Increase in 30 Days
              </span>
        </div>
   
      </div-->
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('admin/adminlte/bower_components/ionicons/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/adminlte/adminlte.min.css')}}">
@endsection

@section('scripts')
<script src="{{asset('admin/adminlte/bower_components/chart/Chart.js')}}"></script>
<script src="{{asset('admin/adminlte/dashboard2.js')}}"></script>
<script type="text/javascript">

   var inicio = moment().subtract(29, 'days').format('DD/MM/YYYY');
  var fin = moment().format('DD/MM/YYYY');

  //$(".daterange-form").val(inicio);

</script>
@endsection
