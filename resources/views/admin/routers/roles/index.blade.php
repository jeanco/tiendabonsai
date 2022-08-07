@extends('divemotor.layouts.index')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="page-wrapper">
    <div class="container-fluid">
      <!-- Additional titles -->
      <div class="row page-titles" style="padding-bottom: 0px;">
      </div>
      <!-- Page Body -->
      <div class="card">
        <div class="card-body">
          <!-- Page title -->
          <div class="row" style="padding-bottom: 0px;">
            <div class="col-1" style="margin-bottom: 0px;">
              <a href="{{URL::to('/admin/administracion/roles')}}">
                <i class="ti-angle-left"></i> Volver
              </a>
            </div>
            <div class="col-3 cuentastitulo" style="margin-bottom: 0px;">
              <h5 class="titulo1 card-title text-uppercase">Asignación de permisos</h5>
            </div>
          </div>
          <hr>
          <div class="row">
            <!-- Listado de Roles -->
            <div class="nav flex-column nav-pills col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <h4 class="card-title font-weight-bold">Roles</h4>
              @foreach($roles as $role)
              <a class="nav-link {{ ($_REQUEST['role_slug'] == $role['slug']) ? 'active' : ''}}"
              id="v-pills-{{ $role['slug'] }}-tab" data-toggle="pill" href="#v-pills-{{ $role['slug'] }}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $role['role_name'] }}</a>
              @endforeach
              <!--
              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Gerente General</a>
              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Jefe de Administración</a>
              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Secretario(a)</a>
              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Ejecutivo de Cobranza</a> -->
            </div>
            <!-- Listado de Permisos -->
            <div class="tab-content" id="v-pills-tabContent" style="margin-left: 50px;">
  <!--             <h4 class="card-title font-weight-bold">Listado de Permisos</h4>
   -->            <!-- <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"  -->
              @foreach($roles as $role)
              <div class="tab-pane fade show {{ ($_REQUEST['role_slug'] == $role['slug']) ? 'active' : ''}}" id="v-pills-{{ $role['slug']}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <h4 class="card-title font-weight-bold">Listado de Permisos para {{ $role['role_name'] }}</h4>
                <div class="panel panel-default">
                  @foreach($role['categories'] as $category)
                  <h6 class="font-weight-bold">{{ $category['category_name'] }}</h6>
                  <!-- Titulos los permisos -->
                  <div style="margin-left: 50px;">
                    @foreach($category['permissions'] as $permission)
                    <div class="checkbox">
                      <input type="checkbox" class="js-switch checkbox-permission" data-role_id={{$permission['role_id']}} data-permission_id={{$permission['permission_id']}}  data-size="small" value="" {{ ($permission['status'] == 0) ? "" : "checked"}}>
                      <label>&nbsp;&nbsp;{{ $permission['permission_name'] }}</label>
                    </div>
                    @endforeach
                  </div>
                  <hr>
                  @endforeach
                </div>
              </div>
              @endforeach
              <!--
              <div class="tab-pane fade show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="panel panel-default">
                  <h6 class="font-weight-bold">Permisos de sistema de Cobranza - Admin - Modulo de Cuentas</h6>
                  <div style="margin-left: 50px;">
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Acceder como administrador de sistema de Cobranza</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Ingresar al modulo de Cuentas</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Ver la lista de cuentas de todos los alumnos</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Registrar pagos de cuentas por alumno</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Ver historial de cuentas por alumno</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Registrar observaciones por alumno</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Asignar grupos de alumno a los ejecutivos de cobranza</label>
                    </div>
                  </div>
                  <hr>
                  <h6 class="font-weight-bold">Permisos de sistema de Cobranza - Admin - Modulo de Informes</h6>
                  <div style="margin-left: 50px;">
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Ingresar al modulo de Informes</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Ver informacion avance de cobros por asignacion</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Ver tabla de detalle de avance por mes</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Ver detalles de cuentas asignadas por ejecutivo de venta</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Exportar en excel el informe del avance de cobranza</label>
                    </div>
                  </div>
                  <hr>
                  <h6 class="font-weight-bold">Permisos de sistema de Cobranza - Admin - Modulo de Bonos</h6>
                  <div style="margin-left: 50px;">
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Ingresar al modulo de Bonos</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Ver listado de bonos</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Crear Bono por sede</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Editar información de Bono</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="" id="lalala">&nbsp;&nbsp;Eliminar Bono del registro</label>
                    </div>
                  </div>
                  <hr>
                  <h6 class="font-weight-bold">Permisos de sistema de Cobranza - Admin - Modulo de Estadística</h6>
                  <div style="margin-left: 50px;">
                    <div class="checkbox">
                      <label><input type="checkbox" class="js-switch" data-size="small" value="">&nbsp;&nbsp;Ingresar al modulo de Estadística</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

@section('plugins-css')

@stop
@section('plugins-js')
<script src="/admin/dist/node_modules/icheck/icheck.min.js"></script>
<script src="/admin/panel/js/permission_role.js"></script>
@stop
