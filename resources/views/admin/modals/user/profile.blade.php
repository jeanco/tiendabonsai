<div id="modalProfile" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body row">
        <div class="col-md-12 text-right u-pr4">
          <button class="modal-close glyphicon glyphicon-remove" type="button" data-dismiss="modal" aria-hidden="true"></button>
        </div>

        <h3 class="col-md-12 text-center u-primary u-mb3 u-mt0">
          <b>Editar Perfil</b>
        </h3>

			<div id="profile-error" class="col-md-12 text-center titulo-error u-mb4"></div>

				{!! Form::open(array('class' => 'col-md-12', 'id' => 'form_profile', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
					<input type="hidden" name="_method" value="PUT" />
					<input type="hidden" name="profile_id" id="profile_id">

					<div class="col-md-12">
						<div class="col-md-1"></div>
						<div id="error-profile" class="col-md-10 titulo-error"></div>
						<div class="col-md-1"></div>
					</div>

					<div class="col-md-12">
						<div class="form-group col-md-6">
							<label class="control-label" for="username">
								<i class="glyphicon glyphicon-user"></i>Username:
							</label>
							{!! Form::text('username', null, array('placeholder' => 'Introduzca su DNI/RUC', 'class' => 'form-control', 'id' => 'profile_username')) !!}
							<div id="error-username-profile" class="mensaje-error"></div>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label" for="first_name">
								<i class="glyphicon glyphicon-user"></i>Nombres:
							</label>
							{!! Form::text('first_name', null, array('placeholder' => 'Introduzca su Nombre', 'class' => 'form-control', 'id' => 'profile_first_name')) !!}
							<div id="error-first-name-profile" class="mensaje-error"></div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="col-md-6 u-mb4">
							<div id="dropzone_profile" class="dropzone">
								<label id="user_preview-profile-text">
									<i class="glyphicon glyphicon-picture"></i>
									<span class="u-ml3">Añadir Foto</span>
								</label>
								<div class="dropzone_image" id="user_preview-profile-image">
								</div>
								<input type="file" accept="image/gif, image/jpeg, image/png" id="user_profile-image" name="user_image">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="last_name">
									<i class="glyphicon glyphicon-user"></i>Apellidos:
								</label>
					    	{!! Form::text('last_name', null, array('placeholder' => 'Introduzca sus Apellidos', 'class' => 'form-control', 'id' => 'profile_last_name')) !!}
					    	<div id="error-last-name-profile" class="mensaje-error"></div>
					    </div>

					    <div class="form-group">
								<label class="control-label" for="cel">
									<i class="glyphicon glyphicon-phone"></i>Celular:
								</label>
					    	{!! Form::text('cel', null, array('placeholder' => 'Introduzca su celular, si tuviese', 'class' => 'form-control', 'id' => 'profile_cel')) !!}
					    	<div id="error-cel-profile" class="mensaje-error"></div>
					    </div>

							<div class="form-group">
								<label class="control-label" for="email">
									<i class="glyphicon glyphicon-envelope"></i>E-mail:
								</label>
								{!! Form::email('email', null, array('placeholder' => 'Introduzca su E-mail', 'class' => 'form-control', 'id' => 'profile_email')) !!}
								<div id="error-email-profile" class="mensaje-error"></div>
					    </div>

					    <div class="form-group">
								<label class="control-label" for="address">
									<i class="glyphicon glyphicon-home"></i>Dirección:
								</label>
					    	{!! Form::text('address', null, array('placeholder' => 'Introduzca su Dirección', 'class' => 'form-control', 'id' => 'profile_address')) !!}
					    	<div id="error-address-profile" class="mensaje-error"></div>
					    </div>
						</div>
					</div>
					<div class="col-md-12 u-mb4 text-center u-mt4">
						<button type="button" class="btn btn-primary btn-modal" id="save-profile">Actualizar</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
