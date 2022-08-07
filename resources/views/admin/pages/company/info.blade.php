<div class="col-md-12">
  <div class="tab-wrapper row u-px4 u-py5">
	  <div id="divPhotos"></div>
	  <div id="divContents"></div>
	  <div id="divExtensions"></div>

  <div class="col-md-12 text-center u-mb4">
	  <div id="company-error" class="col-md-10 titulo-error"></div>
  </div>

  {!! Form::open(array('id' => 'form_company', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
    <input type="hidden" id="company_method" name="_method" value="PUT" />
    <input type="hidden" id="company_id" name="company_id" value="">
    <div class="col-md-4">
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Nombre de la Empresa:
        </label>
        <input type="text" class="form-control" id="company_name" name="name_company" placeholder="Escribe el nombre de la empresa">
	      <div id="company-error-name" class="mensaje-error"></div>
      </div>

      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-camera"></i>Logo de la Empresa:
        </label>
        <div id="dropzone_company" class="dropzone">
          <label id="company-preview-image-text">
            <i class="glyphicon glyphicon-picture"></i>
            <span class="u-ml3">Añadir Foto</span>
          </label>
          <div class="dropzone_image" id="preview_logotype">
          </div>
          <input id="company_logo" name="company_logo" type="file" accept="image/gif, image/jpeg, image/png">
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Descrxxxipción de la Empresa:x
        </label>
    		<textarea rows="9" cols="40" class="form-control" id="company_description" name="description_company" placeholder="Escribe una breve descripción de la empresa..."></textarea>
	      <div id="company-error-description" class="mensaje-error"></div>
	    </div>

      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Propuesta de valor:
        </label>
        <textarea rows="9" cols="40" class="form-control" id="company_proposal-value" name="proposal_value" placeholder="Escribe la propuesta de valor de la empresa..."></textarea>
      </div>

      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Trabaja con nosotros:
        </label>
        <textarea rows="9" cols="40" class="form-control" name="work_description_company" id="company_description_work"></textarea>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-send"></i>Contacto de la Empresa:
        </label>
        <input type="text" class="form-control u-mb3" id="company_cel" name="cel" placeholder="Celular">
        <input type="text" class="form-control u-mb3" id="company_phone" name="phone" placeholder="Teléfono">
        <input type="email" class="form-control u-mb3" id="company_email" name="email" placeholder="Correo">
	      <div id="company-error-email" class="mensaje-error"></div>
        <input type="text" class="form-control u-mb3" id="company_facebook" name="facebook" placeholder="Url fan page facebook">
		<input type="text" class="form-control u-mb3" id="company_twitter" name="twitter" placeholder="Url Twitter">
        <textarea rows="3" cols="40" class="form-control u-mb3" id="company_address" name="address" placeholder="Dirección"></textarea>
        <input type="text" class="form-control u-mb3" id="company_city" name="city" placeholder="Ciudad">
	      <div id="company-error-city" class="mensaje-error"></div>
        <input type="text" class="form-control u-mb3" id="company_country" name="country" placeholder="País">
	      <div id="company-error-country" class="mensaje-error"></div>
      </div>
    </div>

    <div class="col-md-12 text-right">
      <button type="button" class="btn btn-success" id="company-info-save">
        <i class="glyphicon glyphicon-floppy-disk u-mr2"></i>Guardar
      </button>
    </div>
  {!! Form::close() !!}
  </div>
</div>
