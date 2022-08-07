@extends('template_8.layouts.index')
@section('content')
<div class="p-0 bg_quot">
  <!--News Section-->
  <section class="pt-5">
    <div class="auto-container">
        <!--Sec Title-->
          <div class="sec-title centered">
            <h2 style="border: none;">Solicite una cotización</h2>
          </div>
          <div class="row clearfix">
            <!--News Block-->
            <div class="col-md-4 centered">
              <a href="/cotizar" class="select_quot">1. Seleccione un vehículo</a>
            </div>
            <!--News Block-->
            <div class="col-md-4 quot_active centered">
              <span>2. Introduzca su información</span>
            </div>
            <!--News Block-->
            <div class="col-md-4 centered">
              <a href="javascript:void(0);" class="select_quot">3. Solicitud completada</a>
            </div>
          </div>
      </div>
  </section>
  <!--End News Section-->

  <!--form Section-->
  <section class="cars-comparison-section py-5">
      <div class="auto-container">
        <div class="row justify-content-md-center">
          <div class="col-md-5 centered">
            <img src="/template_8/images/hyundai/tucson.png" alt="" id="product_photo">
            <div class="car_quot_title centered mb-3" id="product_name">HYUNDAI TUCSON SUV</div>
          </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-8">
              <form class="" id="quotation_form" action="" method="">
                <!-- NOMBRES -->
                <div class="row">
                  <div class="col-md-6 mb-3"><input class="form-control" type="text" placeholder="NOMBRES" name="first_name">
                    <div class="mensaje-error text-danger" id="quotation-first_name-error"></div>
                  </div>
                  <div class="col-md-6 mb-3"><input class="form-control" type="text" placeholder="APELLIDOS" name="last_name">
                  <div class="mensaje-error text-danger" id="quotation-last_name-error"></div>
                  </div>
                </div>
                <!-- DOCUMENTOS -->
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <select class="form-control" name="document_type">
                      <option value="">DOCUMENTO</option>
                      <option value="1">DNI</option>
                      <option value="2">RUC</option>
                    </select>
                    <div class="mensaje-error text-danger" id="quotation-document_type-error"></div>
                  </div>
                  <div class="col-md-6 mb-3"><input class="form-control" type="text" placeholder="NUMERO DE DOCUMENTO" name="identity_document">
                    <div class="mensaje-error text-danger" id="quotation-identity_document-error"></div>
                  </div>
                </div>
                <!-- REGION -->
                <input type="hidden" name="country_id" value="{{ $country_id }}">
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <select class="form-control" name="city_id">
                      <option value="">DEPARTAMENTO</option>
                    </select>
                    <div class="mensaje-error text-danger" id="quotation-city_id-error"></div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <select class="form-control" name="province_id">
                      <option value="">PROVINCIA</option>
                    </select>
                    <div class="mensaje-error text-danger" id="quotation-province_id-error"></div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <select class="form-control" name="district_id">
                      <option value="">DISTRITO</option>
                    </select>
                    <div class="mensaje-error text-danger" id="quotation-district_id-error"></div>
                  </div>
                </div>
                <!-- CORREO -->
                <div class="row">
                  <div class="col-md-6 mb-3"><input class="form-control" type="text" placeholder="EMAIL" name="email">
                  <div class="mensaje-error text-danger" id="quotation-email-error"></div>

                  </div>
                  <div class="col-md-6 mb-3">
                    <input class="form-control" type="text" placeholder="CONFIRMAR EMAIL" name="email_confirmation">
                    <div class="mensaje-error text-danger" id="quotation-email_confirmation-error"></div>
                  </div>
                </div>
                <!-- CORREO -->
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <input class="form-control" type="text" placeholder="CELULAR" name="cel_whatsapp">
                    <div class="mensaje-error text-danger" id="quotation-cel_whatsapp-error"></div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <select class="form-control" name="when_purchased">
                      <option value="">LA DECISIÓN DE COMPRA LA EFECTUARÁ DENTRO DE LOS PRÓXIMOS</option>
                      <option value="1">HOY</option>
                      <option value="2">1 MES</option>
                      <option value="3">3 MESES</option>
                    </select>
                  </div>
                </div>
                <!-- CORREO -->
                <div class="row my-4">
                  <div class="col-md-6 mb-3">
                      <label for="">¿DESEAS DEJAR TU AUTO COMO PARTE DE PAGO?</label>
                      <select class="form-control" name="guarantee">
                          <option value="0">Seleccionar</option>
                          <option value="1">Si</option>
                          <option value="2">No</option>
                      </select>
                  </div>
                  <div class="col-md-6 mb-3">
                      <label for="">¿DESEAS SIMULAR EL FINANCIAMIENTO DE TU NUEVO AUTO?</label>
                      <select class="form-control" name="simulate_financing">
                          <option value="0">Seleccionar</option>
                          <option value="1">Si</option>
                          <option value="2">No</option>
                      </select>
                  </div>
                </div>
                <!-- Condiciones -->
                <div class="form-check form-check-inline mb-2">
                    <input class="form-check-input mr-2" type="checkbox" id="terminos">
                    <label class="form-check-label mr-3" for="terminos">Acepto los términos y condiciones.</label>
                    <a href="javascript:void(0);" class="quot_terms" data-toggle="modal" data-target="#terms">Ver Términos</a>
                </div>
                <div class="mb-2" style="font-weight: 400; font-size: 12px">
                  Nota: El envío de esta información implica que usted está aceptando los aspectos legales y políticas de privacidad de este sitio web.<br>
                  * Todos los campos son obligatorios
                </div>
                <div class="text-right mb-5">
                  <a href="/cotizar-finalizado" class="btn_1 px-5 py-3" id="quotation__save">REGISTRAR</a>
                </div>
              </form>
            </div>
        </div>
      </div>
  </section>
  <!--End form Section-->
