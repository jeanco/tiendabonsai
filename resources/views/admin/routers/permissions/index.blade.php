@extends('divemotor.layouts.index')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="font-bold mt-3 mb-3" style="font-size: 24px;">Gestión de permisos</div>
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="/divemotor/assets/images/users/5.jpg" class="img-circle" width="150" />
                <h4 class="card-title m-t-10">Usuario</h4>
                <input type="hidden" id="user-index" value={{ $user_array['id'] }}>
                <h6 class="card-subtitle">{{ $user_array['username'] }}</h6>
                </center>
            </div>
            <div><hr></div>
            <div class="card-body">
                <small class="text-muted">Correo Electrónico </small>
            <h6>{{ $user_array['email'] }}</h6>
                <small class="text-muted p-t-30 db">Celular</small>
                <h6>{{ $user_array['cel'] }}</h6>
                <small class="text-muted p-t-30 db">Direccion</small>
            <h6>{{ $user_array['address'] }}</h6>
                <small class="text-muted p-t-30 db">Ciudad</small>
                <h6>{{ $user_array['city_name'] }}</h6>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
      <div style="margin-left: 50px;">
        <h4 class="card-title font-weight-bold">Listado de Permisos</h4>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#permisos" role="tab"> <span class="hidden-xs-down">Permisos Asignados</span></a> </li>
          {{-- @if(in_array('permisos-adicionales', $permissions_array)) --}}
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#adicionales" role="tab"> <span class="hidden-xs-down">Permisos Adicionales</span></a> </li>
          {{-- @endif --}}

        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="permisos" role="tabpanel">
            <div class="p-20">
              <!-- Grupos de permisos -->
              @if($there_is_categories != 0)
                @foreach($categories as $category)
                  <h6 class="font-weight-bold">{{ $category['name'] }}</h6>
                  <div style="margin-left: 50px;">
                    @foreach($category['permissions'] as $permission)
                    <div class="checkbox">
                      @if($permission['permission_user']['activated'] == 1)
                      <input type="checkbox" class="js-switch permission-user-checkbox" data-permission_id={{$permission['id']}} data-user_id={{ $permission['permission_user']['user_id'] }} data-size="small" checked="">
                      @else
                      <input type="checkbox" class="js-switch permission-user-checkbox" data-permission_id={{$permission['id']}} data-user_id={{ $permission['permission_user']['user_id'] }} data-size="small">
                      @endif
                      <label>&nbsp;&nbsp;{{ $permission['display_name'] }}</label>
                    </div>
                    @endforeach
                  </div>
                @endforeach
              @else
                <div>{{ $there_is_not_categories_text }}</div>
              @endif
            </div>
          </div>
          <div class="tab-pane" id="adicionales" role="tabpanel">
            <div class="p-20">

              @if($there_is_additional_categories != 0)

                @foreach($categories_additional as $additional)
                  <h6 class="font-weight-bold">{{ $additional['name'] }}</h6>
                  <div style="margin-left: 50px;">
                    @foreach($additional['permissions'] as $permission)
                    <div class="checkbox">
                      @if($permission['permission_user'] != null)
                        @if($permission['permission_user']['activated'] == 1)
                          <input type="checkbox" class="js-switch permission-additional-user-checkbox" data-permission_id={{$permission['id']}} data-user_id={{ $user['user_id'] }} data-size="small" checked="">
                        @else
                          <input type="checkbox" class="js-switch permission-additional-user-checkbox" data-permission_id={{$permission['id']}} data-user_id={{ $user['user_id'] }} data-size="small">
                        @endif
                      @else
                        <input type="checkbox" class="js-switch permission-additional-user-checkbox" data-permission_id={{$permission['id']}} data-user_id={{ $user['user_id'] }} data-size="small">
                      @endif
                      <label>&nbsp;&nbsp;{{ $permission['display_name'] }}</label>
                    </div>
                    @endforeach
                  </div>
                @endforeach
              @else
                <div>{{ $there_is_not_additional_categories_text }}</div>
              @endif
            </div>
          </div>
        </div>
      </div>

        {{-- <div class="card">
            <div class="card-body">
                <div class="font-bold mb-2" style="font-size: 18px;">Pemisos 1</div>
                <div class="">
                    <input id="permiso1" type="checkbox" checked class="js-switch permiso" data-color="#22567f" data-size="small" />&emsp;
                    <label for="permiso1">Peruanos por el cambio</label>
                </div>
                <div class="">
                    <input id="permiso2" type="checkbox" class="js-switch permiso" data-color="#22567f" data-size="small" />&emsp;
                    <label for="permiso2">Peruanos por el cambio</label>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@stop

@section('plugins-css')

@stop
@section('plugins-js')
<script src="/admin/panel/js/permission_user.js"></script>
<script type="text/javascript">
  $('.permiso').on('ifChecked', function(event) {
    alert("checkeardo tected");
  });

  $('.permiso').on('ifUnchecked', function(event) {
    alert("No chekeado tected");
  });
</script>
@stop
