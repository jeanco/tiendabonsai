<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-12 u-mb4">
      @if(in_array('nuevo-categoria-de-empresa', $permissions_array))
      <button type="button" class="btn btn-primary" id="company-category__add" data-target="#new-company-category" data-toggle="modal">
      <i class="glyphicon glyphicon-plus u-mr2"></i>Nuevo Categoria de Empresa
      </button>
      @endif
    </div>

    <input type="hidden" id="company-category_edit" value={{ in_array('editar-categoria-de-empresa', $permissions_array) }}>
    <input type="hidden" id="company-category_delete" value={{ in_array('eliminar-categoria-de-empresa', $permissions_array) }}>

    <div class="col-md-12">
      <div class="table-responsive box-body">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="setting_company-categories-tbody">
            <tr>
              <td>Color</td>
              <!-- <td>Colores exclusivo de nuestra empresa para los productos.</td> -->
              <td><span style="color: #009400;"><b>Publicado</b></sapn></td>
              <td>
                <button data-index="2" class="btn btn-success btn-sm" title="Editar Tienda" data-target="#new-company-category" data-toggle="modal">
                <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
                </button>
                <button data-index="2" class="btn btn-danger btn-sm" title="Eliminar Tienda">
                <i class="glyphicon glyphicon-trash notPointerEvent"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Tamaño</td>
              <td>Define la dimension de nuestros productos.</td>
              <td><span style="color: #009400;"><b>Publicado</b></sapn></td>
              <td>
                <button data-index="2" class="btn btn-success btn-sm" title="Editar Tienda" data-target="#new-company-category" data-toggle="modal">
                <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
                </button>
                <button data-index="2" class="btn btn-danger btn-sm" title="Eliminar Tienda">
                <i class="glyphicon glyphicon-trash notPointerEvent"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Certificado</td>
              <td>Categoriza la certificacion de nuestros productos.</td>
              <td><span><b>No Publicado</b></sapn></td>
              <td>
                <button data-index="2" class="btn btn-success btn-sm" title="Editar Tienda" data-target="#new-company-category" data-toggle="modal">
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