<div id="campaign-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <div class="tilte_modal">
            <h4 class="modal-title">Información de la Portada</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
        </div>

        <div class="modal-body row">
          <div class="col-md-12 u-mb3 u-center u-color-error"></div>

          {!! Form::open(array('id'=>'form_campaign','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
              <input type="hidden" name="_method" id="campaign_method" value="PUT" />
              <input type="hidden" name="id" id="campaign_id" value="">
              <div class="o-wrapper u-mb4">
                  <div class="col-md-6 u-px0">
                    <div class="col-md-12 form-group">
                        <label class="control-label" id="">
                            <i class="glyphicon glyphicon-camera"></i>Imagen Horizontal: (1355px x 500px)<br>
                            <i class="glyphicon glyphicon-camera"></i>Imagen Horizontal Top: (1355px x 50px)
                        </label>
                        <div class="dropzone" id="campaign_cover-container">
                            <div class="dropzone_image"  id="campaign_cover-preview">
                            </div>
                            <input type="file" accept="image/jpeg, image/png" name="cover" id="campaign_cover">
                        </div>
                    </div>
                      <div class="col-md-12 form-group">
                          <label class="control-label" id="">
                              <i class="glyphicon glyphicon-info-sign"></i>Imagen  (para Móviles): (400px x 390px)<br>
                              <i class="glyphicon glyphicon-info-sign"></i>Imagen Top (para Móviles): (400px x 50px)<br>
                          </label>

                          <div class="dropzone" id="campaign_image-container">
                              <div class="dropzone_image"  id="campaign_image-preview">
                              </div>
                              <input type="file" accept="image/jpeg, image/png" name="image_thumb" id="campaign_image">
                          </div>
                      </div>

                  </div>

                  <div class="col-md-6">
                     {{--  <div class="form-group">
                          <label class="control-label">Título: </label>

                          <input class="form-control" name="title" id="campaign_title" placeholder="Redacta Título para el SEO">
                          <textarea name="title" class="form-control" id="campaign_title" cols="5" rows="2"></textarea>
                          <div class="mensaje-error" id="campaign-title-error"></div>
                      </div> --}}
                      <div class="form-group">
            <label class="control-label">Título: </label>
            <textarea rows="6" class="form-control" id="campaign_title" name="title" placeholder="Descripción del artículo"></textarea>
            <div class="mensaje-error" id="campaign-title-error"></div>
          </div>

                      <div class="form-group">
                          <label class="control-label">Subtítulo: </label>
                          <input class="form-control" name="subtitle" id="campaign_subtitle" placeholder="Escribe hasta 70 caracteres">
                          <div class="mensaje-error" id="campaign-subtitle-error"></div>
                      </div>
                       {{--
                      <div class="form-group">
                          <label class="control-label">Contenido: </label>
                          <textarea placeholder="Escribe hasta 100 caracteres" name="content" class="form-control" id="campaign_content"></textarea>
                          <div class="mensaje-error" id="campaign-content-error"></div>
                      </div>
                      --}}
                      <div class="form-group">
                          <input type="checkbox" name="" id="campaign_there-is-link-">
                          <label class="control-label">Insertar Enlace(hipervinculo)</label>
                      </div>

                      <div class="form-group there-is-link">
                          <label class="control-label">Texto para mostrar: </label>
                          <input class="form-control" name="link_text" id="campaign_link-text">
                      </div>
                      <div class="form-group there-is-link">
                          <input type="checkbox" name="is_blank" id="campaign_is-blank">
                          <label class="control-label">Abrir en una nueva ventana</label>
                      </div>

                      <div class="form-group there-is-link">
                          <label class="control-label">¿Hacia que URL lleva el link?: </label>
                          <input class="form-control" name="link" id="campaign_link">
                      </div>
                      <div class="form-group">
                          <label class="control-label">Categoría: </label>
                          <select class="form-control" name="category_id" id="campaign_category"></select>
                      </div>
                  </div>
              </div>
          {!! Form::close() !!}

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="campaign__close">Cancelar</button>
          <button type="button" class="btn btn-success" id="campaign__save">Crear</button>
          <button type="button" class="btn btn-success" id="campaign__update">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
