@extends('miranda.layouts.index')
@section('content')
<!--Breadcrumbs start-->
<div class="breadcrumbs overlay-black">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs-inner">
          <div class="breadcrumbs-title text-center">
            <h1>Contactos</h1>
          </div>
          <div class="breadcrumbs-menu sm-none"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Breadcrumbs end-->
<!--Contact page start-->
<div class="contact-page pt-130">
  <div class="container">
    <div class="row align-items-center mb-4">
      <div class="col-md-6 col-sm-12">
        <div class="row mb-4">
          <div class="col-12">
            <img src="/miranda/img/icon/c-4.png" alt="">&emsp;
            <span style="font-size: 16px;">{{ $company_main->address }}</span>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-12">
            <img src="/miranda/img/icon/c-5.png" alt="">&emsp;
            <span style="font-size: 16px;">{{ $company_main->phone }}</span>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-12">
            <img src="/miranda/img/icon/c-6.png" alt="">&emsp;
            <span style="font-size: 16px;">{{ $company_main->email }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="contact-form text-center">
          <div class="text-uppercase font-weight-bold" style="font-size: 20px;">Contactar</div>
          <div class="mb-4" style="font-size: 16px;">Miranda a su servicio</div>
          <div class="mb-2"><input class="contact-input form-control" id="contact_name" type="text" placeholder="Ingrese su Nombre">
          <div id="contact-error-name" class="mensaje-error text-danger"></div>
        </div>
        <div class="mb-2"><input class="contact-input form-control" id="contact_email" type="text" placeholder="Ingrese su Correo Electrónico">
        <div id="contact-error-email" class="mensaje-error text-danger"></div>
        </div>
        <div class="mb-2"><input class="contact-input form-control" id="contact_cellphone" type="text" placeholder="Ingrese su Número Celular">
        <div id="contact-error-cellphone" class="mensaje-error text-danger"></div>
        </div>
        <div class="mb-2"><input class="contact-input form-control" id="contact_subject" type="text" placeholder="Ingrese el asunto">
        <div id="contact-error-subject" class="mensaje-error text-danger"></div>
        </div>
        <div class="mb-3"><textarea class="contact-input form-control" id="contact_msg" rows="3" placeholder="Ingrese el mensaje"></textarea>
        <div id="contact-error-msg" class="mensaje-error text-danger"></div>
        </div>
        <div class="text-right">
          <button type="button" class="btn btn-contact" id="contact__send">ENVIAR</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--Contact page end-->
@stop
@section('plugins-js')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj9b_nyz33KEaocu6ZOXRgqwwUZkDVEAw"></script>
<script src="/miranda/js/map.js"></script>
<script src="/miranda/js/map-2.js"></script>
<script type="text/javascript" src="website/js/contact.js"></script>
@stop
