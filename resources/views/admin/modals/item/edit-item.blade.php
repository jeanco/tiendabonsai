<div id="product-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información del Producto</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">
        <h3 class="col-md-12 text-center u-primary u-mb5 u-mt0" id="text-product-modal-title"></h3>

	      <div id="product-error" class="col-md-12 u-center u-color-error u-mb3 titulo-error"></div>

    		{!! Form::open(array('id' => 'form_product', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
    			<input type="hidden" id="product_method" name="_method" value="PUT" />
    			<input type="hidden" id="product_id" name="product_id" value="">
    			{{-- <input type="hidden" id="product_category_id" name="product_category_id" value=""> --}}

    			<div class="o-wrapper u-mb4">
            <div class="col-md-6 form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Nombre del Producto:
              </label>

              <input type="text" class="form-control" id="product_name" name="name" placeholder="Ingrese el nombre del producto">
              <div id="product-error-name" class="mensaje-error"></div>
            </div>

            <div class="col-md-6 u-pr3 form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Precio:
              </label>

              <input type="text" class="form-control" id="product_price" name="price" placeholder="Ingrese precio">
              <div id="product-error-price" class="mensaje-error"></div>
            </div>

    				<div class="col-md-6 form-group">
              {{--
              <div class="form-group">
                <label class="control-label">
                  <i class="glyphicon glyphicon-file"></i>Enlace del Video:
                </label>
                <input type="text" class="form-control" placeholder="Ingrese el enlace del video">
              </div>
              --}}
              <div class="form-group">
  			        <label class="control-label">
      				    <i class="glyphicon glyphicon-camera"></i>Ficha Técnica:
      				  </label>

      				  <div class="dropzone">
      				    <label id="product_preview_text">
      				      <i class="glyphicon glyphicon-open-file"></i>
      				      <span class="u-ml3">Añadir PDF</span>
      				    </label>
      				    <div class="dropzone_image" id="product_preview_pdf"></div>

      				    <input type="file" accept="application/pdf" name="product_pdf" class="form-control">
      				  </div>
              </div>
    				</div>

    				<div class="col-md-6 col-xs-12 form-group">
						<label class="control-label">
							<i class="glyphicon glyphicon-file"></i>Descripción:
						<label class="control-label">
							<i class="glyphicon glyphicon-file"></i>Descripción:
						</label>
						<textarea class="form-control" id="product_description" name="description" rows="10" cols="40" placeholder="Describe las condiciones y características para esta categoría."></textarea>
  			      		<div id="product-error-description" class="mensaje-error"></div>
  				  </div>
  			  </div>
        {!! Form::close() !!}

    	<div class="o-wrapper u-mb4" id="product_dropzone">
          <div class="col-md-5" id="product-info__after-save">
            <div class="u-info u-flex u-items-center u-justify-between">
              <span class="u-mr2 u-fw-bold">Producto</span>
              {{-- <button class="btn btn-success">Editar</button> --}}
            </div>

            <div class="u-info" id="product-name__after-save">
              Nombre del producto
            </div>

            <div class="u-info u-fw-bold">
              Precio
            </div>

            <div class="u-info" id="product-price__after-save">
              S/. 120
            </div>

            <div class="u-info u-fw-bold">
              Descripción
            </div>

            <div class="u-info" id="product-description__after-save">
              Descripción del producto
            </div>
          </div>
          <div class="col-md-7">
            {!! Form::open(['route'=> 'upload-product-images', 'method' => 'POST', 'files'=>'true', 'id' => 'product-dropzone' , 'class' => 'dropzone']) !!}
            {!! Form::close() !!}

			<hr>

			<div id="product-swiper-container" class="swiper-container" data-number="" style="text-align: center;">
				<div class="swiper-wrapper">
					<div class="swiper-slide">Slide 1</div>
				</div>

				<div id="product-swiper-pagination" style="display: inline-block;"></div>
				<div id="product-swiper-button-next"></div>
				<div id="product-swiper-button-prev"></div>

			</div>

          </div>
    	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="product_close">Finalizar</button>
        <button type="button" class="btn btn-success" id="product_save">Siguiente -></button>
        <button type="button" class="btn btn-success" id="product_update">Guardar</button>
      </div>
    </div>
  </div>
</div>
