<div id="post-images-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Imágenes</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
        </div>
        <div class="modal-body row">
          <input type="hidden" name="" id="post-images_post-id" value="">
          <input type="hidden" name="model_type" value="">

          <div class="col-md-2">
          </div>
          <div class="col-md-8">
            {!! Form::open(['route'=> 'upload-post-images', 'method' => 'POST', 'files'=>'true', 'id' => 'post_dropzone' , 'class' => 'dropzone']) !!}
            {!! Form::close() !!}

            <hr>

            <div id="post-gallery_swiper-container" class="swiper-container" data-number="" style="text-align: center;">
                <div class="swiper-wrapper">
                </div>

                <div id="post-gallery_swiper-pagination" style="display: inline-block;"></div>
                <div id="post-gallery_swiper-button-next"></div>
                <div id="post-gallery_swiper-button-prev"></div>
            </div>
          </div>

          <div class="col-md-2">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="post-images__cancel">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
