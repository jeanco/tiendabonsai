<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-12 u-mb4">

      <button type="button" class="btn btn-primary" id="coupon__add" data-target="#coupon-modal" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Nuevo Cupón
      </button>

    </div>

    {{--
    <input type="hidden" id="coupon_edit" value={{ in_array('editar-cliente', $permissions_array) }}>
    <input type="hidden" id="coupon_delete" value={{ in_array('eliminar-cliente', $permissions_array) }}>
    --}}
    <div class="col-md-12">
      <div class="table-responsive box-body">
        <table id="coupons-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Registrado</th>
              <th>Id</th>
              <th>Codigo del cupon</th>
              <th>Fecha de inicio</th>
              <th>Fecha de vencimiento</th>
              <th>Gasto Min</th>
              <th>Gasto Max</th>
              <th>Límite Cantidad</th>
              <th>Monto</th>
              <th>Tipo de descuento</th>
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


  </div>
</div>


