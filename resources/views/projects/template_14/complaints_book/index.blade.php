@extends('template_14.layouts.index')
@section('content')
<main class="font-template">
  <div class="bg_gray py-5">
    <div class="container py-3">
      <div class="mb-3 font-weight-bold" style="font-size: 2em;">Libro de Reclamaciones Virtual</div>
      <div class="mb-4 text-justify" style="font-size: 16px; line-height: 1.2;">
        ¡Hola! Si tienes cualquier consulta o requieres una atención inmediata, te invitamos a usar nuestro canal de atención: central telefónica (052) 4278794 o enviar un correo electrónico a atencionalcliente@kamasa.pe. Gracias por ayudarnos a mejorar nuestro servicio. También puedes comunicarte directamente con el representante de la marca de tu producto, puedes encontrar las centrales telefónicas en tu certificado de garantía.
      </div>
      <div class="font-weight-bold" style="font-size: 16px; line-height: 1.2;">
        Razón Social: IMPORTACIONES KAMASA EIRL<br>
        RUC: 20368346501<br>
        Dirección: Av. San Martín 331, Tacna – Tacna – Tacna
      </div>
    </div>
  </div>
  <div class="bg_white py-5">
    <div class="container">
      <form id="claim_form">
        <div class="row justify-content-between">
          <div class="col-md-5">
            <div class="mb-3" style="font-size: 1.5rem;">1. Identificación del consumidor reclamante</div>
            <div class="form-group">
              <label for="">Nombres y apellidos</label>
              <input type="text" name="full_name" class="form-control" placeholder="Nombres y apellidos">
              <div id="claim-full_name-error" class="mensaje-error"></div>
            </div>
            <div class="form-group">
              <label for="">Teléfono celular</label>
              <input type="text" name="phone" class="form-control" placeholder="Teléfono celular">
              <div id="claim-phone-error" class="mensaje-error"></div>
            </div>
            <div class="form-group">
              <label for="">Otro teléfono (opcional)</label>
              <input type="text" name="other_phone" class="form-control" placeholder="Otro teléfono">
              <div id="claim-other_phone-error" class="mensaje-error"></div>

            </div>
            <div class="form-group">
              <label for="">Dirección</label>
              <input type="text" name="address"  class="form-control" placeholder="Dirección">
              <div id="claim-address-error" class="mensaje-error"></div>

            </div>
            <div class="form-group">
              <label for="">Referencia</label>
              <input type="text" name="reference" class="form-control" placeholder="Referencia (opcional)">
            </div>
            <div class="form-group">
              <label for="">Departamento</label>
              <input type="text" name="region" class="form-control" placeholder="Departamento">
              <div id="claim-region-error" class="mensaje-error"></div>

            </div>
            <div class="form-group">
              <label for="">Provincia</label>
              <input type="text" name="province" class="form-control" placeholder="Provincia">
              <div id="claim-province-error" class="mensaje-error"></div>
            </div>
            <div class="form-group">
              <label for="">Distrito</label>
              <input type="text" name="district" class="form-control" placeholder="Distrito">
              <div id="claim-district-error" class="mensaje-error"></div>
            </div>
            <div class="form-group">
              <label for="">Tipo de documento</label>
              <input type="text" name="document_type" class="form-control" placeholder="Tipo de documento">
              <div id="claim-document_type-error" class="mensaje-error"></div>
            </div>
            <div class="form-group">
              <label for="">Número de documento</label>
              <input type="text" name="identity_document" class="form-control" placeholder="Número de documento">
              <div id="claim-identity_document-error" class="mensaje-error"></div>
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" name="email" class="form-control" placeholder="Email">
              <div id="claim-email-error" class="mensaje-error"></div>
            </div>
          </div>

          <div class="col-md-5">
            <div class="mb-3" style="font-size: 1.5rem;">2. Identificación del bien contratado</div>
            <div class="form-group">
              <label for="">Monto del bien objeto de reclamo</label>
              <input type="number" name="amount" class="form-control" placeholder="Monto del bien objeto de reclamo">
              <div id="claim-amount-error" class="mensaje-error"></div>
            </div>
            <!-- radios -->
            <div id="item_type">
              <div class="form-check-inline">
                <label class="form-check-label" for="rad_1">
                  <input type="radio" data-index="1" class="form-check-input" id="rad_1" value="option1" checked="checked">Producto
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="rad_2">
                  <input type="radio" data-index="2" class="form-check-input" id="rad_2" value="option2">Servicio
                </label>
              </div>

            </div>
            <!-- fin de radios -->
            <div class="form-group">
              <textarea class="form-control" name="description_item" rows="4" placeholder="Descripción"></textarea>
            </div>
            <div class="form-group">
              <label for="">Comprobante de pago</label>
              <input type="text" name="payment_voucher" class="form-control" placeholder="Comprobante de pago">
              <div id="claim-payment_voucher-error" class="mensaje-error"></div>
            </div>
            <div class="form-group" id="claim_type">
              <label for="">Tipo de reclamaciones</label>
              <div class="custom-control custom-radio">
                <input type="radio" data-index="1" id="rad_3" name="" class="custom-control-input" checked="checked">
                <label class="custom-control-label" for="rad_3">Reclamo</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" data-index="2" id="rad_4" name="" class="custom-control-input">
                <label class="custom-control-label" for="rad_4">Queja</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" data-index="3" id="rad_5" name="" class="custom-control-input">
                <label class="custom-control-label" for="rad_5">Consulta</label>
              </div>
            </div>
            <div class="form-group">
              <label for="">Detalle del reclamo</label>
              <textarea class="form-control" name="details" rows="4" placeholder="Descripción"></textarea>
              <div id="claim-details-error" class="mensaje-error"></div>
            </div>
            <div class="form-group">
              <label for="">Pedido del consumidor</label>
              <textarea class="form-control" name="order" rows="4" placeholder="Descripción"></textarea>
            </div>
            <div class="form-group">
              <label for="">Sobre las acciones del proveedor</label>
              <textarea class="form-control" name="about_provider" rows="4" placeholder="Descripción"></textarea>
            </div>
          </div>
        </div>
        <div class="text-center">
          <a href="#" class="btn_1" id="claim__save"><b>ENVIAR</b></a>
        </div>
      </form>
      <div class="my-4 text-justify" style="font-size: 16px; line-height: 1.2;">
        ¡Hola! Si tienes cualquier consulta o requieres una atención inmediata, te invitamos a usar nuestro canal de atención: central telefónica (052) 4278794 o enviar un correo electrónico a atencionalcliente@kamasa.pe. Gracias por ayudarnos a mejorar nuestro servicio. También puedes comunicarte directamente con el representante de la marca de tu producto, puedes encontrar las centrales telefónicas en tu certificado de garantía.
      </div>
      <div class="mb-4 text-justify" style="font-size: 16px; line-height: 1.2;">
        <b>RECLAMO:</b> Disconformidad relacionada a los productos o servicios.<br>
        <b>QUEJA:</b> Disconformidad no relacionada a los productos o servicios o malestar o descontento respecto a la atención al público.
      </div>
    </div>
  </div>
</main>
@stop
@section('plugins-css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@stop
@section('plugins-js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="/template_14/js/claims.js"></script>
@stop
