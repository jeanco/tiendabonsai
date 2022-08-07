<!-- The Modal -->
<div class="modal modal-left" id="transfer_inventory">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content modal_inventory_menu">

      <!-- Modal Header -->
      <div class="modal-top px-4">
        <div class="text-right">
          <button type="button" class="btn btn_close text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
        </div>
        <h3 class="modal-title text-white mb-3"><i class="fas fa-truck"></i> Traslado de Mercadería</h3>
        <div style="padding-left: 15px;">
          <div class="mb-4"><input class="form-control" type="text" placeholder="Código de barra"></div>
        </div>
      </div>

      <!-- Modal body -->
      <div class="modal-body px-4 py-2">
        <div style="padding-left: 15px;">
          <!-- /////////////////////////// -->
          <h4 style="color: #fcb600;">Bumo V</h4>
          <div class="d-flex align-items-center detail_inventory">
            <span>Talla: S </span>&emsp;
            <span>Color: </span><label class="item_color_menu mb-0" style="background: #1100ff;"></label>&nbsp;
            <span>Azul Electrico</span>
          </div>
          <div class="d-flex mb-2">
            <div class="col-4 px-1">
              <div class="form-group text-center mb-0">
                <label class="title_form_inventory mb-0" for="">Origen</label>
                <select class="form-control select_transfer_inventory" name="">
                  <option value="">Taller</option>
                </select>
              </div>
            </div>
            <div class="col-4 px-1">
              <div class="form-group text-center mb-0">
                <label class="title_form_inventory mb-0" for="">Destino</label>
                <select class="form-control select_transfer_inventory" name="">
                  <option value="">Selecione</option>
                </select>
              </div>
            </div>
            <div class="col-4 px-1">
              <div class="form-group text-center mb-0">
                <label class="title_form_inventory mb-0" for="">Cantidad (u)</label>
                <input type="number" class="form-control">
              </div>
            </div>
          </div>
          <hr style="border-color: #ddd;">
          <!-- /////////////////////////// -->
          <h4 style="color: #fcb600;">D-Chinita E</h4>
          <div class="d-flex align-items-center detail_inventory">
            <span>Talla: S </span>&emsp;
            <span>Color: </span><label class="item_color_menu mb-0" style="background: #1100ff;"></label>&nbsp;
            <span>Azul Electrico</span>
          </div>
          <div class="d-flex mb-2">
            <div class="col-4 px-1">
              <div class="form-group text-center mb-0">
                <label class="title_form_inventory mb-0" for="">Origen</label>
                <select class="form-control select_transfer_inventory" name="">
                  <option value="">Taller</option>
                </select>
              </div>
            </div>
            <div class="col-4 px-1">
              <div class="form-group text-center mb-0">
                <label class="title_form_inventory mb-0" for="">Destino</label>
                <select class="form-control select_transfer_inventory" name="">
                  <option value="">Selecione</option>
                </select>
              </div>
            </div>
            <div class="col-4 px-1">
              <div class="form-group text-center mb-0">
                <label class="title_form_inventory mb-0" for="">Cantidad (u)</label>
                <input type="number" class="form-control">
              </div>
            </div>
          </div>
          <hr style="border-color: #ddd;">
          <!-- /////////////////////////// -->
          <div class="row">
            <div class="col-8 text-right text-white font-bold">Total:</div>
            <div class="col-4 text-right text-white font-bold">0 (u)</div>
          </div>
          <hr style="border-color: #ddd;">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center py-5">
        <button type="button" class="btn px-4">Trasladar</button>
      </div>

    </div>
  </div>
</div>
