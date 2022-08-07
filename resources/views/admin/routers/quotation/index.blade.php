@extends('admin.layouts.index') @section('content')
<header class="c-sub-header u-bg-white">
  <div class="u-flex u-flex-1">
  </div>
</header>
<section class="row u-mx4 u-mb4 u-mt5 u-px4 u-pt5 u-bg-white" id="order-grid">
  <!-- ///// -->
  <div class="row">
      <div class="col-md-3">
          <div class="row align-items-center mb-3">
                <div class="col-md-3 col-xs-12">Ciudad:</div>
                <div class="col-md-9 col-xs-12">
                     <select name="" class="form-control" id="quotation_city">
                          <option value="">Todos</option>
                          @foreach ($cities as $city)
                              <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                          @endforeach
                      </select>
                </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="row align-items-center mb-3">
                <div class="col-md-3 col-xs-12">Cliente:</div>
                <div class="col-md-9 col-xs-12">
                    <select name="select" class="form-control" id="quotation_customer">
                      <option value="">Todos</option>
                      @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->fullname }}</option>
                      @endforeach
                      {{-- <option value="value2" selected>Value 2</option> --}}
                      {{-- <option value="value3">Value 3</option> --}}
                    </select>
                </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="row align-items-center mb-3">
                <div class="col-md-3 col-xs-12">Ejecutivo de venta:</div>
                <div class="col-md-9 col-xs-12">
                    <select name="select" class="form-control" id="quotation_salesman">
                      @if ($is_admin)
                        <option value="">Todos</option>
                      @endif

                      @foreach ($salesmen as $salesman)
                          <option value="{{ $salesman['id'] }}">{{ $salesman['first_name'] }} {{ $salesman['last_name'] }}</option>
                      @endforeach
                    </select>
                </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="input-group">
                  <input type="hidden" id="start-date">
                  <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                          <i class="fa fa-calendar"></i>&nbsp;
                          <span></span> <i class="fa fa-caret-down"></i>
                  </div>
              {{-- <input type="text" class="form-control input-daterange-datepicker" id="date-rangepicker-1"  name="daterange" placeholder="dd/mm/yyyy - dd/mm/yyyy" />
              <div class="input-group-append">
                  <span class="input-group-text" id="spanx" style="color: #fff; background-color: #28608b; border: 1px solid #28608b;"><i class="icon-calender"></i></span>
              </div> --}}
          </div>
      </div>
  </div>
  <!-- ///// -->
  <div class="col-md-12">
    <div class="table-responsive box-body">
      <table id="order-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>#</th>
                <th>Ciudad</th>
                <th>Fecha</th>
                <th>Numero</th>
                <th>Cliente</th>
                <th>Cliente apellido</th>
                <th>Ejecutivo de venta</th>
                <th>Ejecutivo de venta apellido</th>
                <th>Total</th>
                <th>Comisión</th>
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
                <td></td>
                {{-- <td>1</td>
                <td>15-1-2020</td>
                <td>0003</td>
                <td>Antonio J. Vera de Linares</td>
                <td>Jean Carlos Anchapuri</td>
                <td>S/. 440.00</td>
                <td>S/. 150.00</td>
                </td>
                    <a href="{{ URL::to('/ver-cotizacion') }}" class="btn btn-info btn-sm"><i class="far fa-eye"></i></a>
                <td> --}}
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="/js/quotations.js"></script>
@endsection
