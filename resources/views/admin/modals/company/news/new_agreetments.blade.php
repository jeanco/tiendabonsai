<div id="add-agreetments" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información del aliado</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div class="col-md-12 u-mb3 u-center u-color-error"></div>

        {!! Form::open(array('id'=>'form_agreetments','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
        <input type="hidden" name="_method" id="agreetment_method" value="PUT" />
        <input type="hidden" name="agreetment_id" id="agreetment_id" value="">
        <div class="col-xs-10 u-px0 col-xs-offset-1 u-mb4">
          <div class="col-md-6 u-px0">
            <div class="col-md-12 form-group">
              <label class="control-label" id="">
                <i class="glyphicon glyphicon-camera"></i>Suba una Imagen: (350x350px, Max 2MB)
              </label>
              <div class="dropzone" id="div_image-container_agreetments-modal">

                <div class="dropzone_image" id="agreetment_preview_image">
                </div>
                <input type="file" accept="image/jpeg, image/png" name="agreetment_image" id="agreetment_image" value="">
              </div>
            </div>
          </div>

          <div class="col-md-6 u-px0">
            <div class="form-group">
              <label class="control-label">Título: </label>
              <input class="form-control" name="title" id="agreetment_title" placeholder="Ingrese un Título">
              <div class="mensaje-error" id="agreetment-error-title"></div>
            </div>

            <div class="form-group">
              <label class="control-label">Descripción: </label>
              <textarea name="description" placeholder="Ingrese una descripción" id="agreetment_description" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">Sitio Web: </label>
              <input class="form-control" name="website" id="agreetment_website" placeholder="Ingrese su página web">
              <div class="mensaje-error" id="agreetment-error-website"></div>
            </div>
          </div>

          {!! Form::close() !!}

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="agreetment_save">CREAR ALIADO</button>
        <button type="button" class="btn btn-success" id="agreetment_update">EDITAR ALIADO</button>
      </div>
    </div>
  </div>
</div>
