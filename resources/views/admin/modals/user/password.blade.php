<div id="miModalpassword" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade" data-backdrop="static">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-body row">
        <div class="col-md-12 text-right u-pr4">
          <button class="modal-close glyphicon glyphicon-remove" type="button" data-dismiss="modal" aria-hidden="true"></button>
        </div>

        <h3 class="col-md-12 text-center u-primary u-mb3 u-mt0">
          <b>Cambiar Contraseña</b>
        </h3>

		<div class="col-md-12 text-center u-mb4">
			<div id="password_error" class="col-md-10 titulo-error"></div>
		</div>

        {!! Form::open(array('id' => 'form_password', 'class' => 'col-md-12 ', 'role' => 'form', 'enctype' => 'multipart/form-data')) !!}

          <div class="col-md-10 phn col-md-offset-1 mbl">
            <input type="hidden" name="_method" value="PUT" />
            <input type="hidden" name="id" id="password_user-id">
            {{-- <input type="hidden" name="id_password" id ="id_password"> --}}
            {{-- <input type="hidden" name="this_user" id ="this_user" value="{{Auth::user()->id}}"> --}}

            <div class="form-group">
              <label class="control-label" for="password">
                <i class="glyphicon glyphicon-file"></i>Contraseña:
              </label>
              {!! Form::password('password', array('placeholder' => 'Introduzca una Nueva Contraseña', 'class' => 'form-control')) !!}
              <div id="error-password" class="mensaje-error"></div>
            </div>

            <div class="form-group">
              <label class="control-label" for="password_confirmation">
                <i class="glyphicon glyphicon-file"></i>Confirmar Contraseña:
              </label>

              {!! Form::password('password_confirmation', array('placeholder' => 'Repita la Nueva Contraseña', 'class' => 'form-control')) !!}
              <div id="error-password_confirmation" class="mensaje-error"></div>
            </div>
          </div>
        {!! Form::close() !!}

        <div class="col-md-12 u-mb4 text-center">
          <button type="button" class="btn btn-primary btn-modal" id="change_password">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
</div>
