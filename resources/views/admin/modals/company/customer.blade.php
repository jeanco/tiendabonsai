<div id="customer-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información del Cliente</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div class="col-md-12 u-mb3 u-center u-color-error titulo-error" id="customer_error"></div>

        {!! Form::open(array('id'=>'customer_form','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
        <input type="hidden" name="customer_id" id="customer_id" value="">


        <section class="project-tab">
          <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_1">Datos Personales</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_2">Otros datos</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane container active" id="tab_1">
                <div class="row" style="padding-top: 25px; width: 75%;">

                  <div class="col-md-6">
                    <div class="form-group" style="display:none;">
                      <label class="control-label">Tipo: </label>
                      <select class="form-control" id="customer_type" name="customer_type">
                        <option value="1">Persona</option>
                        <option value="2">Empresa</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="control-label customer_type-1">Documento de identidad: </label>
                      <label class="control-label customer_type-2">RUC: </label>
                      <input class="form-control" name="identity_document" id="customer_document" placeholder="Documento">
                      <div class="mensaje-error" id="customer-document-error"></div>
                    </div>

                    <div class="form-group customer_type-2">
                      <label class="control-label">Razón social: </label>
                      <input class="form-control" name="legal_name" id="customer_legal-name" placeholder="Razon social...">
                      <div class="mensaje-error" id="customer-error_legal-name"></div>
                      <div class="mensaje-error" id="customer-legalname-error"></div>
                    </div>

                    <div class="form-group customer_type-1">
                      <label class="control-label">Nombres: </label>
                      <input class="form-control" name="first_name" id="customer_firstname" placeholder="Nombres...">
                      <div class="mensaje-error" id="customer-firstname-error"></div>
                    </div>

                    <div class="form-group customer_type-1">
                      <label class="control-label">Apellidos: </label>
                      <input class="form-control" name="last_name" id="customer_lastname" placeholder="Apellidos...">
                      <div class="mensaje-error" id="customer-lastname-error"></div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Email: </label>
                      <input class="form-control" name="email" placeholder="Email..." id="customer_email">
                      <div class="mensaje-error" id="customer-email-error"></div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Cel: </label>
                      <input class="form-control" name="cel_whatsapp" id="customer_cel" placeholder="Celular...">
                    </div>

                    <div class="form-group">
                      <label class="control-label">Facebook: </label>
                      <input class="form-control" name="facebook" id="customer_facebook" placeholder="Facebook...">
                    </div>

                    <div class="form-group">
                      <label class="control-label">Dirección: </label>
                      <input class="form-control" name="address" id="customer_address" placeholder="Dirección...">
                    </div>

                    <div class="form-group">
                      <label class="control-label">Pais: </label>
                      <select name="country_id" class="form-control" id="customer_country">
                        <option value="">Seleccione País</option>
                      </select>
                      <div class="mensaje-error" id="customer-country-error"></div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Ciudad: </label>
                      <select name="city_id" class="form-control" id="customer_city">
                        <option value="">Seleccione ciudad</option>
                      </select>
                      <div class="mensaje-error" id="customer-city-error"></div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Fecha de nacimiento: </label>
                      <input type="text" name="birthday" class="form-control" id="customer_birthday" placeholder="Ejemplo: 25/05/1991">
                    </div>
                  </div>

                </div>
              </div>
              <div class="tab-pane container fade" id="tab_2">
                <div class="row" style="padding-top: 25px; width: 75%;">
                  <div class="col-md-12">

                     <div class="form-group">
                      <label class="control-label">Certificado 1: </label>
                      <input type="file" class="form-control" name="certificate_one" placeholder="">
                      <a href="" id="certificate_one">Certificado 1</a>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Certificado 2: </label>
                      <input type="file" class="form-control" name="certificate_two" placeholder="">
                      <a href="" id="certificate_two">Certificado 2</a>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Certificado 3: </label>
                      <input type="file" class="form-control" name="certificate_three" placeholder="">
                      <a href="" id="certificate_three">Certificado 3</a>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Certificado 4: </label>
                      <input type="file" class="form-control" name="certificate_four" placeholder="">
                      <a href="" id="certificate_four">Certificado 4</a>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Certificado 5: </label>
                      <input type="file" class="form-control" name="certificate_five" placeholder="">
                      <a href="" id="certificate_five">Certificado 5</a>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Certificado 6: </label>
                      <input type="file" class="form-control" name="certificate_six" placeholder="">
                      <a href="" id="certificate_six">Certificado 6</a>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Certificado 7: </label>
                      <input type="file" class="form-control" name="certificate_seven" placeholder="">
                      <a href="" id="certificate_seven">Certificado 7</a>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Certificado 8: </label>
                      <input type="file" class="form-control" name="certificate_eight" placeholder="">
                      <a href="" id="certificate_eight">Certificado 8</a>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Certificado 9: </label>
                      <input type="file" class="form-control" name="certificate_nine" placeholder="">
                      <a href="" id="certificate_nine">Certificado 9</a>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Certificado 9: </label>
                      <input type="file" class="form-control" name="certificate_ten" placeholder="">
                      <a href="" id="certificate_ten">Certificado 9</a>
                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>

        </section>

        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="customer__cancel">Cancelar</button>
        <button type="button" class="btn btn-success" id="customer__save">Crear</button>
        <button type="button" class="btn btn-success" id="customer__update">Guardar</button>
      </div>
    </div>
  </div>
</div>
