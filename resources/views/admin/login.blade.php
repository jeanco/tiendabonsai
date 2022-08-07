<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Iniciar Sesión - {{App\Company::first()->name_company}}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href="/admin/bootstrap-4.4/css/bootstrap.min.css" type="text/css" rel="stylesheet">

		<link href="{{asset('admin/css/main.css')}}" rel="stylesheet" >
		{{-- <link href="{{asset('admin/css/login.css')}}" rel="stylesheet" > --}}
		<style type="text/css">
		body {background-color: #eee!important;}
		.font_bold {font-weight: 700;}
		.link_redirecction {
			color: #495057;
			text-decoration: underline;
		}
		.link_redirecction:hover {
			color: #ff0000;
			text-decoration: underline;
		}
		.btn_login {
			background: #ff0000;
			color: #fff;
			font-weight: 700;
		}
		.btn_login:hover {color: #fff;}
		.btn_login_outline {
			border: 1px solid #ff0000;
			color: #ff0000;
			font-weight: 700;
		}
		.btn_login_outline:hover {color: #ff0000;}
		.btn_login_outline.facebook {
			border: 1px solid #1877f2;
			color: #1877f2;
		}
		.btn_login_outline.facebook:hover {color: #1877f2;}
		input {font-size: 15px!important;}
		.c-login__form {width: 100%;}
		</style>
	</head>

	<body class="c-login">

		<div class="container py-5">
			<div class="row justify-content-md-center mx-0">
				<div class="col-md-6">
					<div class="card" style="border: none;">
						<div class="card-body px-5 py-5">
							<div class="text-center">
								<h3 class="font_bold" style="color: #6f6f6e;">Panel de Administración</h3>
								<div class="clearfix mb-4"></div>
							</div>
							@if (session()->has('data'))
								<p class="login-box-msg u-color-error u-primary">{{ session()->get('data')[0] }}</p>
					  	@endif
							{!! Form::open(['class' => 'c-login__form ', 'url' => '/login', 'method' => 'POST', 'role' => 'form']) !!}
								<div class="row justify-content-md-center">
									<div class="col-md-10">
										<div class="form-group mb-2">
											<label class="mb-0">Usuario</label>
											<input type="text" name="username" class="form-control" placeholder="Ingresa tu Usuario">
										</div>
										<div class="form-group">
											<label class="mb-0">Contraseña</label>
											<input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña">
										</div>
									</div>
								</div>

								<div class="row justify-content-md-center">
									<div class="col-md-7">
										<div class="text-center mb-5"><button type="submit" class="btn btn_login btn-block">Iniciar Sesión</button></div>
									</div>
								</div>
							{!! Form::close() !!}
								<div class="text-center text-black-50">Copyright &copy {{date('Y')}} {{App\Company::first()->name_company}}. Panel Admin v2. Desarrollado por Noveltie</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		{{--
		<img class="c-login__logo" src='{{App\Company::first()->logotype_thumb}}'  style="height: 90px; margin-bottom: 0px;"/>
		<h4>Bienvenido al Panel de Administración</h4>
		@if (session()->has('data'))
			<p class="login-box-msg u-color-error u-primary">{{ session()->get('data')[0] }}</p>
  		@endif
		{!! Form::open(['class' => 'c-login__form ', 'url' => '/login', 'method' => 'POST', 'role' => 'form']) !!}
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Ingresa tu Usuario">
			</div>

			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Ingresa tu Contraseña">
			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-primary">Iniciar Sesión</button>
			</div>
		{!! Form::close() !!}
		<footer class="c-login__footer">Copyright &copy {{date('Y')}} {{App\Company::first()->name_company}}. Panel Admin v2. Desarrollado por Noveltie</footer>
		--}}

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="/admin/bootstrap-4.4/js/bootstrap.min.js"></script>
	</body>

</html>
