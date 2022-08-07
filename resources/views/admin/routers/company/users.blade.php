<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-6 u-mb4">
      @if(in_array('nuevo-usuario', $permissions_array))
      <button type="button" class="btn btn-primary" id="user_add" data-target="#add-users" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Nuevo Usuario
      </button>
      @endif
    @if(in_array('editar-roles', $permissions_array))
    <a href="/admin/roles?role_slug={{ \App\Role::first()->name }}"><button type="button" class="btn btn-primary" >
        <i class="glyphicon glyphicon-plus u-mr2"></i>Roles
      </button></a>
      @endif

    </div>
    <div class="form-group col-md-6 col-sm-6">
     <label for="">Tipo de usuarios:</label>&nbsp;
          <select class="form-control" id="customers_only">
            <option value="1">Mis usuarios</option>
            <option value="2">Usuarios Clientes</option>
          </select>
        </div>
    <input type="hidden" id="user_edit" value={{ in_array('editar-usuario', $permissions_array) }}>
    <input type="hidden" id="user_suspend" value={{ in_array('suspender-usuario', $permissions_array) }}>
    <input type="hidden" id="user_edit-permissions" value={{ in_array('editar-permisos', $permissions_array) }}>
    <input type="hidden" id="user_change-password" value={{ in_array('cambiar-contrasena', $permissions_array) }}>
    <ul class="col-md-12" id="users_grid">

    </ul>
  </div>
</div>
