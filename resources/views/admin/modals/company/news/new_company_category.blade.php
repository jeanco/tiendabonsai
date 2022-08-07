<div id="new-company-category" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title"><span id="label-news-title">Informacion de Categoría de Empresa</span></h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body" style="padding: 20px 20px 0px 20px">
        <input type="hidden" name="" id="company-category_id">
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Nombre de la Categoría:</label>
          <input type="text" class="form-control" id="company-category_name" placeholder="Escribe el nombre de la Categoría">
          <div class="mensaje-error" id="company-category-name-error"></div>
        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Descripción:</label>
          <textarea class="form-control" id="company-category_description" type="text" rows="4" placeholder="Escribe la Descripción de Categoría"></textarea>
          <div class="mensaje-error"></div>
        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Estado:</label>
          <select class="form-control u-mb3" id="company-category_published">
            <option value="1">Publicado</option>
            <option value="0">No Publicado</option>
          </select>
          <div class="mensaje-error"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="company-category__save">Crear</button>
        <button type="button" class="btn btn-success" id="company-category__update">Actualizar</button>
      </div>
    </div>
  </div>
</div>
