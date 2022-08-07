<div id="notice-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          	<div class="tilte_modal">
              <h4 class="modal-title">Información de la Publicación</h4>
              <button type="button" data-dismiss="modal">&times;</button>
            </div>
        </div>
        <div class="modal-body row">

          <div class="col-md-12 u-mb3 u-center u-color-error titulo-error" id="notice_error"></div>

          {!! Form::open(array('id'=>'notice_form','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
          <input type="hidden" name="" id="notice_id" value="">
          <div class="col-xs-10 u-px0 col-xs-offset-1 u-mb4">
            <div class="col-md-6 u-px0">
              <div class="col-md-12 form-group">
                <label class="control-label" id="">
                  <i class="glyphicon glyphicon-camera"></i>Suba una Imagen: (450x450px, Max 2MB)
                </label>
                <div class="dropzone" id="notice_image-container">
                  <label id="notice_preview-text" style="text-align: center;">
                    <i class="glyphicon glyphicon-picture"></i>
                    <span class="u-ml3">Añadir Imágen</span>
                  </label>
                  <div class="dropzone_image" id="notice_preview-image">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" name="image" id="notice_image" value="">
                </div>
                <div class="mensaje-error" id="notice-image-error"></div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Título: </label>
                <input type="text" placeholder="Ingrese un título" name="title" class="form-control" id="notice_title">
                <div class="mensaje-error" id="notice-title-error"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Enlace: </label>
                <input type="text" placeholder="Ingrese la URL" name="link" class="form-control" id="notice_link">
              </div>
            </div>
          </div>
          {!! Form::close() !!}

        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-default" id="">Cerrar</button>
          <button type="button" class="btn btn-success" id="notice__save">Crear</button>
          <button type="button" class="btn btn-success" id="notice__update">Editar</button>
        </div>
      </div>
    </div>
  </div>
