<div id="tracking-order" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <input type="hidden" name="order_id">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Seguimiento del pedido</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">
        <div style="padding: 20px 50px;">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <select class="form-control" name="shipping_status_id">
                  <option value="">Seleccion de estado</option>
                  @foreach($shipping_status as $key => $status)
                    <option value="{{ $status['id'] }}">{{ $status['name'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="description" class="form-control" placeholder="Descripción">
              </div>
            </div>
            <div class="col-md-2">
              <button type="button" name="button" class="btn btn-success" id="tracking__add">+ AGREGAR</button>
            </div>
          </div>
          <hr>
          <div class="table-responsive">
            <table class="c-table-order">
              <thead>
                <tr class="u-color-primary">
                  <th>#</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Descripción</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="tracking_tbody">
                <tr>
                  <td>1</td>
                  <td>Pendiente de envio</td>
                  <td>01 JUN 2020</td>
                  <td>Se procedio a el envio</td>
                  <td> <button type="button" name="button" class="btn btn-danger glyphicon glyphicon-remove"></button> </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
