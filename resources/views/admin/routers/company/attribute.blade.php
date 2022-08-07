<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-3 u-mb4">
      @if(in_array('nuevo-atributo', $permissions_array))
      <button type="button" class="btn btn-primary" id="attribute__add" data-target="#new-attribute" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Nuevo Atributo
      </button>
      @endif
    </div>

    <div class="col-md-3 u-mb4">
      <label>Categorías</label>
      <select class="form-control" id="attribute-category">
        <option value="">Todos</option>
        @foreach($attribute_categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>

    <input type="hidden" id="attribute_edit" value={{ in_array('editar-atributo', $permissions_array) }}>
    <input type="hidden" id="attribute_delete" value={{ in_array('eliminar-atributo', $permissions_array) }}>

    <div class="col-md-12">
      <div class="table-responsive box-body">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Categoría</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="setting_attributes-tbody">
            <tr>
              <td>Negro</td>
              <td>Color</td>
              <td><span style="color: #009400;"><b>Publicado</b></sapn></td>
              <td>
                <button data-index="2" class="btn btn-success btn-sm" title="Editar Tienda" data-target="#new-attribute" data-toggle="modal">
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
