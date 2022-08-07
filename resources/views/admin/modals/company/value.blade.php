<div id="value-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información del Beneficio</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

    		<div id="value-error" class="col-md-12 u-mb3 u-center u-color-error titulo-error"></div>

      	{!! Form::open(array('id'=>'form_value','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
      		<input type="hidden" name="_method" id="value_method" value="PUT" />
      		<input type="hidden" name="id" id="value_id" value="">
          <div class="o-wrapper u-mb4">
            <div class="col-md-6 u-px0">
              <div class="col-md-12 form-group">
                <label class="control-label" id="">
                  <i class="glyphicon glyphicon-camera"></i>Imagen del Beneficio:
                </label>
                <div class="dropzone" id="value_container-image">
                  <div class="dropzone_image"  id="value_preview-image">
                  </div>
                  <input type="file" accept="image/jpeg, image/png" name="value_image" id="value_image" value="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Titulo: </label>
                <input class="form-control" name="title" id="value_title" placeholder="Titulo...">
                <div class="mensaje-error" id="value-error-title"></div>
    		      </div>

              <div class="form-group">
                <label class="control-label">Descripción: </label>
		            <textarea class="form-control" name="description" placeholder="Descripción..." id="value_description" rows="4" cols="40"></textarea>
              </div>
    			  </div>
          </div>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="value__save">CREAR VALOR</button>
        <button type="button" class="btn btn-success" id="value__update">EDITAR VALOR</button>
      </div>
    </div>
  </div>
</div>
