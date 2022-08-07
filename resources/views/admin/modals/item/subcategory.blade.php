<div id="subcategory-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="tilte_modal">
          <h4 class="modal-title">Información de la Subcategoria</h4>
          <button type="button" data-dismiss="modal">&times;</button>
        </div>
      </div>
      <div class="modal-body row">

        <h4 class="col-md-12 u-center u-primary" style="display: none;"><label id="label-subcategory_category-name"></label></h4>
        <div id="subcategory-error" class="col-md-12 u-center u-color-error u-mb3 titulo-error"></div>

        {!! Form::open(array('id' => 'subcategory_form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data'))
        !!}
        <input type="hidden" name="subcategory_id" id="subcategory_id" value="">
        <input type="hidden" name="category_id" id="subcategory_category-id" value="">
        <div class="o-wrapper u-mb3">
          <div class="form-group">
              <div class="col-md-12">
                <label class="control-label">
                  <i class="glyphicon glyphicon-camera"></i>Íconos(50px):
                </label>

              </div>
              <div class="col-md-6">
                <div id="dropzone_category" class="dropzone">
                  <label id="subcategory_icon-preview-text">
                    <i class="glyphicon glyphicon-picture"></i>
                    <span class="u-ml3">Color:</span>
                  </label>
                  <div class="dropzone_image" id="subcategory_icon-preview-image">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" id="subcategory_icon" name="subcategory_icon" value="">
                </div>

              </div>

              <div class="col-md-6">
                <div id="dropzone_category" class="dropzone">
                  <label id="subcategory_icon-white-preview-text">
                    <i class="glyphicon glyphicon-picture"></i>
                    <span class="u-ml3">Blanco:</span>
                  </label>
                  <div class="dropzone_image" id="subcategory_icon-white-preview-image">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" id="subcategory_icon-white" name="subcategory_icon_white" value="">
                </div>

              </div>

            </div>
            <div class="form-group" style="display:none;"> <label class="control-label">
              <i class="glyphicon glyphicon-camera"></i>Foto de la Categoría:
              </label>
              <div id="dropzone_category" class="dropzone">
                <label id="subcategory_image-preview-text">
                  <i class="glyphicon glyphicon-picture"></i>
                  <span class="u-ml3">Añadir Foto:</span>
                </label>
                <div class="dropzone_image" id="subcategory_preview-image">
                </div>
                <input type="file" accept="image/jpeg, image/png" id="subcategory_image" name="subcategory_image" value="">
              </div>
            </div>
          <div class="form-group">
            <label class="control-label">
              <i class="glyphicon glyphicon-file"></i>Nombre de la Subcategoria:
            </label>
            <input type="text" class="form-control" name="name" id="subcategory_name" placeholder="Ingrese el título de la subcategoria">
            <div id="subcategory-name-error" class="mensaje-error"></div>
          </div>

          <div class="form-group" style="display:none;">
            <label class="control-label">
              <i class="glyphicon glyphicon-file"></i>Descripción de la Subcategoria:
            </label>
            <textarea class="form-control" name="content" id="subcategory_description" rows="5" cols="40" placeholder="Describe las condiciones y características para esta subcategoria."></textarea>
          </div>

          <div class="form-group">
            <label class="control-label">
              <i class="glyphicon glyphicon-file"></i>Estado de la subcategoria:
            </label>
            <select name="published" class="form-control" id="subcategory_published">
              <option value=0>No publicado</option>
              <option value=1>Publicado</option>
            </select>
          </div>

          <div class="" id="categories_attributes">

          </div>


        </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default" id="subcategory__cancel">Cancelar</button>
        <button type="button" class="btn btn-success" id="subcategory__save">Crear</button>
        <button type="button" class="btn btn-success" id="subcategory__update">Actualizar</button>
      </div>
    </div>
  </div>
</div>
