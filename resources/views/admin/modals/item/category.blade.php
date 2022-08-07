<div id="category-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <div class="tilte_modal">
          <h4 class="modal-title">Información de la Categoría</h4>
          <button type="button" data-dismiss="modal">&times;</button>
        </div>
      </div>
      <div class="modal-body row">
        <div id="category-error" class="col-md-12 u-center u-color-error u-mb3 titulo-error"></div>

        <div class="col-md-12">
          {!! Form::open(array('id' => 'category_form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
          <input type="hidden" id="category_id" name="category_id" value="">

          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Nombre de la Categoría:
              </label>
              <input type="text" id="category_name" name="name" class="form-control" placeholder="Ingrese el nombre de la categoría">
              <div id="category-name-error" class="mensaje-error"></div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <label class="control-label">
                  <i class="glyphicon glyphicon-camera"></i>Íconos(50px):
                </label>

              </div>
              <div class="col-md-6">
                <div id="dropzone_category" class="dropzone">
                  <label id="category_icon-preview-text">
                    <i class="glyphicon glyphicon-picture"></i>
                    <span class="u-ml3">Color:</span>
                  </label>
                  <div class="dropzone_image" id="category_icon-preview-image">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" id="category_icon" name="category_icon" value="">
                </div>

              </div>

              <div class="col-md-6">
                <div id="dropzone_category" class="dropzone">
                  <label id="category_icon-white-preview-text">
                    <i class="glyphicon glyphicon-picture"></i>
                    <span class="u-ml3">Blanco:</span>
                  </label>
                  <div class="dropzone_image" id="category_icon-white-preview-image">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" id="category_icon-white" name="category_icon_white" value="">
                </div>

              </div>

            </div>
            <div class="form-group" style="display:none"> <label class="control-label">
              <i class="glyphicon glyphicon-camera"></i>Foto de la Categoría (500px x 500px):
              </label>
              <div id="dropzone_category" class="dropzone">
                <label id="category_image-preview-text">
                  <i class="glyphicon glyphicon-picture"></i>
                  <span class="u-ml3">Añadir Foto:</span>
                </label>
                <div class="dropzone_image" id="category_preview-image">
                </div>
                <input type="file" accept="image/jpeg, image/png" id="category_image" name="category_image" value="">
              </div>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Descripción de la Categoría:
              </label>
              <textarea class="form-control" id="category_description" name="content" rows="13" cols="40" placeholder="Describe las condiciones y características para esta categoría."></textarea>
              <div id="category-description-error" class="mensaje-error"></div>
            </div>

            <div class="form-grup">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Estado:
              </label>

              <select name="published" class="form-control" id="category_published">
                <option value="0">No publicado</option>
                <option value="1">Publicado</option>
              </select>
            </div>
          </div>
          {!! Form::close() !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default" id="category__cancel">Cancelar</button>
        <button type="button" class="btn btn-success" id="category__save">Crear</button>
        <button type="button" class="btn btn-success" id="category__update">Actualizar</button>
      </div>
    </div>
  </div>
</div>
