@extends('miranda.layouts.index')
@section('content')
<!--  -->
<!--Contact page start-->
<div class="contact-page pt-50">
  <div class="container">
      <div class="text-center" style="font: bold 24px 'Poppins', sans-serif; margin-bottom: 20px;">Registrarme como EMPRESA</div>
      <div class="content-margin">
        <div class="row align-items-center justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12">Nombre comercial</div>
            <div class="col-md-5 col-sm-12">
                <input type="text" name="" class="form-company" id="register_name-company" value="">
                <div id="register-name-company-error" class="mensaje-error text-danger"></div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12">Razon Social</div>
            <div class="col-md-5 col-sm-12">
                <input type="text" name="" class="form-company" id="register_business-name" value="">
                <div id="register-business-name-error" class="mensaje-error text-danger"></div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12">RUC</div>
            <div class="col-md-5 col-sm-12">
                <input type="text" name="" class="form-company" id="register_ruc" value="">
                <div id="register-ruc-error" class="mensaje-error text-danger"></div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12">Direccion Fiscal</div>
            <div class="col-md-5 col-sm-12">
                <input type="text" name="" class="form-company" id="register_address" value="">
                <div id="register-address-error" class="mensaje-error text-danger"></div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12">Teléfono</div>
            <div class="col-md-5 col-sm-12">
                <input type="text" name="" class="form-company" id="register_phone" value="">
                <div id="register-phone-error" class="mensaje-error text-danger"></div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12">Email</div>
            <div class="col-md-5 col-sm-12">
                <input type="text" name="" class="form-company" id="register_email"  value="">
                <div id="register-email-error" class="mensaje-error text-danger"></div>
            </div>
        </div>
      </div>
      <br>
      <div class="text-center" style="font: bold 24px 'Poppins', sans-serif; margin-bottom: 20px;">Datos del REPRESENTANTE</div>
      <div class="content-margin">
        <div class="row align-items-center justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12">Nombre</div>
            <div class="col-md-5 col-sm-12">
                <input type="text" name="" class="form-company" id="register_user-first-name" value="">
                <div id="register-user-first-name-error" class="mensaje-error text-danger"></div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12">Apellido</div>
            <div class="col-md-5 col-sm-12">
                <input type="text" name="" class="form-company" id="register_user-last-name" value="">
                <div id="register-user-last-name-error" class="mensaje-error text-danger"></div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12">Email</div>
            <div class="col-md-5 col-sm-12">
                <input type="text" name="" class="form-company" id="register_user-email" value="">
                <div id="register-user-email-error" class="mensaje-error text-danger"></div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-2 col-sm-12">Celular</div>
            <div class="col-md-5 col-sm-12">
                <input type="text" name="" class="form-company" id="register_user-cel" value="">
                <div id="register-user-cel-error" class="mensaje-error text-danger"></div>
            </div>
        </div>
        <br>
        <div class="text-center mb-30">
          <a href="#" class="btn btn-company" id="register__save">Unirme Ahora</a>
        </div>

      </div>
  </div>
</div>
<!--  -->
@stop
@section('css')
<link rel="stylesheet" href="/admin/bootstrap-4.4/css/bootstrap-grid.css">
@stop
@section('plugins-js')
@stop
