<div class="col-md-12">
    <div class="tab-wrapper row u-px3 u-py5">
      <div class="col-md-12 u-mb4">
        @if(in_array('nuevo-catalogo', $permissions_array))
        <button type="button" class="btn btn-primary" id="catalog__add">
          <i class="glyphicon glyphicon-plus u-mr2"></i>Nuevo Catálogo
        </button>
        @endif
      </div>

      <input type="hidden" id="catalog_publish" value={{ in_array('publicar-catalogo', $permissions_array) }}>
      <input type="hidden" id="catalog_edit" value={{ in_array('editar-catalogo', $permissions_array) }}>
      <input type="hidden" id="catalog_delete" value={{ in_array('eliminar-catalogo', $permissions_array) }}>

      <ul class="col-md-12" id="catalogs_grid">


      </ul>
    </div>
  </div>
