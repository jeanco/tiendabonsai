<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-12 u-mb4">
      @if(in_array('nueva-tienda', $permissions_array))
      <button type="button" class="btn btn-primary" id="store__add" data-target="#new-stores" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Nueva Tienda
      </button>
      @endif
    </div>

    <input type="hidden" id="store_edit" value={{ in_array('editar-tiendas', $permissions_array) }}>
    <input type="hidden" id="store_delete" value={{ in_array('eliminar-tiendas', $permissions_array) }}>

    <div class="col-md-12">
      <div class="table-responsive box-body">
        <table class="table table-striped table-bordered" id="stores-datatable" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Registrado</th>
              <th>RUC</th>
              <th>Tienda</th>
              <th>Compañía</th>
              <th>Correo</th>
              <th>Fecha de Membresía</th>
              <th>Representante</th>
              <th>Celular</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


  </div>
</div>
