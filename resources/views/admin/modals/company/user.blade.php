<div id="add-users" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información del Usuario</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

    		<div class="col-md-12 u-mb3 u-center u-color-error titulo-error" id="user_error"></div>

      	{!! Form::open(array('id'=>'form_users','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
      		<input type="hidden" name="_method" id="user_method" value="PUT" />
      		<input type="hidden" name="user_id" id="user_id" value="">
          <div class="o-wrapper u-mb4">
            <div class="col-md-6 u-px0">
              <div class="col-md-12 form-group">
                <label class="control-label">
                  <i class="glyphicon glyphicon-camera"></i>Foto del Usuario:
                </label>
                <div class="dropzone" id="user_image-container">

					        <div class="dropzone_image"  id="user_preview-image">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" name="user_image" id="user_image" value="">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">Username: </label>
                <input class="form-control" name="username" id="user_username" placeholder="Username...">
                <div class="mensaje-error" id="user-error-username"></div>
              </div>

              <div class="form-group" id="user_password-area">
                <label class="control-label">Contraseña: </label>
                <input type="password" class="form-control" name="password" id="user_password" placeholder="Contraseña...">
                <div class="mensaje-error" id="user-error-password"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Cargo: </label>
                <select class="form-control" name="user_type" id="user_user-type">
                  @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select>
                <div class="mensaje-error" id="user-error-user_type"></div>
              </div>
             </div>

            <div class="col-md-6">

              <div class="form-group">
                <label class="control-label">Nombres: </label>
                <input class="form-control" name="first_name" id="user_firstname" placeholder="Nombres...">
                <div class="mensaje-error" id="user-error-firstname"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Apellidos: </label>
                <input class="form-control" name="last_name" id="user_lastname" placeholder="Apellidos...">
                <div class="mensaje-error" id="user-error-lastname"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Email: </label>
                <input class="form-control" name="email" id="user_email" placeholder="Email...">
                <div class="mensaje-error" id="user-error-email"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Cel: </label>
                <input class="form-control" name="cel" id="user_cel" placeholder="Celular...">
                <div class="mensaje-error" id="user-error-cel"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Dirección: </label>
                <input class="form-control" name="address" id="user_address" placeholder="Direccion...">
                <div class="mensaje-error" id="user-error-address"></div>
              </div>

              <div class="form-group">
                  <label class="control-label">Ciudad: </label>
                  <select clasS="form-control" name="city_id" id="user_city">
                    @foreach ($cities as $city)
                  <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                    @endforeach
                  </select>
                  {{-- <input class="form-control" name="address" id="user_address" placeholder="Direccion..."> --}}
                  {{-- <div class="mensaje-error" id="user-error-address"></div> --}}
              </div>
              <div class="form-group">
                <label class="control-label">Company: </label>
                <select class="form-control" name="company_id" id="user_company">
                  @foreach($companies as $key => $company)
                  <option value="{{ $company['id'] }}">{{ $company['name_company'] }}</option>
                  @endforeach
                </select>
             </div>
    			  </div>
          </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="user_save">Crear</button>
        <button type="button" class="btn btn-success" id="user_update">Actualizar</button>
      </div>
    </div>
  </div>
</div>
