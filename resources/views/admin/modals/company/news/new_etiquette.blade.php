<div id="new-etiquette" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="etiquette_form" class="u-mb0">
        <div class="modal-header">
          	<div class="tilte_modal">
              <h4 class="modal-title"><span id="label-news-title">Informacion de la Campaña</span></h4>
              <button type="button" data-dismiss="modal">&times;</button>
            </div>
        </div>
      <div class="modal-body" style="padding: 20px 20px 0px 20px">
        <input type="hidden" name="id">
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Nombre:</label>
          <input type="text" name="name" class="form-control" placeholder="Escribe el nombre de la Categoría">
          <div class="mensaje-error" id="etiquette-name-error"></div>
        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Link de la Etiqueta:</label>
          <input onclick="this.focus();this.select()" type="text" name="slug_url" class="form-control" placeholder="Aquí se genrará el futuro enlace" >

        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Estado:</label>
          <select class="form-control u-mb3" name="published">
            <option value="1">Publicado</option>
            <option value="0">No Publicado</option>
          </select>
        </div>
      </div>
      </form>
      <form action="/admin/configurar-etiquetas" method="POST" target="_blank" id="etiquette_after-save-form">
        <input type="hidden" name="etiquette_id" value="" id="etiquette_after-save-id">
      </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="etiquette__save">Crear</button>
        <button type="button" class="btn btn-success" id="etiquette__update">Actualizar</button>
      </div>
    </div>
  </div>
</div>
