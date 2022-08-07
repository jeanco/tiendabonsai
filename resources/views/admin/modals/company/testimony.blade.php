<div id="add-testimony" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información del Testimonio</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div class="col-md-12 u-mb3 u-center u-color-error titulo-error" id="testimony_error"></div>

        {!! Form::open(array('id'=>'form_testimony','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
          <input type="hidden" name="_method" id="testimony_method" value="PUT" />
          <input type="hidden" name="service_id" id="testimony_id" value="">
          <div class="col-xs-10 u-px0 col-xs-offset-1 u-mb4">
            <div class="col-md-6 u-px0">
              <div class="col-md-12 form-group">
                <label class="control-label" id="">
                  <i class="glyphicon glyphicon-camera"></i>Suba una Imagen: (450x450px, Max 2MB)
                </label>
                <div class="dropzone" id="testimony_image-container">
                  <div class="dropzone_image"  id="testimony_preview-image">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" name="image" id="testimony_image" value="">
                </div>
                <div class="mensaje-error" id="testimony_error-image"></div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Nombre completo: </label>
                <input class="form-control" name="full_name" id="testimony_name" placeholder="Ingrese el nombre completo">
                <div class="mensaje-error" id="testimony_error-name"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Testimonio: </label>
                    <textarea class="form-control" name="description" placeholder="Ingrese una descripción" id="testimony_description" rows="4" cols="40"></textarea>
                <div class="mensaje-error" id="testimony_error-description"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Ciudad: </label>
                <input class="form-control" name="city" id="testimony_city" placeholder="Ingrese la ciudad">
              </div>
            </div>
          </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="testimony__save">CREAR TESTIMONIO</button>
        <button type="button" class="btn btn-success" id="testimony__update">EDITAR TESTIMONIO</button>
      </div>
    </div>
  </div>
</div>
