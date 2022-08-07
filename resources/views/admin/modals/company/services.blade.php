<div id="add-services" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información del Servicio</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div class="col-md-12 u-mb3 u-center u-color-error"></div>

        {!! Form::open(array('id'=>'form_services','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
        <input type="hidden" name="_method" id="service_method" value="PUT" />
        <input type="hidden" name="service_id" id="service_id" value="">
        <div class="o-wrapper u-mb4">
          <div class="col-md-12 u-px0">

            <div class="form-group">
              <label class="control-label">Nombre: </label>
              <input class="form-control" name="name" id="service_name" placeholder="Nombre del servicio">
              <div class="mensaje-error" id="service-error-name"></div>
            </div>

            <div class="form-group">
              <label class="control-label" id="">
                <i class="glyphicon glyphicon-camera"></i>Foto del Servicio:
              </label>
              <div class="dropzone" id="div_image-container_services-modal">

                <div class="dropzone_image" id="service_preview_image">
                </div>
                <input type="file" accept="image/jpeg, image/png" name="service_image" id="service_image" value="">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label">Descripción: </label>
              <textarea class="form-control" name="description" placeholder="Descripción del servicio" id="service_content" rows="4" cols="40"></textarea>
              <div class="mensaje-error" id="service-error-description"></div>
            </div>
          </div>
        </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="service_save">CREAR</button>
        <button type="button" class="btn btn-success" id="service_update">GUARDAR</button>
      </div>
    </div>
  </div>
</div>