</div>
<!-- Modal -->
<div id="terms" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title terms_title">Términos y Condiciones de {{ $company->name_company }}</h4>
      </div>
      <div class="modal-body px-5">
        {!! $company->terms_and_conditions  !!}
        {{--
        <p class="text-justify">
          Resultados son meramente referenciales.<br><br>
          Los datos personales que nos facilite serán incorporados a nuestra Base de Datos “Clientes y Contactos” de las empresas del Grupo Gildemeister Perú, conformado únicamente por Automotores Gildemeister Perú S.A., Maquinaria Nacional S.A. Perú y Motor Mundo S.A., con domicilio en Av. Cristóbal de Peralta Norte N° 968, Santiago de Surco, Lima, cuyo encargado es nuestro Ejecutivo de Marketing Digital y CRM, debidamente registrada de acuerdo a la Ley N° 29733, Ley de Protección de Datos Personales, con la finalidad de gestionar su solicitud de cotización para la realización de una futura compra de vehículo, si así lo desease. Para dicho efecto los datos se almacenarán, recopilarán, registrarán, organizarán, conservarán, usarán y transferirán a nivel nacional (Concesionarios Autorizados de la Red - http://hyundai.pe/red-de-atencion/),e internacional (Automotores Gildemeister Perú S.A. contrata su infraestructura virtual según un modelo de “computación en nube” a través de un servidor web, el cual se encuentra ubicado en la ciudad de Tampa /Florida – USA) , todo lo cual es necesario a fin de generar la cotización solicitada para la realización de una futura compra de vehículo, si así lo desease.<br><br>
          Adicionalmente, en cumplimiento de la Ley N° 29571, Código de Protección y Defensa del Consumidor, y de la Ley N° 29733, Ley de Protección de Datos Personales, Ud. autoriza a las empresas del Grupo Gildemeister Perú, salvo marque la casilla ubicada al término de este párrafo, de manera previa, expresa, inequívoca, libre, informada, por el plazo de diez años luego de registrados sus datos, a tratar sus datos personales para el envío de cualquier tipo de información, incluyendo la referida a promociones, comunicaciones comerciales de sus productos, servicios y cualquier otra de su interés; así como para la realización estudios de mercado sobre los productos o servicios Hyundai, a través de comunicaciones a su domicilio, correo electrónico, mensaje de texto, whatsapp, llamadas telefónicas o cualquier otro medio de difusión; así como a transferir sus datos a nivel nacional (Concesionario Autorizados de la Red - http://hyundai.pe/red-de-atencion/), e internacional a Automotores Gildemeister S.A. (Chile), Hyundai Motor Company (Seul – Corea del Sur), Facebook y Google (Atlanta - USA), Ingeniería de Software Fidelizador y Compañía Limitada, (Santiago de Chile - Chile), para los fines indicados en este párrafo.
        </p>
        --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn_1" data-dismiss="modal">VOLVER</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('plugins-css')
@stop
@section('plugins-js')
  <script src="/template_8/js/quotations.js"></script>
@stop
