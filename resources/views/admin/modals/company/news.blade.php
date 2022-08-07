<div id="post-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información de la Publicación</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div id="post-error" class="col-md-12 u-mb3 u-center u-color-error titulo-error"></div>

        {!! Form::open(array('class' => 'col-md-12','id'=>'post_form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data'))
        !!}
        <input type="hidden" id="post_id" name="id" value="">
        <div class="o-wrapper u-mb4">
          <div class="form-group">
              <label class="control-label">
                <i class="glyphicon glyphicon-file"></i>Fecha de creación
              </label>
              <?php
              date_default_timezone_set('America/Lima');
                ?>
                                                <input data-date-format="yyyy-mm-dd" value="{{date('d')}}/{{date('m')}}/{{date('Y')}}" name="date" type="text" class="form-control" id="date">

            </div>

          <div class="form-group">
            <label class="control-label">Titulo: </label>
            <input class="form-control" id="post_title" name="title" placeholder="Titulo del artículo">
            <div class="mensaje-error" id="post-title-error"></div>
          </div>

          <div class="form-group">
            <label class="control-label">Categoría: </label>
            <select name="tag_id" class="form-control" id="post_tag">
            </select>
            <div class="mensaje-error" id="post-tag-error"></div>
          </div>

          <div class="form-group">
            <label class="control-label">Descripción: </label>
            <textarea rows="6" class="form-control" id="post_content" name="content" placeholder="Descripción del artículo"></textarea>
            <div class="mensaje-error" id="post-content-error"></div>
          </div>
        </div>
        {!! Form::close() !!}
        <div class="col-md-12 mbl text-center">
          <button type="button" class="btn btn-primary btn-modal" id="post__save">Guardar</button>
          <button type="button" class="btn btn-primary btn-modal" id="post__update">Actualizar</button>
          <button type="button" class="btn btn-primary btn-modal" id="post__cancel">Cancelar</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="post__cancel">Cancelar</button>
        <button type="button" class="btn btn-success" id="post__save">Guardar</button>
        <button type="button" class="btn btn-success" id="post__update">Actualizar</button>
      </div>
    </div>
  </div>
</div>
