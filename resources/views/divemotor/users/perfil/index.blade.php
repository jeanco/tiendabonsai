@extends('divemotor.layouts.index')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<br>
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="card">
            <div class="card-body">
            <center class="m-t-30">
                <img src="{{ $user->user_image }}" class="img-circle" width="150" />
                <div class="mt-4 mb-4">
                  <span class="text-left">Subir imagen: (400px x 400px)</span>
                  <input type="file" id="profile_image">
                  <input type="hidden" id="profile_image-base-64">
                </div>
                <h4 class="card-title m-t-10">{{ $user->first_name }} {{ $user->last_name }}</h4>
                <h6 class="card-subtitle" style="margin-bottom: 0px;">{{ $user->username }}</h6>
            </center>
            </div>
            <div><hr></div>
            <div class="card-body">
                <small class="text-muted">Correo Electrónico </small>
                <h6>{{ $user->email }}</h6>
                <small class="text-muted p-t-30 db">Celular</small>
                <h6>{{ $user->cel }}</h6>
                <small class="text-muted p-t-30 db">Direccion</small>
                <h6>{{ $user->address  }}</h6>
                <small class="text-muted p-t-30 db">Ciudad</small>
                <h6>{{ $user->city->name }}</h6>
                <!-- <br/>
                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button> -->
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="card">
            <div class="card-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs profile-tab" role="tablist">
                  <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#perfil" role="tab">Perfil</a> </li>
                  <!--li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#cuenta" role="tab">Cuenta</a> </li-->
              </ul>
              <!-- ======= -->
              <!-- Tab panes -->
              <div class="tab-content">
                  <!--primary tab-->
                  <div class="tab-pane active" id="perfil" role="tabpanel">
                      <form>
                          <br>
                          <div class="row align-items-center mb-3">
                              <div class="col-md-3 col-xs-12">Documento de identidad:</div>
                              <div class="col-md-9 col-xs-12">
                              <input type="hidden" id="profile_id" value="{{ $user->id }}">
                              <input type="text" class="form-control" placeholder="" value="{{ $user->username }}" disabled=disabled>
                              </div>
                          </div>
                          <div class="row align-items-center mb-3">
                              <div class="col-md-3 col-xs-12">Nombre:</div>
                              <div class="col-md-9 col-xs-12">
                                  <input type="text" class="form-control" id="profile_first-name" placeholder="" value="{{ $user->first_name }}">
                              </div>
                          </div>
                          <div class="row align-items-center mb-3">
                              <div class="col-md-3 col-xs-12">Apellidos:</div>
                              <div class="col-md-9 col-xs-12">
                                  <input type="text" class="form-control" id="profile_last-name" placeholder="" value="{{ $user->last_name }}">
                              </div>
                          </div>
                          <div class="row align-items-center mb-3">
                              <div class="col-md-3 col-xs-12">Email corporativo:</div>
                              <div class="col-md-9 col-xs-12">
                              <input type="text" class="form-control" id="profile_email" placeholder="" value="{{ $user->email }}">
                              </div>
                          </div>
                          <div class="row align-items-center mb-3">
                              <div class="col-md-3 col-xs-12">Celular:</div>
                              <div class="col-md-9 col-xs-12">
                                  <input type="text" class="form-control" id="profile_cel" placeholder="" value="{{ $user->cel }}">
                              </div>
                          </div>
                          {{-- <div class="row align-items-center mb-3">
                              <div class="col-md-3 col-xs-12">Teléfono:</div>
                              <div class="col-md-9 col-xs-12">
                                  <input type="text" class="form-control" placeholder="" value="+7983641">
                              </div>
                          </div> --}}
                          <div class="row align-items-center mb-3">
                              <div class="col-md-3 col-xs-12">Ciudad:</div>
                              <div class="col-md-9 col-xs-12">
                                  <select name="select" class="form-control" id="profile_city" disabled>
                                    @foreach ($cities as $city)
                                        @if ($city['id'] == $user->city_id)
                                        <option value="{{ $city['id'] }}" selected>{{ $city['name'] }}</option>
                                        @else
                                            <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                        @endif
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="row align-items-center mb-3">
                              <div class="col-md-3 col-xs-12">Dirección:</div>
                              <div class="col-md-9 col-xs-12">
                              <input type="text" class="form-control" id="profile_address" placeholder="" value="{{ $user['address'] }}">
                              </div>
                          </div>
                          <div class="text-right">
                              <button type="button" class="btn btn-info" id="profile__update">Actualizar</button>
                          </div>
                      </form>
                  </div>
                  <!--second tab-->
                  <!--div class="tab-pane" id="cuenta" role="tabpanel">
                      <form>
                          <br>
                          <div class="row align-items-center mb-3">
                              <div class="col-md-3 col-xs-12">Contraseña:</div>
                              <div class="col-md-9 col-xs-12">
                                  <input type="password" class="form-control" placeholder="" value="JeanCarlos">
                              </div>
                          </div>
                          <div class="row align-items-center mb-3">
                              <div class="col-md-3 col-xs-12">Repetir Contraseña:</div>
                              <div class="col-md-9 col-xs-12">
                                  <input type="password" class="form-control" placeholder="" value="JeanCarlos">
                              </div>
                          </div>
                          <div class="text-right">
                              <button type="button" class="btn btn-info">Actualizar</button>
                          </div>
                      </form>
                  </div-->
              </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@stop

@section('plugins-css')
@stop
@section('plugins-js')
    <script src="/divemotor/js/profile.js"></script>
@stop
