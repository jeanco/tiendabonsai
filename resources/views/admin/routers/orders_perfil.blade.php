@extends('admin.layouts.index')
@section('content')
<div class="container_portada">
  <div class="card">
    <div class="filter_order u-mb5">
      <a href="/admin/pedidos-grilla" class="btn btn-warning"><b>Volver</b></a>
      <h4>ORDEN OPE-6450 / Web - Tienda Tacna</h4>
      <a href="#" class="btn btn-success">Editar <b>Pedido</b></a>
      <a href="#" class="btn btn-danger">Ver <b>Pedido</b></a>
      <a href="#" class="btn btn-info">Enviar <b>Email</b></a>
    </div>
    <div class="row">
      <div class="col-md-7">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class="table_head_order">
              <tr>
                <th>Stock</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio U.</th>
                <th>Subtotal</th>
                <th>A Producir</th>
              </tr>
            </thead>
            <tbody class="table_body_order">
              <tr>
                <td class="text-center">
                  <select class="table_stock_order">
                    <option>11 u.</option>
                  </select>
                </td>
                <td class="text-center">D-Natura - AC - Azul - acero - XL</td>
                <td class="text-right">1 u.</td>
                <td class="text-right font-bold">S/. 170.00</td>
                <td class="text-right font-bold">S/. 170.00</td>
                <td class="text-right">0 u.</td>
              </tr>
              <tr>
                <td class="text-center">
                  <select class="table_stock_order">
                    <option>7 u.</option>
                  </select>
                </td>
                <td class="text-center">Casaca Adida - Deportivo - Negro - M</td>
                <td class="text-right">1 u.</td>
                <td class="text-right font-bold">S/. 120.00</td>
                <td class="text-right font-bold">S/. 120.00</td>
                <td class="text-right">0 u.</td>
              </tr>
            </tbody>
            <tfoot class="table_footer_order">
              <tr>
                <td class="text-right font-bold" colspan="2">Total:</td>
                <td class="text-right">2 u.</td>
                <td></td>
                <td class="text-right font-bold">S/. 290.00</td>
                <td class="text-right">0 u.</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="col-md-5">
        <h3><i class="fab fa-dropbox text-info u-mr2"></i>ESTADO DE LA ORDEN</h3>
        <div class="area_perfil_order">
          <div class="row">
            <div class="col-xs-4 order_local">Fecha de Pedido:</div>
            <div class="col-xs-8 order_stock">22/07/2021</div>
          </div>
          <div class="row">
            <div class="col-xs-4 order_local">Alamcen:</div>
            <div class="col-xs-8 order_local">Web - Tienda Tacna</div>
          </div>
          <div class="row">
            <div class="col-xs-4 order_local">Estado:</div>
            <div class="col-xs-8 order_local text-warning font-bold">PENDIENTE</div>
          </div>
          <div class="perfil_order_alert">
            <div class="font-light">
              Haz recibido pedido de la tienda online, negocia con el cliente para confirmar el pedido.
            </div>
            <div class="text-danger font-bold">
              !Debes verificar si hay stock disponible, recuerda que puedes solicitar traslado de una tienda o ingresar producción para abastecer almacén!
            </div>
          </div>
          <div>
            <a href="#" class="btn btn-success font-bold">CONFIRMAR</a>
            <a href="#" class="btn btn-danger font-bold">ANULAR</a>
          </div>
        </div>
        <hr>
        <h3><i class="fas fa-boxes text-info u-mr2"></i>DATOS DEL CLIENTE</h3>
        <div class="area_perfil_order">
          <div class="u-mb1"><span class="order_local">Cliente:</span>&nbsp;        <span class="order_stock">Arturo Vidal Pardo</span></div>
          <div class="u-mb1"><span class="order_local">Doc. Identidad:</span>&nbsp; <span class="order_stock">78154649</span></div>
          <div class="u-mb1"><span class="order_local">Celular:</span>&nbsp;        <span class="order_stock">948761256</span></div>
          <div class="u-mb1"><span class="order_local">Email:</span>&nbsp;          <span class="order_stock">arturovidal@gmail.com</span></div>
          <div class="u-mb1"><span class="order_local">Forma de envío:</span>&nbsp; <span class="order_stock">Envío a domicilio en Tacna</span></div>
          <div class="u-mb1"><span class="order_local">Ciudad:</span>&nbsp;         <span class="order_stock">Tacna - Perú</span></div>
          <div class="u-mb1"><span class="order_local">Dirección:</span>&nbsp;      <span class="order_stock">Av. San Martin #124</span></div>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
