<div id="catalog-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información del Catálogo</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div class="col-md-12 u-mb3 u-center u-color-error"></div>

        <form id="catalog_form">
          <input type="hidden" name="id" id="catalog_id" value="">
          <div class="o-wrapper u-mb4">
            <div class="col-md-6 u-px0">
              <div class="col-md-12 form-group">
                <label class="control-label" id="">
                  <i class="glyphicon glyphicon-camera"></i>Imagen Horizontal(Desktop):
                </label>
                <div class="dropzone" id="catalog_image-desktop-container">
                  <div class="dropzone_image" id="catalog_image-desktop-preview">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" name="image_desktop" id="catalog_image-desktop">
                </div>
              </div>
              <div class="col-md-12 form-group">
                <label class="control-label" id="">
                  <i class="glyphicon glyphicon-info-sign"></i>Imagen Vertical (para Móviles): (450px)
                </label>

                <div class="dropzone" id="catalog_image-movil-container">
                  <div class="dropzone_image" id="catalog_image-movil-preview">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" name="image_movil" id="catalog_image-movil">
                </div>
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Título: </label>
                <input class="form-control" name="title" id="catalog_title" placeholder="Escriba un Título">
                <div class="mensaje-error" id="campaign-title-error"></div>
              </div>

              <div class="form-group">
                <label class="control-label">¿Hacia que URL lleva el enlace: </label>
                <input class="form-control" name="link" id="catalog_link" placeholder="Escriba un enlace">
              </div>
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="catalog__cancel">Cerrar</button>
        <button type="button" class="btn btn-success" id="catalog__save">Crear</button>
        <button type="button" class="btn btn-success" id="catalog__update">Editar</button>
      </div>
    </div>
  </div>
</div>
