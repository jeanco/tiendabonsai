<div id="add-staff" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información del Personal</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div class="col-md-12 u-mb3 u-center u-color-error titulo-error" id="staff_error"></div>

        {!! Form::open(array('id'=>'form_staff','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
          <input type="hidden" id="staff_id" value="">
          <div class="col-xs-10 u-px0 col-xs-offset-1 u-mb4">
            <div class="col-md-6 u-px0">
              <div class="col-md-12 form-group">
                <label class="control-label" id="">
                  <i class="glyphicon glyphicon-camera"></i>Suba una Imagen: (450x450px, Max 2MB)
                </label>
                <div class="dropzone" id="staff_image-container">
                  <div class="dropzone_image"  id="staff_preview-image">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" name="image" id="staff_image" value="">
                </div>
                <!-- <div class="mensaje-error" id="staff_error-image"></div> -->
              </div>

              <div class="form-group">
                <label class="control-label">Nombres: </label>
                <input class="form-control" name="first_name" placeholder="Ingrese el nombre completo">
                <div class="mensaje-error" id="staff-first_name-error"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Apellidos: </label>
                <input class="form-control" name="last_name" placeholder="Ingrese los apellidos">
                <div class="mensaje-error" id="staff-last_name-error"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Cargo: </label>
                <input class="form-control" name="role" placeholder="Ingrese su Cargo">
              </div>

              <div class="form-group">
                <label class="control-label">Descripción: </label>
                <textarea class="form-control" name="description" placeholder="Ingrese una descripción"></textarea>
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Facebook: </label>
                <input class="form-control" name="facebook" placeholder="Ingrese el Facebook">
              </div>

              <div class="form-group">
                <label class="control-label">Twitter: </label>
                <input class="form-control" name="twitter" placeholder="Ingrese el Twitter">
              </div>

              <div class="form-group">
                <label class="control-label">Linkedin: </label>
                <input class="form-control" name="linkedin" placeholder="Ingrese el Linkedin">
                <!-- <div class="mensaje-error" id="staff-cellphone-error"></div> -->
              </div>

              <!--div class="form-group">
                <label class="control-label">Celular: </label>
                <input class="form-control" name="cellphone" placeholder="Ingrese el celular">
                //<div class="mensaje-error" id="staff-cellphone-error"></div> 
              </div-->
              <div class="form-group">
                <label class="control-label">Whatsapp: </label>
                <input class="form-control" name="whatsapp" placeholder="Número de Whatsapp">
                <!-- <div class="mensaje-error" id="staff-whatsapp-error"></div> -->
              </div>

              <div class="form-group">
                <label class="control-label">Email: </label>
                <input class="form-control" name="email" placeholder="Ingrese el correo">
              </div>
              <div class="form-group">
                <label class="control-label">Tipo: </label>
                <select name="type" class="form-control">
                  <option value="1">Principal</option>
                  <option value="2">Secundario</option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">Sede: </label>
                <select name="place_id" class="form-control">
                  @foreach($places as $place)
                  <option value="{{ $place['id'] }}">{{ $place['name'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="staff__save">CREAR</button>
        <button type="button" class="btn btn-success" id="staff__update">EDITAR</button>
      </div>
    </div>
  </div>
</div>
