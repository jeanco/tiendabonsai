@extends('antofagasta.layouts.index')
@section('content')
<div class="contact-page">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-10 col-12">
              <div class="contact-list-inner" style="padding: 20px 50px;">
                <span style="font-size: 17px; line-height: 24px">Contamos con un gran equipo de trabajo, el cual se encargará de optimizar la gestión de venta o arriendo de su propiedad. Es necesario que se complete correctamente la siguiente plantilla de especificaciones para una correcta publicación de su Propiedad. Favor de enviar la plantilla completa junto con las respectivas imágenes email: propiedades@antofagasta.cl</span>
                <form>
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-6 form-group">
                      <label>Plantilla de especificaciones</label><br>
                      <button type="button" class="btn">Descargar</button>
                    </div>
                    {{--
                    <div class="col-6 form-group">
                      <label>Suba su plantilla</label>
                      <input type="file" class="form-control-file">
                    </div>
                    --}}
                  </div>
                </form>
              </div>
          </div>
      </div>
      <div class="leave-message">
          <div class="row justify-content-center">
              <div class="col-lg-8 col-12">
                  <div class="contact-form-inner">
                      <div class="contact-form-title">
                          <h5 style="font-weight: 700;">Formulario de datos</h5>
                      </div>
                      {{-- <form> --}}
                        <input id="contact_name" type="text" placeholder="Nombre">
                        <div id="contact-error-name" class="mensaje-error text-danger"></div>
                        <input id="contact_email" type="text" placeholder="Correo Electrónico">
                        <div id="contact-error-email" class="mensaje-error text-danger"></div>
                        <input id="contact_cellphone" type="text" placeholder="Teléfono">
                        <div id="contact-error-cellphone" class="mensaje-error text-danger"></div>
                        <input id="contact_subject" type="hidden" placeholder="Nombre" value="Confíenos su propiedad">
                        <textarea id="contact_msg" placeholder="Comentario"></textarea>
                        <div id="contact-error-msg" class="mensaje-error text-danger"></div>
                        <div class="form-submit">
                            <button type="button" id="contact__send">Enviar</button>
                        </div>
                        <p class="form-messege"></p>
                      {{-- </form> --}}
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
@stop
@section('plugins-js')
<script type="text/javascript" src="website/js/contact.js"></script>
@stop
