<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-12 u-mb4">
      @if(in_array('nuevo-cliente', $permissions_array))
      <button type="button" class="btn btn-primary" id="customer__add" data-target="#add-customers" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Nuevo cliente
      </button>
      @endif
      @if(in_array('exportar-cliente', $permissions_array))
      <button type="button" class="btn btn-primary" id="customer__report">
        <i class="glyphicon glyphicon-duplicate u-mr2"></i>Exportar Clientes
      </button>
      @endif
    </div>

    <input type="hidden" id="customer_edit" value={{ in_array('editar-cliente', $permissions_array) }}>
    <input type="hidden" id="customer_delete" value={{ in_array('eliminar-cliente', $permissions_array) }}>

    <div class="col-md-12">
      <div class="table-responsive box-body">
        <table id="customers-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Registrado</th>
              <th>Id</th>
              <th>Documento de Identidad</th>
              <th>Nombre y Apellidos</th>
              <th>Apellidos</th>
              <th>Fecha de Nacimiento</th>
              <th>Email</th>
              <th>Celular</th>
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
            </tr>
          </tbody>
        </table>
      </div>
    </div>


  </div>
</div>
