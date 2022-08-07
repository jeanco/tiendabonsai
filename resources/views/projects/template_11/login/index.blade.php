@extends('template_11.layouts.index')
@section('content')
<section class="contact-us">
    <div class="container py-5">
      <div class="row justify-content-md-center mx-0">
        <div class="col-md-6">
          <div class="card" style="border: none;">
            <div class="card-body px-5 py-5">
              <div class="text-center">
                <h5 class="font_bold" style="color: #6f6f6e;">¡Bienvenid@!</h5>
                <div class="clearfix mb-4"></div>
              </div>
              <p style="font-size: 13px;">Disfruta de una experiencia de compra más rápida y segura ingresando con tu cuenta.</p>
              @if (session()->has('data'))
              <p class="login-box-msg text-danger text-center">Nombre de usuario y/o Contraseña Incorrectas</p>
              @endif
              {!! Form::open(['class' => 'c-login__form ', 'url' => '/login-from-landing', 'method' => 'POST', 'role' => 'form']) !!}
              {{ csrf_field() }}
              <div class="row justify-content-md-center">
                <div class="col-md-10">
                  <div class="form-group">
                    <label class="mb-0">Usuario</label>
                    <input type="text" name="username" class="form-control" value="" placeholder="Ingrese su correo electrónico">
                  </div>
                  <div class="form-group">
                    <label class="mb-0">Contraseña</label>
                    <input type="password" name="password" class="form-control" value="" placeholder="Ingrese su contraseña">
                  </div>
                </div>
              </div>
              <div class="row justify-content-md-center">
                <div class="col-md-7">
                  <div class="text-center mb-3"><a href="#" class="link_redirecction">¿Has olvidado tu contraseña?</a></div>
                  <div class="text-center mb-3"><button type="submit" class="btn btn_login btn-block">Iniciar Sesión</button></div>
                  <div class="text-center">
                    <label class="mb-0">¿Eres nuevo aquí?</label>
                    <a href="/registro" type="submit" class="btn btn_login_outline btn-block">Crea tu cuenta</a>
                  </div>
                  <div class="text-center mt-3 d-none">
                    <label class="mb-0">Ingresar con Facebook</label>
                    <a href="{{ route('social.auth', 'facebook') }}" class="btn btn_login_outline facebook btn-block">Facebook</a>
                  </div>
                </div>
              </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


{{--
<section class="contact-us" style="margin-bottom: 30px;">
    <div class="container py-5">
      <div class="heading-sub">
          <h3 class="text-center">Iniciar Sesión</h3>
          <div class="clearfix mb-4"></div>
      </div>
      @if (session()->has('data'))
      <p class="login-box-msg text-danger text-center">Nombre de usuario y/o Contraseña Incorrectas</p>
      @endif
      {!! Form::open(['class' => 'c-login__form ', 'url' => '/login-from-landing', 'method' => 'POST', 'role' => 'form']) !!}
      {{ csrf_field() }}
      <div class="row justify-content-center align-items-center" style="margin-bottom: 20px;">
        <div class="col-md-2">Usuario</div>
        <div class="col-md-5">
          <input type="text" name="username" class="form-control" value="" placeholder="Ingrese su correo electrónico">
        </div>
      </div>
      <div class="row justify-content-center align-items-center" style="margin-bottom: 10px;">
        <div class="col-md-2">Contraseña</div>
        <div class="col-md-5"><input type="password" name="password" class="form-control" value="" placeholder="Ingrese su contraseña"></div>
      </div>
      <br>
      <center>
        <button type="submit" class="btn sales_car btn-block" style="width: 200px;">INICIAR SESIÓN</button>
        <hr>
        <a href="{{ route('social.auth', 'facebook') }}" class="btn social_bt facebook" style="width: 200px;">Ingresar con Facebook</a>
        <hr>

        <a href="/registro" type="submit" class="font-weight-bold" style="width: 200px; color: #000;">Crear Nueva Cuenta</a>
      </center>
      {!! Form::close() !!}
    </div>
</section>
--}}

@stop
@section('pulgins-js')
<script>
  $(".windows8").hide();
</script>
@stop
