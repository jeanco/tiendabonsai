@extends('admin.layouts.index')
@section('content')
<div class="container_portada">
  <div class="card">

    <div class="row">
      <div class="col-md-2 form-group">
        <select class="form-control">
          <option>Pedido</option>
        </select>
      </div>
      <div class="col-md-2 form_mb">
        <input type="date" class="form-control" placeholder="Fecha">
      </div>
      <div class="col-md-3 form_mb">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Buscar">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
          </span>
        </div>
      </div>
      <div class="col-md-2 form-group">
        <select class="form-control">
          <option>Todos los estados</option>
        </select>
      </div>
      <div class="col-md-2 form-group">
        <select class="form-control">
          <option>Todas las Ciudades</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 form-group">
        <select class="form-control">
          <option>Exportar excel</option>
        </select>
      </div>
      <div class="col-md-2 form_mb">
        <a href="javascript:void(0);" class="btn btn-success">Lista de Envío</a>
      </div>
    </div>

    <div class="row u-mt3">
      <div class="col-md-3 col-sm-6 order_card_pad">
        <div class="card_order">
          <div class="type_order_row">
            <label class="text-danger">OPE-645</label>
            <label class="u-p2 text-white bg-warning">Pendiente</label>
          </div>
          <div>22/07/2021</div>
          <div class="order_local">Web - Tienda Tacna</div>
          <div class="order_stock u-mb3">1 producto</div>
          <div class="row">
            <div class="col-xs-3 order_local">Total:</div>
            <div class="col-xs-9 order_local">S/. 270.00</div>
          </div>
          <div class="row">
            <div class="col-xs-3 order_local">Cliente:</div>
            <div class="col-xs-9 order_stock">Arturo Vidal Pardo</div>
          </div>
          <div class="row">
            <div class="col-xs-3 order_local">Celular:</div>
            <div class="col-xs-9 order_stock">912476315</div>
          </div>
          <div class="row">
            <div class="col-xs-3 order_local">Región:</div>
            <div class="col-xs-9 order_stock">Chillan</div>
          </div>
          <div class="u-mt4">
            <a href="/admin/pedidos-perfil" class="btn btn_order_item"><i class="glyphicon glyphicon-eye-open"></i> Ver Órden</a>
            <a href="/admin/pedidos-perfil" class="btn btn_order_item"><i class="fas fa-truck"></i> Seguimiento</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 order_card_pad">
        <div class="card_order">
          <div class="type_order_row">
            <label class="text-danger">OPE-645</label>
            <label class="u-p2 text-white bg-success">Pendiente</label>
          </div>
          <div>22/07/2021</div>
          <div class="order_local">Web - Tienda Tacna</div>
          <div class="order_stock u-mb3">1 producto</div>
          <div class="row">
            <div class="col-xs-3 order_local">Total:</div>
            <div class="col-xs-9 order_local">S/. 270.00</div>
          </div>
          <div class="row">
            <div class="col-xs-3 order_local">Cliente:</div>
            <div class="col-xs-9 order_stock">Arturo Vidal Pardo</div>
          </div>
          <div class="row">
            <div class="col-xs-3 order_local">Celular:</div>
            <div class="col-xs-9 order_stock">912476315</div>
          </div>
          <div class="row">
            <div class="col-xs-3 order_local">Región:</div>
            <div class="col-xs-9 order_stock">Chillan</div>
          </div>
          <div class="u-mt4">
            <a href="/admin/pedidos-perfil" class="btn btn_order_item"><i class="glyphicon glyphicon-eye-open"></i> Ver Órden</a>
            <a href="/admin/pedidos-perfil" class="btn btn_order_item"><i class="glyphicon glyphicon-eye-open"></i> Ver Órden</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 order_card_pad">
        <div class="card_order">
          <div class="type_order_row">
            <label class="text-danger">OPE-645</label>
            <label class="u-p2 text-white bg-danger">Pendiente</label>
          </div>
          <div>22/07/2021</div>
          <div class="order_local">Web - Tienda Tacna</div>
          <div class="order_stock u-mb3">1 producto</div>
          <div class="row">
            <div class="col-xs-3 order_local">Total:</div>
            <div class="col-xs-9 order_local">S/. 270.00</div>
          </div>
          <div class="row">
            <div class="col-xs-3 order_local">Cliente:</div>
            <div class="col-xs-9 order_stock">Arturo Vidal Pardo</div>
          </div>
          <div class="row">
            <div class="col-xs-3 order_local">Celular:</div>
            <div class="col-xs-9 order_stock">912476315</div>
          </div>
          <div class="row">
            <div class="col-xs-3 order_local">Región:</div>
            <div class="col-xs-9 order_stock">Chillan</div>
          </div>
          <div class="u-mt4">
            <a href="/admin/pedidos-perfil" class="btn btn_order_item"><i class="glyphicon glyphicon-eye-open"></i> Ver Órden</a>
            <a href="/admin/pedidos-perfil" class="btn btn_order_item"><i class="glyphicon glyphicon-eye-open"></i> Ver Órden</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('styles')
<style type="text/css">
  .form_mb {margin-bottom: 1.5rem;}
</style>
@endsection
@section('scripts')
@endsection
