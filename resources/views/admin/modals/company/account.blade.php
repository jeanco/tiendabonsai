<div id="account-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información de la Cuenta</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div class="col-md-12 u-center u-mb3 u-color-error titulo-error" id="account-error"></div>

        {!! Form::open(array('role' => 'form','id'=>'account_form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
        <input type="hidden" id="account_method" name="_method" value="PUT" />
        <input type="hidden" id="account_id" name="" value="">
        <div class="o-wrapper u-mb4">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Forma de pago</label>
              <select name="payment_way_id" class="form-control" id="account_payment-way">

              </select>
              <div id="account-payment-way-error" class="mensaje-error"></div>
            </div>

            <div class="form-group">
              <label class="control-label">Nombre de la cuenta</label>
              <input type="text" name="name" placeholder="Nombre de la cuenta..." class="form-control" id="account_name">
              <div id="account-name-error" class="mensaje-error"></div>
            </div>

            <div class="form-group">
              <label class="control-label">Instrucciones para el cliente</label>
               <textarea class="form-control" id="account_instructions" name="instructions" rows="13" cols="40" placeholder="Instrucciones..."></textarea>

            </div>

            <div class="form-group payment-way-two">
              <label class="control-label">Titular de la cuenta</label>
              <input type="text" name="owner_name" placeholder="Nombres y apellidos..." class="form-control" id="account_owner-name">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group payment-way-two">
              <label class="control-label">Medio de pago</label>
              <select name="payment_entity_id" class="form-control" id="account_payment-entity">

              </select>
            </div>

            <div class="form-group payment-way-two">
              <label class="control-label">Información de la cuenta</label>
              <textarea name="description" placeholder="Información de la cuenta..." class="form-control" id="account_description" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group payment-way-two">
              <label class="control-label">Moneda</label>
              <select name="currency_id" class="form-control" id="account_currency">

              </select>
            </div>
            <div class="form-group payment-way-two">
              <label class="control-label">Documento de identidad</label>
              <input type="text" name="owner_document" placeholder="Documento del titular" class="form-control" id="account_owner-document">
            </div>
          </div>
        </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default" id="account__cancel">Cancelar</button>
        <button type="button" class="btn btn-success" id="account__save">Crear</button>
        <button type="button" class="btn btn-success" id="account__update">Actualizar</button>
      </div>
    </div>
  </div>
</div>
