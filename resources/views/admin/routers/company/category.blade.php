<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-12 u-mb4">
      @if(in_array('nueva-categoria', $permissions_array))
      <button type="button" class="btn btn-primary" id="setting-category__add" data-target="#new-category" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Nueva Categoría
      </button>
      @endif
    </div>

    <input type="hidden" id="category_edit" value={{ in_array('editar-categoria', $permissions_array) }}>
    <input type="hidden" id="category_delete" value={{ in_array('eliminar-categoria', $permissions_array) }}>

    <div class="col-md-12">
      <div class="table-responsive box-body">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="setting_categories-tbody">
            <tr>
              <td>Marca</td>
              <td><span style="color: #009400;"><b>Publicado</b></sapn></td>
              <td>
                <button data-index="2" class="btn btn-success btn-sm" title="Editar Tienda" data-target="#new-category" data-toggle="modal">
                  <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
                </button>
                <button data-index="2" class="btn btn-danger btn-sm" title="Eliminar Tienda">
                  <i class="glyphicon glyphicon-trash notPointerEvent"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Color</td>
              <td><span style="color: #009400;"><b>Publicado</b></sapn></td>
              <td>
                <button data-index="2" class="btn btn-success btn-sm" title="Editar Tienda" data-target="#new-category" data-toggle="modal">
                  <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
                </button>
                <button data-index="2" class="btn btn-danger btn-sm" title="Eliminar Tienda">
                  <i class="glyphicon glyphicon-trash notPointerEvent"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Talla</td>
              <td><span><b>No Publicado</b></span></td>
              <td>
                <button data-index="2" class="btn btn-success btn-sm" title="Editar Tienda" data-target="#new-category" data-toggle="modal">
                  <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
                </button>
                <button data-index="2" class="btn btn-danger btn-sm" title="Eliminar Tienda">
                  <i class="glyphicon glyphicon-trash notPointerEvent"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


  </div>
</div>
