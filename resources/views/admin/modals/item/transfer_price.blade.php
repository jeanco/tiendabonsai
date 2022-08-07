<div id="transfer-price-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Promoción por transferir</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <h3 class="col-md-12 u-center u-primary u-mb4 u-mt3" id="transfer_product-name"></h3>

        <div id="product-transfer-error" class="col-md-12 u-center u-color-error u-mb3 titulo-error"></div>

        {!! Form::open(array('id' => 'transfer_form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="product_id" id="transfer_product-id" value="">
        <input type="hidden" name="product_price">

        <div class="col-md-12">
          <div class="col-md-7">
            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Título de la promoción: (para el SEO)
              </label>
              <input type="text" name="transfer_title" class="form-control" id="transfer_title">
            </div>

            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Estado de la promoción:
              </label>
              <select name="transfer_available" class="form-control" id="transfer_available">
                <option value=1>Publicado en el Catálogo</option>
                <option value=0>No publicado</option>
              </select>
            </div>
            <!--        <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>¿Desea destacar ésta promoción?:
              </label>
              <select name="transfer_outstanding" class="form-control" id="transfer_outstanding">
                <option value=1>Publicar en la Página de Inicio</option>
                <option value=0>No publicar la Oferta en Página Inicio</option>
              </select>
            </div> -->

<!--             <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-camera"></i>Imagen de Oferta(600px x 600px): Para mostrar en la Página de Inicio
              </label>

              <div class="dropzone" id="">
                <label id="transfer_preview-text-image">
                  <i class="glyphicon glyphicon-picture"></i>
                  <span class="u-ml3">Subir Imagen:</span>
                </label>
                <div class="dropzone_image" id="transfer_preview-image"></div>
                <input type="file" accept="image/jpeg, image/png" class="" id="transfer_image" name="transfer_image" value="">
              </div>
              <button class="btn btn-success" id="transfer-image__remove">Borrar imágen</button>
            </div> -->

          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Precio Exclusivo con Transferencia:
              </label>
              <input type="text" name="transfer_price" class="form-control" id="transfer_price">
            </div>

            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-camera"></i>Etiqueta de la Oferta(150px):
              </label>

              <div class="dropzone" id="">
                <label id="transfer_preview-text-etiquette">
                  <i class="glyphicon glyphicon-picture"></i>
                  <span class="u-ml3">Subir imagen:</span>
                </label>
                <div class="dropzone_image" id="transfer_preview-etiquette"></div>
                <input type="file" accept="image/jpeg, image/png" class="" id="transfer_etiquette" name="transfer_etiquette" valupromotion_etiquette="">
              </div>
              <button class="btn btn-success" id="transfer-etiquette__remove">Borrar Etiqueda</button>
            </div>
<!--
            <div class="form-group" style="display:none">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Porcentaje de descuento:
              </label>
              <input type="text" name="transfer_percentage" placeholder="Ejem. 20" class="form-control" id="transfer_percentage">
            </div> -->

<!--             <div class="form-group" style="display: none;">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Temporizador:
              </label>
              <select class="form-control" name="transfer_config">
                  <option value="1">No publicar La Promoción cuando termine el tiempo</option>
                  <option value="2">No publicar solo el reloj cuando termine el tiempo</option>
              </select>
              <label id="saved"></label>
              <input type="hidden" name="transfer_discount" id="transfer_discount">
            </div> -->

<!--

            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Tipo de descuento:
              </label>
              <select class="form-control" name="transfer_discount_type">
                  <option value="1">Ahorro por %</option>
                  <option value="2">Ahorro por monto</option>
              </select>
              <label id="saved"></label>
              <input type="hidden" name="transfer_discount" id="transfer_discount">
            </div> -->

            <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Fecha límite de la promoción:
              </label>
              <input type="text" name="transfer_end_at" placeholder="Fecha" class="form-control" id="transfer_date">
            </div>

          </div>
        </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="transfer__update"><i class="glyphicon glyphicon-ok u-mr2"></i>Guardar</button>
      </div>
    </div>
  </div>
</div>
