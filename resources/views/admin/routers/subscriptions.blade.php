@extends('admin.layouts.index') @section('content')
<header class="c-sub-header u-bg-white">
  <div class="u-flex u-flex-1">
  </div>
</header>
<section class="row u-mx4 u-mb4 u-mt5 u-px4 u-pt5 u-bg-white" id="order-grid">
  <div class="col-md-12 u-mb4" id="excel-container">
    <a href="{{ route('excel') }}" class="btn btn-primary">Exportar en Excel</a>
  </div>

  <div class="col-md-12">
    <div class="table-responsive box-body">
      <table id="subscriptions-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Código</th>
            <th>Nombres</th>
            <th>Correo</th>
            <th>Celular</th>
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
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</section>
@endsection @section('scripts')
<script type="text/javascript" src="{{ URL::asset('admin/panel/js/subscriptions.js') }}"></script>
@endsection