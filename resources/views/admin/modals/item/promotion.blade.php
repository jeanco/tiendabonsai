<div id="promotion-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Promocionar</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">
        <h3 class="col-md-12 u-center u-primary u-mb4 u-mt3" id="promotion_product-name">
          Producto
        </h3>

        <div id="product-promotion-error" class="col-md-12 u-center u-color-error u-mb3 titulo-error"></div>

        {!! Form::open(array('id' => 'promotion_form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="product_id" id="promotion_product-id" value="">
        <input type="hidden" name="product_price">
        <input type="hidden" id="currency-symbol">
        <input type="hidden" id="currency-decimal">
        <input type="hidden" id="currency-rate">

        <div class="col-md-12">
          <div class="col-md-7">
            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Título de la promoción: (para el SEO)
              </label>
              <input type="text" name="promotion_title" class="form-control" id="promotion_title">
            </div>

            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Estado de la promoción:
              </label>
              <select name="promotion_available" class="form-control" id="promotion_available">
                <option value=1>Publicado en el Catálogo</option>
                <option value=0>No publicado</option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>¿Desea destacar ésta promoción?:
              </label>
              <select name="promotion_outstanding" class="form-control" id="promotion_outstanding">
                <option value=1>Publicar en la Página de Inicio</option>
                <option value=0>No publicar la Oferta en Página Inicio</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-camera"></i>Imagen de Oferta(600px x 600px): Para mostrar en la Página de Inicio
              </label>

              <div class="dropzone" id="">
                <label id="promotion_preview-text-image">
                  <i class="glyphicon glyphicon-picture"></i>
                  <span class="u-ml3">Subir Imagen:</span>
                </label>
                <div class="dropzone_image" id="promotion_preview-image"></div>
                <input type="file" accept="image/jpeg, image/png" class="" id="promotion_image" name="promotion_image" value="">
              </div>
              <button class="btn btn-success" id="promotion-image__remove">Borrar imágen</button>
            </div>

          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Precio Online (Promoción):
              </label>
              <input type="text" name="price_promotion" class="form-control" id="promotion_price">
            </div>

            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-camera"></i>Etiqueta de la Oferta(150px):
              </label>

              <div class="dropzone" id="">
                <label id="promotion_preview-text-etiquette">
                  <i class="glyphicon glyphicon-picture"></i>
                  <span class="u-ml3">Subir imagen:</span>
                </label>
                <div class="dropzone_image" id="promotion_preview-etiquette"></div>
                <input type="file" accept="image/jpeg, image/png" class="" id="promotion_etiquette" name="promotion_etiquette" valupromotion_etiquette="">
              </div>
              <button class="btn btn-success" id="promotion-etiquette__remove">Borrar Etiqueda</button>
            </div>

            <div class="form-group" style="display:none">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Porcentaje de descuento:
              </label>
              <input type="text" name="promotion_percentage" placeholder="Ejem. 20" class="form-control" id="promotion_percentage">
            </div>

            <div class="form-group" style="display: none;">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Temporizador:
              </label>
              <select class="form-control" name="promotion_config">
                  <option value="1">No publicar La Promoción cuando termine el tiempo</option>
                  <option value="2">No publicar solo el reloj cuando termine el tiempo</option>
              </select>
              <label id="saved"></label>
              <input type="hidden" name="promotion_discount" id="promotion_discount">
            </div>

            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Fecha límite de la promoción:
              </label>
              <input type="text" name="promotion_end_at" placeholder="Fecha" class="form-control" id="promotion_date">
            </div>

            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Tipo de descuento:
              </label>
              <select class="form-control" name="promotion_discount_type">
                  <option value="1">Ahorro por %</option>
                  <option value="2">Ahorro por monto</option>
              </select>
              <label id="saved"></label>
              <!-- <input type="hidden" name="promotion_discount" id="promotion_discount"> -->
            </div>


          </div>
        </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="promotion__update"><i class="glyphicon glyphicon-ok u-mr2"></i>Guardar</button>
      </div>
    </div>
  </div>
</div>
