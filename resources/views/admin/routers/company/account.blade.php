<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-12 u-mb4">
      @if(in_array('anadir-cuenta', $permissions_array))
      <button type="button" class="btn btn-primary" id="account__add" data-target="#account-modal" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Añadir Cuenta
      </button>
      @endif
    </div>

    <input type="hidden" id="account_publish" value={{ in_array('publicar-cuenta', $permissions_array) }}>
    <input type="hidden" id="account_edit" value={{ in_array('editar-cuenta', $permissions_array) }}>
    <input type="hidden" id="account_delete" value={{ in_array('eliminar-cuenta', $permissions_array) }}>

    <ul class="col-md-12" id="accounts_grid">

    </ul>
  </div>
</div>
