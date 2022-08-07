<div id="new-attribute" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Atributo</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body" style="padding: 20px 20px 0px 20px">

        {!! Form::open(array('id' => 'attribute_form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
        <h4 class="col-md-12 text-center u-primary u-mb4 u-mt0"><b id="label-news-title">Informacion de Atributo</b></h4>
        <input type="hidden" id="attribute_id" name="id">
        <div class="col-md-12 u-px0">
          <div class="form-group">
            <label class="control-label" id="">
              <i class="glyphicon glyphicon-camera"></i>Ícono del atributo:
            </label>
            <div style="padding: 0 20px">
              <div class="dropzone" id="attribute_container-image_" style="padding: 0 50px">
                <div class="dropzone_image"  id="attribute_preview-image_">
                </div>
                <input type="file" accept="image/jpeg, image/png" name="icon" id="attribute_image_" value="">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Nombre del Atributo:</label>
          <input type="text" name="name" class="form-control" id="attribute_name" placeholder="Escribe el nombre del Atributo">
          <div class="mensaje-error text-error" id="attribute-name-error"></div>
        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Categoría:</label>
          <select name="category_attribute_id" class="form-control u-mb3" id="attribute_category">
            <option value="">1</option>
            <option value="">2</option>
          </select>
          <div class="mensaje-error"></div>
        </div>
        <div class="form-group color-area" style="display: none;">
          <label class="control-label">Color</label>
          <div class="input-icon col-md-12 input-group colorpicker-color_attribute" id="rate"  data-color="" data-color-format="rgba">
            <i class="glyphicon glyphicon-tint" id="colorpicker-color_attribute"  style="color: #999999;display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;"></i>
            <input type="text"  id="attribute_description" value="" name="description" class="form-control" style="padding-left: 40px !important; height: 50px;">
          </div>
        </div>

        <!-- <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Ícono:</label>
          <input type="file" name="icon" class="form-control">
        </div> -->

        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Estado:</label>
          <select name="published" class="form-control u-mb3" id="attribute_published">
            <option value="1">Publicado</option>
            <option value="0">No Publicado</option>
          </select>
          <div class="mensaje-error"></div>
        </div>
      </div>
      {!! Form::close() !!}
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" id="attribute__save">Crear</button>
          <button type="button" class="btn btn-success" id="attribute__update">Actualizar</button>
      </div>
    </div>
  </div>
</div>
