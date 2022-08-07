<div id="new-gallery" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información de Galería</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
        </div>
        <div class="modal-body row">

          <div class="col-md-12 u-mb3 u-center u-color-error titulo-error"></div>
        {!! Form::open(array('id'=>'gallery_form','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}

          <input type="hidden" name="" id="gallery_id">
          <div class="col-xs-10 u-px0 col-xs-offset-1 u-mb4">
            <div class="col-md-6 u-px0">
              <div class="col-md-12 form-group">
                <label class="control-label" id="">
                  <i class="glyphicon glyphicon-camera"></i>Suba una Imagen: (450x450px, Max 2MB)
                </label>
                <div class="dropzone" id="gallery_image-container">
                  <label style="text-align: center;" id="gallery_preview-text-image">
                    <i class="glyphicon glyphicon-picture"></i>
                    <span class="u-ml3">Añadir Imágen</span>
                  </label>
                  <div class="dropzone_image" id="gallery_preview-image">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" name="image" value="">
                </div>
                <!-- <div class="mensaje-error" id="evidence-image-error"></div> -->
              </div>
            </div>

            <div class="col-md-6 u-px0">
              <div class="form-group">
                <label class="control-label">Título: </label>
                <input type="text" placeholder="Ingrese un título" name="title" class="form-control" id="gallery_title">
                <div class="mensaje-error u-color-error" id="gallery-title-error"></div>
              </div>

              <div class="form-group">
                <label class="control-label">Descripción: </label>
                <textarea placeholder="Ingrese una descripción" name="description" class="form-control" id="gallery_description"></textarea>
              </div>

              <div class="form-group">
                <label class="control-label">Categoría: </label>
                <select class="form-control" name="category_id" id="gallery_category">
                </select>
              </div>

              <div class="form-group">
                <label class="control-label">Enlace: </label>
                <input type="text" placeholder="Ingrese la URL" name="link" class="form-control" id="gallery_link">
                <div class="mensaje-error u-color-error" id="gallery-link-error"></div>
              </div>
            </div>

            {!! Form::close() !!}

            <div class="col-md-12 form-group">


        <div class="tab-wrapper row u-px3" id="multi_fotos">
            <h3 class="text-center u-tertiary"> <span id="ok">Galería de Fotos</span>  </h3>



            <div class="col-md-12 u-mb4">


                {!! Form::open(['route'=> 'upload-gallery-images', 'method' => 'POST', 'files'=>'true', 'id' => 'gallery-dropzone' , 'class' => 'dropzone']) !!}
                {!! Form::close() !!}
                <hr>


                <div id="gallery_swiper-container" class="swiper-container" data-number="" style="text-align: center;">
                    <div class="swiper-wrapper">
                    </div>

                    <div id="gallery_swiper-pagination" style="display: inline-block;"></div>
                    <div id="gallery_swiper-button-next"></div>
                    <div id="gallery_swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="gallery__close">Cerrar</button>
          <button type="button" class="btn btn-success" id="gallery__save">Crear</button>
          <button type="button" class="btn btn-success" id="gallery__update">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
