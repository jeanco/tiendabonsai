@extends('website.layouts.index')
@section('content')
<section class="contact-us" style="margin-bottom: 30px;">
    <div class="container">
      <div class="heading-sub">
          <h3 class="text-center">Regístrate en Tachi</h3>
          <div class="clearfix"></div>
      </div>
      <div class="row justify-content-center align-items-center" style="margin-bottom: 20px;">
          <div class="col-md-2 col-sm-12">DNI</div>
          <div class="col-md-5 col-sm-12">
              <input type="text" name="" class="form-control" id="register_ruc" value="">
              <div id="register-ruc-error" class="mensaje-error text-danger"></div>
          </div>
      </div>
      <div class="row justify-content-center align-items-center" style="margin-bottom: 20px;">
          <div class="col-md-2 col-sm-12">Nombre</div>
          <div class="col-md-5 col-sm-12">
              <input type="text" name="" class="form-control" id="register_user-first-name" value="">
              <div id="register-user-first-name-error" class="mensaje-error text-danger"></div>
          </div>
      </div>
      <div class="row justify-content-center align-items-center" style="margin-bottom: 20px;">
          <div class="col-md-2 col-sm-12">Apellido</div>
          <div class="col-md-5 col-sm-12">
              <input type="text" name="" class="form-control" id="register_user-last-name" value="">
              <div id="register-user-last-name-error" class="mensaje-error text-danger"></div>
          </div>
      </div>
      <div class="row justify-content-center align-items-center" style="margin-bottom: 20px;">
          <div class="col-md-2 col-sm-12">Correo</div>
          <div class="col-md-5 col-sm-12">
              <input type="text" name="" class="form-control" id="register_user-email" value="">
              <div id="register-user-email-error" class="mensaje-error text-danger"></div>
          </div>
      </div>
      <div class="row justify-content-center align-items-center" style="margin-bottom: 20px;">
          <div class="col-md-2 col-sm-12">Número de Celular</div>
          <div class="col-md-5 col-sm-12">
              <input type="text" name="" class="form-control" id="register_user-cel" value="">
              <div id="register-user-cel-error" class="mensaje-error text-danger"></div>
          </div>
      </div>
      <div class="row justify-content-center align-items-center" style="margin-bottom: 20px;">
          <div class="col-md-2 col-sm-12">Contraseña</div>
          <div class="col-md-5 col-sm-12">
              <input type="text" name="" class="form-control" id="register_user-password" value="">
              <div id="register-user-password-error" class="mensaje-error text-danger"></div>
          </div>
      </div>
      <div class="row justify-content-center align-items-center" style="margin-bottom: 20px;">
          <div class="col-md-2 col-sm-12">Repetir Contraseña</div>
          <div class="col-md-5 col-sm-12">
              <input type="text" name="" class="form-control" id="register_user-password-confirmation" value="">
          </div>
      </div>
      <br>
      <center>
        <a href="#" id="register-user__save" type="submit" class="btn btn-success" style="width: 200px;">Crear Nueva Cuenta</a>
      </center>
    </div>
</section>

@stop
@section('pulgins-js')
<script src="/oyeepe/js/register_user.js"></script>
<script type="text/javascript">
  $(".windows8").hide();
</script>
@stop
