@extends('oyeepe.layouts.index')
@section('content')
<!-- Slide Section -->

<!-- Contenido -->
<div class="content-margin" style="margin-bottom: 50px;">
  <div class="text-center" style="font: bold 24px 'Poppins', sans-serif; margin-bottom: 20px;">Regístrate en Oyeepe</div>
  <div class="content-margin">
    <div class="row" style="display: flex; margin-bottom: 10px;">
        <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">DNI</div>
        <div class="col-md-10 col-sm-12">
            <input type="text" name="" class="form-control" id="register_ruc" value="">
            <div id="register-ruc-error" class="mensaje-error text-danger"></div>
        </div>
    </div>
    <div class="row" style="display: flex; margin-bottom: 10px;">
        <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Nombre</div>
        <div class="col-md-10 col-sm-12">
            <input type="text" name="" class="form-control" id="register_user-first-name" value="">
            <div id="register-user-first-name-error" class="mensaje-error text-danger"></div>
        </div>
    </div>
    <div class="row" style="display: flex; margin-bottom: 10px;">
        <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Apellido</div>
        <div class="col-md-10 col-sm-12">
            <input type="text" name="" class="form-control" id="register_user-last-name" value="">
            <div id="register-user-last-name-error" class="mensaje-error text-danger"></div>
        </div>
    </div>
    <div class="row" style="display: flex; margin-bottom: 10px;">
        <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Correo</div>
        <div class="col-md-10 col-sm-12">
            <input type="text" name="" class="form-control" id="register_user-email" value="">
            <div id="register-user-email-error" class="mensaje-error text-danger"></div>
        </div>
    </div>
    <div class="row" style="display: flex; margin-bottom: 10px;">
        <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Número de Celular</div>
        <div class="col-md-10 col-sm-12">
            <input type="text" name="" class="form-control" id="register_user-cel" value="">
            <div id="register-user-cel-error" class="mensaje-error text-danger"></div>
        </div>
    </div>
    <div class="row" style="display: flex; margin-bottom: 10px;">
        <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Contraseña</div>
        <div class="col-md-10 col-sm-12">
            <input type="password" name="" class="form-control" id="register_user-password" value="">
            <div id="register-user-password-error" class="mensaje-error text-danger"></div>
        </div>
    </div>
    <div class="row" style="display: flex; margin-bottom: 10px;">
        <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Repetir Contraseña</div>
        <div class="col-md-10 col-sm-12">
            <input type="password" name="" class="form-control" id="register_user-password-confirmation" value="">
        </div>
    </div>
    <br>
    <center><a href="#" class="btn btn-shop1" id="register-user__save">Crear cuenta</a></center>
  </div>
</div>
@stop
@section('pulgins-js')
<script src="/oyeepe/js/register_user.js"></script>
@stop
