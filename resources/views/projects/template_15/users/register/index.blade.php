
@extends('template_15.layouts.index')
@section('content')

		<main class="bg_gray">

	<div class="container margin_30">
		<div class="page_header">
			<!--div class="breadcrumbs">
				<ul>
					<li><a href="account.html#">Home</a></li>
					<li><a href="account.html#">Category</a></li>
					<li>Page active</li>
				</ul>
		</div-->
		<!--h1>Sign In or Create an Account</h1-->
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			{{-- <div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">Ya soy Cliente</h3>
					<div class="form_container">
						<!--div class="row no-gutters">
							<div class="col-lg-6 pr-lg-1">
								<a href="account.html#0" class="social_bt facebook">Login with Facebook</a>
							</div>
							<div class="col-lg-6 pl-lg-1">
								<a href="account.html#0" class="social_bt google">Login with Google</a>
							</div>
						</div-->
						<!--div class="divider"><span>Or</span></div-->
							@if (session()->has('data'))
								<p class="login-box-msg text-danger text-center">Nombre de usuario y/o Contraseña Incorrectas</p>
							@endif

							{!! Form::open(['class' => 'c-login__form ', 'url' => '/login-from-landing', 'method' => 'POST', 'role' => 'form']) !!}
								{{ csrf_field() }}
								<div class="form-group">
									<input type="email" class="form-control" name="username" id="email" placeholder="Email*">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" id="password_in" value="" placeholder="Password*">
								</div>

								<div class="clearfix add_bottom_15">
								<!-- <div class="checkboxes float-left">
									<label class="container_check">Remember me
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>
								</div> -->
									<!--div class="float-right"><a id="forgot" href="javascript:void(0);">Lost Password?</a></div-->
								</div>
								<div class="text-center"><input type="submit" value="Ingresar" class="btn_1 full-width"></div>
      						{!! Form::close() !!}
						<div id="forgot_pw">
							<div class="form-group">
								<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
							</div>
							<p>A new password will be sent shortly.</p>
							<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
						</div>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
				<!--div class="row">
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Find Locations</li>
							<li>Quality Location check</li>
							<li>Data Protection</li>
						</ul>
					</div>
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Secure Payments</li>
							<li>H24 Support</li>
						</ul>
					</div>
				</div-->
				<!-- /row -->
			</div> --}}
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Nuevo Usuario</h3> <small class="float-right pt-2">*Campos requeridos</small>
					<form id="new-user_form">
						{{ csrf_field() }}

					<div class="form_container">
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email_2" placeholder="Email*">
							<div class="mensaje-error" id="user-email-error"></div>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password_in_2" value="" placeholder="Contraseña*">
							<div class="mensaje-error" id="user-password-error"></div>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password_confirmation" id="" value="" placeholder="Repita la contraseña*">
							<div class="mensaje-error" id="user-password_confirmation-error"></div>
						</div>
						<hr>
						<div class="form-group">
							<label class="container_radio" style="display: inline-block; margin-right: 15px;">Persona natural
								<input type="radio" id="person" name="client_type" checked value="private">
								<span class="checkmark"></span>
							</label>
							<label class="container_radio" style="display: inline-block;">Empresa
								<input type="radio" id="company" name="client_type" value="company">
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="private box">
							<div class="row no-gutters">
								<div class="col-6 pr-1">
									<div class="form-group">
										<input type="text" name="first_name" class="form-control" placeholder="Nombres*">
										<div class="mensaje-error" id="user-first_name-error"></div>
									</div>
								</div>
								<div class="col-6 pl-1">
									<div class="form-group">
										<input type="text" name="last_name" class="form-control" placeholder="Apellidos *">
										<div class="mensaje-error" id="user-last_name-error"></div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" name="address" class="form-control" placeholder="Dirección*">
										<div class="mensaje-error" id="user-address-error"></div>
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="row no-gutters">
								<div class="col-6 pr-1">
									<div class="form-group">
										<div class="custom-select-form">
											<select class="wide add_bottom_10" name="document_type">
												<option value="1">DNI</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-6 pl-1">
									<div class="form-group">
										<input type="text" name="identity_document" class="form-control" placeholder="N° de Documento*">
										<div class="mensaje-error" id="user-identity_document-error"></div>

									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="row no-gutters">
								<div class="col-12 pr-1">
									<div class="form-group">
										<input type="number" name="cel_whatsapp" class="form-control" placeholder="Celular*">
										<div class="mensaje-error" id="user-cel_whatsapp-error"></div>
									</div>
								</div>

							</div>
							<!-- /row -->
						</div>
						<!-- /private -->
						<div class="company box" style="display: none;">
							<div class="row no-gutters">
								<div class="col-12">
									<div class="form-group">
										<input type="text" name="business_name" class="form-control" placeholder="Razon Social*">
										<div class="mensaje-error" id="user-business_name-error"></div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" name="business_address" class="form-control" placeholder="Dirección Fiscal">
										<div class="mensaje-error" id="user-business_address-error"></div>
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="row no-gutters">
								<div class="col-6 pr-1">
									<div class="form-group">
										<div class="custom-select-form">
											<select class="wide add_bottom_10" name="document_type" id="country">
													<option value="2">RUC</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-6 pl-1">
									<div class="form-group">
										<input type="text" name="business_identity_document" class="form-control" placeholder="N° de Documento*">
										<div class="mensaje-error" id="user-business_identity_document-error"></div>
									</div>
								</div>
							</div>
							<!-- /row -->

							<div class="row no-gutters">
								<div class="col-12 pr-1">
									<div class="form-group">
										<input type="text" name="business_cel_whatsapp" class="form-control" placeholder="Celular*">
										<div class="mensaje-error" id="user-business_cel_whatsapp-error"></div>
									</div>
								</div>

							</div>
							<!-- /row -->
						</div>
						<!-- /company -->
						<hr>
						<div class="form-group">
							<label class="container_check">Acepto <a href="">Términos y Condiciones</a>
								<input type="checkbox" id="user_terms">
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="text-center">
							<button class="btn_1 full-width" id="register-user__save">Registrarme</button>
							<!-- <input type="submit" value="Register" class="btn_1 full-width"></div> -->
					</div>
					</form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->


<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_15/css/account.css" rel="stylesheet">


@stop
@section('plugins-js')

<script src="/template_15/js/register_user.js"></script>

<script>
    	// Client type Panel
		$('input[name="client_type"]').on("click", function() {
		    var inputValue = $(this).attr("value");
		    var targetBox = $("." + inputValue);
		    $(".box").not(targetBox).hide();
		    $(targetBox).show();
		});
	</script>

@stop
