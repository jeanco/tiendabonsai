<div id="add-video" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Datos del Video</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body u-py4 row">

    		<div id="company-video-error" class="col-md-12 u-color-error u-center u-mb3"></div>

    		{!! Form::open(array('id' => 'form_company_video', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
    			<input type="hidden" id="company_video_method" name="_method" value="PUT" />
    			<input type="hidden" id="company_video_id" name="company_video_id" value="">
    			<div class="o-wrapper u-mb3">
            <div class="col-md-12 form-group">
            	<label class="control-label">
              	<i class="glyphicon glyphicon-file"></i>Título del Video:
            	</label>
            	<input type="text" class="form-control" id="company_video_content" name="company_video_name" placeholder="Ingrese el título del vídeo">
  		      	<div id="company-video-error-name" class="mensaje-error"></div>
	  	      </div>

            <div class="col-md-12 form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>URL del Video:
              </label>
              <input type="text" class="form-control" id="company_video_resource" name="company_video_link" placeholder="Copiar y pegar la dirección del vídeo aquí">
    		      <div id="company-video-error-link" class="mensaje-error"></div>
    			  </div>
          </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="company_save_video">AÑADIR VIDEO</button>
        <button type="button" class="btn btn-success" id="company_update_video">ACTUALIZAR VIDEO</button>
      </div>
    </div>
  </div>
</div>
