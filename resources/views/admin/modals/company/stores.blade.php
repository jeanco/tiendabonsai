<div id="new-stores" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Informacion de Tienda</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      {!! Form::open(array('id' => 'new-store_form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
      <div class="modal-body">
        <div class="row">
          <input type="hidden" name="store_id" id="new-store_id">
          <div class="col-md-6" style="padding: 0px 25px">
            <div class="form-group">
              <label class="control-label"><i class="glyphicon glyphicon-file"></i>Nombre de la Tienda:</label>
              <input type="text" name="name_company" class="form-control" placeholder="Escribe el nombre de la tienda" id="new-store_name">
              <div class="mensaje-error" id="store-error-name"></div>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="glyphicon glyphicon-file"></i>Razón social:</label>
              <input type="text" name="business_name" class="form-control" placeholder="Escribe la razón social" id="new-store_business-name">
              <div class="mensaje-error" id="store-error-business-name"></div>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="glyphicon glyphicon-file"></i>Ruc de la Tienda:</label>
              <input type="text" name="ruc" class="form-control" id="new-store_ruc" placeholder="Escribe el RUC de la tienda">
              <div class="mensaje-error" id="store-error-ruc"></div>
            </div>
            <!--  <div class="form-group">
              <label class="control-label"><i class="glyphicon glyphicon-camera"></i>Logo color:</label>
              <div class="dropzone">
                <label><i class="glyphicon glyphicon-picture"></i><span class="u-ml3">Añadir Foto</span></label>
                <div class="dropzone_image"></div>
                <input type="file" accept="image/gif, image/jpeg, image/png">
              </div>
            </div> -->
            <!--   <div class="form-group">
              <label class="control-label"><i class="glyphicon glyphicon-camera"></i>Logo blanco:</label>
              <div class="dropzone">
                <label><i class="glyphicon glyphicon-picture"></i><span class="u-ml3">Añadir Foto</span></label>
                <div class="dropzone_image" style="background-color: #3e3e3e;"></div>
                <input name="company_logo_white" type="file" accept="image/gif, image/jpeg, image/png">
              </div>
            </div> -->
            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-send"></i>Contacto de la Tienda:
              </label>
              <input type="text" class="form-control u-mb3" id="new-store_cel" name="cel" placeholder="Celular">
              <div class="mensaje-error" id="store-error-cel"></div>
              <input type="text" class="form-control u-mb3" id="new-store_phone" name="phone" placeholder="Teléfono">
              <input type="email" class="form-control u-mb3" id="new-store_email" name="email" placeholder="Correo">
              <div class="mensaje-error" id="store-error-email"></div>
              <!-- <input type="text" class="form-control u-mb3" id="new-store_facebook"  name="facebook" placeholder="Url fan page facebook">
              <input type="text" class="form-control u-mb3" id="new-store_twitter"  name="twitter" placeholder="Url Twitter">
              <input type="text" class="form-control u-mb3" id="new-store_google"  name="google" placeholder="Url Google">
              <input type="text" class="form-control u-mb3" id="new-store_instagram"  name="instagram" placeholder="Url Instagram">
              <input type="text" class="form-control u-mb3" id="new-store_youtube"  name="youtube" placeholder="Url Youtube"> -->
              <input type="text" name="address" class="form-control u-mb3" id="new-store_address" placeholder="Dirección" />
              <select class="form-control u-mb3" id="new-store_country"  name="country_id">
              </select>
              <select class="form-control u-mb3" id="new-store_city"  name="city_id">
              </select>
              <!-- <input type="text" class="form-control u-mb3" id="new-store_city"  name="city" placeholder="Ciudad"> -->
              <!-- <input type="text" class="form-control u-mb3" id="new-store_country"  name="country" placeholder="País"> -->
            </div>
          </div>
          <div class="col-md-6" style="padding: 0px 25px">
            <div class="form-group">
              <label class="control-label"><i class="glyphicon glyphicon-file"></i>Fecha de membresía:</label>
              <input type="text" name="membership_date_without_format" class="form-control" id="new-store_membership-date" data-date-format="dd/mm/yyyy">
              <div class="mensaje-error" id="store-error-membership-date"></div>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="glyphicon glyphicon-file"></i>Representante:</label>
              <input type="text" name="representative" class="form-control" id="new-store_representative">
              <!-- <div class="mensaje-error" id="store-error-"></div> -->
            </div>
            <select class="form-control u-mb3" id="new-store_category"  name="category_id">
            </select>
            <select class="form-control u-mb3" id="new-store_status"  name="status">
              <option value=1>Activo</option>
              <option value=0>Inactivo</option>
            </select>
            <div class="form-group">
              <label class="control-label"><i class="glyphicon glyphicon-file"></i>Descripción de la Tienda:</label>
              <textarea rows="9" cols="40" name="description_company" class="form-control" id="new-store_description" placeholder="Escribe una breve descripción de la tienda..."></textarea>
              <div class="mensaje-error"></div>
            </div>
          </div>
        </div>
      </div>
      {!! Form::close() !!}
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default" id="">Cancelar</button>
        <button type="button" class="btn btn-success" id="new-store__save">Crear</button>
        <button type="button" class="btn btn-success" id="new-store__update">Actualizar</button>
      </div>
    </div>
  </div>
</div>
