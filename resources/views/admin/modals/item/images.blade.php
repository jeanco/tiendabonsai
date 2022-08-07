<div id="product-images-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Imágenes del Producto</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <input type="hidden" name="" id="images_product-id">
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
            <label for="">Tipo</label>
            <select name="gallery_type_id" id="product_gallery-type">
                @foreach ($gallery_types as $type)
                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <br>
            {!! Form::open(['route'=> 'upload-product-images', 'method' => 'POST', 'files'=>'true', 'id' => 'product_dropzone' ,
            'class' => 'dropzone']) !!}
            {!! Form::close() !!}
            <hr>
            <div id="product-swiper-container" class="swiper-container" data-number style="text-align: center;">
              <div class="swiper-wrapper">
              </div>

              <div id="product-swiper-pagination" style="display: inline-block;"></div>
              <div id="product-swiper-button-next" class="swiper-button-next"></div>
              <div id="product-swiper-button-prev" class="swiper-button-prev"></div>
            </div>


          </div>
          <div class="col-md-2"></div>
        </div>

      </div>

      <div class="modal-footer">
        <button onclick="updateProductGrid()" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
