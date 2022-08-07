<div id="new-category" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="attribute-category-form" class="u-mb0">
        <div class="modal-header">
          	<div class="tilte_modal">
              <h4 class="modal-title"><span id="label-news-title">Informacion de Categoría</span></h4>
              <button type="button" data-dismiss="modal">&times;</button>
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body" style="padding: 20px 20px 0px 20px">
          <input type="hidden" name="id" id="new-category_id">
          <div class="form-group">
            <label class="control-label" id="">
              <i class="glyphicon glyphicon-camera"></i>Ícono del atributo:
            </label>
            <div style="padding: 0 20px">
              <div class="dropzone" id="attribute_container-image" style="padding: 0 50px">
                <div class="dropzone_image"  id="attribute_preview-image">
                </div>
                <input type="file" accept="image/jpeg, image/png" name="icon" id="attribute_image" value="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Nombre de la Categoría:</label>
            <input type="text" name="name" class="form-control" id="new-category_name" placeholder="Escribe el nombre de la Categoría">
            <div class="mensaje-error" id="new-category-name-error"></div>
          </div>
          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Estado:</label>
            <select class="form-control u-mb3" name="published" id="new-category_published">
              <option value="1">Publicado</option>
              <option value="0">No Publicado</option>
            </select>
            <div class="mensaje-error"></div>
          </div>
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="new-category__save">Crear</button>
        <button type="button" class="btn btn-success" id="new-category__update">Actualizar</button>
      </div>
    </div>
  </div>
</div>
