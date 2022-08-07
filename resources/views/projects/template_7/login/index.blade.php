@extends('template_7.layouts.index')
@section('content')

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
        <button type="submit" class="btn_1" style="width: 200px;">INICIAR SESIÓN</button>
        <hr>
        <!--a class="btn btn-primary" >
            Facebook
        </a-->
        <a href="{{ route('social.auth', 'facebook') }}" class="btn social_bt facebook" style="width: 200px;">Ingresar con Facebook</a>
            
        <hr>

        <a href="/registro"  class="btn btn-success" style="width: 450px;">Si no eres cliente aún, puedes REGISTRARTE.</a>

      </center>
      {!! Form::close() !!}
    </div>
</section>

@stop
@section('pulgins-js')
<script>
  $(".windows8").hide();
</script>
@stop
