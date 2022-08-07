<div id="price-item" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <input type="hidden" name="product_id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Edicion de Precio</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div style="padding: 20px 50px;">
          <div class="form-group">
            <label for="">Precio Sugerido S/.</label>
            <div class="input-group">
              <input type="text" name="price" class="form-control">
              <span class="input-group-addon u-mb4 u-bg-success"> S/. </span>
            </div>
            <div class="mensaje-error" id="product-item_price_error"></div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success update" id="">Actualizar</button>
      </div>
    </div>
  </div>
</div>
