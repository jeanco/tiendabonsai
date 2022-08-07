@extends('admin.layouts.index')
@section('content')
<div class="container_portada">
  <div class="col-12 bg-white">
    <div class="row justify-content-center align-items-center menu_filter_inventory">
      <div class="col-md-auto text-center">
        <button type="button" class="btn filter_inventory" data-toggle="modal" data-target="#price_inventory"><i class="fas fa-dollar-sign"></i> Precio</button>
      </div>
      <div class="col-md-auto col-sm-4 text-center">
        <button type="button" class="btn filter_inventory" data-toggle="modal" data-target="#transfer_inventory"><i class="fas fa-archive"></i> Trasladar</button>
      </div>
      <div class="col-md-auto col-sm-4 text-center">
        <button type="button" class="btn filter_inventory" data-toggle="modal" data-target="#settings_inventory"><i class="fas fa-sliders-h"></i> Ajuste</button>
      </div>
      <div class="col-md-auto col-sm-4 text-center">
        <button type="button" class="btn filter_inventory" data-toggle="modal" data-target="#production_income"><i class="fas fa-download"></i> Ingreso por<br>Prduc.</button>
      </div>
      <div class="col-md-auto col-sm-4 text-center">
        <button type="button" class="btn filter_inventory" data-toggle="modal" data-target="#promotion_inventory"><i class="fas fa-tags"></i> Promociones</button>
      </div>
      <div class="col-md-auto col-sm-4 text-center">
        <button type="button" class="btn filter_inventory" disabled><i class="far fa-eye"></i> Publicar</button>
      </div>
      <div class="col-md-auto col-sm-4 text-center">
        <button type="button" class="btn filter_inventory" disabled><i class="far fa-eye-slash"></i> No Publicar</button>
      </div>
    </div>
  </div>

  <div class="bg-white col-12 mt-4 py-5">
    <div class="row">
      <div class="col-md-3 mb-3">
        <input type="text" class="form-control form-control-lg" placeholder="Buscar...">
      </div>
      <div class="col-md-2 mb-3">
        <select class="form-control form-control-lg">
          <option>Categorías</option>
        </select>
      </div>
      <div class="col-md-2 mb-3">
        <select class="form-control form-control-lg">
          <option>Colores</option>
        </select>
      </div>
      <div class="col-md-1 mb-3">
        <select class="form-control form-control-lg">
          <option>X-28</option>
        </select>
      </div>
      <div class="col-md-2 mb-3">
        <select class="form-control form-control-lg">
          <option>Exportar en Excel</option>
        </select>
      </div>
    </div>
    <div class="table-responsive mt-4">
      <table class="table table-striped">
        <thead class="inventory_thead">
          <tr>
            <th></th>
            <th>Producto</th>
            <th>Color</th>
            <th>2</th>
            <th>4</th>
            <th>6</th>
            <th>8</th>
            <th>10</th>
            <th>14</th>
            <th>XS</th>
            <th>S</th>
            <th>M</th>
            <th>L</th>
            <th>XL</th>
            <th>XXL</th>
            <th>XXXL</th>
            <th>XXXXL</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody class="inventory_tbody">
          <tr>
            <td class="border-0">
              <img src="/template_11/img/srta_market.png" alt="" class="item_img_table">
            </td>
            <td class="border-0">D Chinita-E 006DCH</td>
            <td class="td_inventory_color">
              <div class="d-flex justify-content-center">
                <a href="#" class="text-danger"><i class="fas fa-times-circle fa-lg"></i></a>
                <label class="item_color_table" style="background: #1100ff;"></label>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content font-bold">0</td>
          </tr>
          <tr>
            <td class="border-0">
              <img src="/template_11/img/srta_market.png" alt="" class="item_img_table">
            </td>
            <td class="border-0">D Chinita-E 006DCH</td>
            <td class="td_inventory_color">
              <div class="d-flex justify-content-center">
                <a href="#" class="text-danger"><i class="fas fa-times-circle fa-lg"></i></a>
                <label class="item_color_table" style="background: #1100ff;"></label>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content">
              <div class="dropdown select_item_inventory">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  0
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">0</a>
                  <a class="dropdown-item" href="#">1</a>
                  <a class="dropdown-item" href="#">2</a>
                </div>
              </div>
            </td>
            <td class="td_inventory_content font-bold">0</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@include('admin.modals.modal_price_inventory')
@include('admin.modals.modal_settings_inventory')
@include('admin.modals.modal_production_income')
@include('admin.modals.modal_transfer_inventory')
@include('admin.modals.modal_promotion_inventory')
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('admin/bootstrap-4.4/css/bootstrap.min.css') }}">
@endsection
@section('scripts')
@endsection
