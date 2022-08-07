<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-12 u-mb4">
      @if(in_array('nuevo-beneficios', $permissions_array))
      <button type="button" class="btn btn-primary" id="value__add" data-target="#value-modal" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Nuevo Beneficio
      </button>
      @endif
    </div>

    <input type="hidden" id="values_publish" value={{ in_array('publicar-beneficios', $permissions_array) }}>
    <input type="hidden" id="values_edit" value={{ in_array('editar-beneficios', $permissions_array) }}>
    <input type="hidden" id="values_delete" value={{ in_array('eliminar-beneficios', $permissions_array) }}>
    {{-- Modificar la lista de cuentas --}}
    <ul class="col-md-12" id="values_grid">

    </ul>
  </div>
</div>
