<div id="order-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Detalle de Pedido</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body u-px4 row">

        <input type="hidden" id="order_id" value="">
        <input type="hidden" name="order-code" id="input_order-code" value="">

        <div class="col-xs-12 u-flex u-justify-between">
          <h3 class='u-mt0'>
            <span class='u-color-text u-fw-regular'></span>
            <b class='u-color-primary' id="order_code">OP - 001</b>
          </h3>

          <p class='u-flex u-items-center' id="order_date">
            <i class='glyphicon glyphicon-calendar u-color-primary u-mr2'></i>
            20-12-2016
          </p>
        </div>

        <div class="col-md-12">
          <div class="col-md-6">
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2' id="document_type">Documento de identidad:</span>
              <p class='u-color-text u-mb0' id="order_customer-document">72147634</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2">
              <span class='u-mr2' id="customer_type">Cliente:</span>
              <p class='u-color-text u-mb0' id="order_customer-name">Alex Brandtner</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2">
              <span class='u-mr2'>Celular:</span>
              <p class='u-color-text u-mb0' id="order_customer-cel">952 232 123</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2'>Email:</span>
              <p class='u-color-text u-mb0' id="order_customer-email">something@outlook.com</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="display:none;">
              <span class='u-mr2'>Fecha de cumplea??os:</span>
              <p class='u-color-text u-mb0' id="order_customer-birthday"></p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2'>Procedencia:</span>
              <p class='u-color-text u-mb0' id="order_customer-origin">Tacna - Per??</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2'>Direcci??n:</span>
              <p class='u-color-text u-mb0' id="order_customer-address">Asoc. Villa Hermosa</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2'>Descripci??n:</span>
              <p class='u-color-text u-mb0' id="order_customer-description">Asoc. Villa Hermosa</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2'>Tipo de recomendaci??n:</span>
              <p class='u-color-text u-mb0' id="order_type-recommendation"></p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2'>La desici??n de compra la efectuar?? dentro de los pr??ximos:</span>
              <p class='u-color-text u-mb0' id="order_when-purchased"></p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2'>??Deseas dejar tu auto como parte de pago?:</span>
              <p class='u-color-text u-mb0' id="order_guarantee"></p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2'>??Deseas simular el financiamiento de tu nuevo auto?:</span>
              <p class='u-color-text u-mb0' id="order_simulate-financing"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2">
              <p class='u-color-text u-mb0' id="order_is-separated" style="font-style: italic; color: red;"></p>
              <p class='u-color-text u-mb0' id="order_advance-to-pay" style="font-style: italic; color: red;"></p>
            </div>

            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2'>Forma de pago seleccionado:</span>
              <p class='u-color-text u-mb0' id="order_payment-way">Dep??sito</p>
              <p class='u-color-text u-mb0' id="order_account-name">Banco BCP</p>
            </div>

            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2 with-invoice" style="">
              <span class='u-mr2'>RUC:</span>
              <p class='u-color-text u-mb0' id="order_business-document">45354</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2 with-invoice" style="">
              <span class='u-mr2'>Raz??n Social:</span>
              <p class='u-color-text u-mb0' id="order_business-name">Company Name</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2 with-invoice" style="">
              <span class='u-mr2'>Direcci??n Fiscal:</span>
              <p class='u-color-text u-mb0' id="order_business-address">Direcci??n Fiscal</p>
            </div>
          </div>
        </div>

        <div class="col-md-12" id="alternative_direction">
          <h3>Datos de envio</h3>
          <div class="col-md-6">
            {{--
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2' id="document_type">Documento de identidad:</span>
              <p class='u-color-text u-mb0' id="alternative-document">72147634</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2">
              <span class='u-mr2' id="customer_type">Cliente:</span>
              <p class='u-color-text u-mb0' id="alternative-name">Alex Brandtner</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2">
              <span class='u-mr2'>Celular:</span>
              <p class='u-color-text u-mb0' id="alternative-cel">952 232 123</p>
            </div>
            --}}
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
              <span class='u-mr2'>Direcci??n:</span>
              <p class='u-color-text u-mb0' id="alternative-address">Asoc. Villa Hermosa</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
                <span class='u-mr2'>Referencia:</span>
                <p class='u-color-text u-mb0' id="alternative-reference">Referencia</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
                <span class='u-mr2'>Referencia Adicional:</span>
                <p class='u-color-text u-mb0' id="alternative-reference-additional"></p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
                <span class='u-mr2'>Pa??s:</span>
                <p class='u-color-text u-mb0' id="alternative-country">Pa??s</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
                <span class='u-mr2'>Ciudad:</span>
                <p class='u-color-text u-mb0' id="alternative-city">Ciudad</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
                <span class='u-mr2'>Provincia:</span>
                <p class='u-color-text u-mb0' id="alternative-province">Provincia</p>
            </div>
            <div class="col-xs-12 u-flex u-flex-wrap u-line-1 u-mb2 u-fz-h2" style="">
                <span class='u-mr2'>Distrito:</span>
                <p class='u-color-text u-mb0' id="alternative-district">Distrito</p>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <hr>
        </div>

        <div class="table-responsive col-xs-12 u-mb4">
          <table class='c-table-order'>
            <thead>
              <tr class='u-color-primary'>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Precio Unit.</th>
                <th>Descuento</th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody id="order_product-detail">
            </tbody>
          </table>
        </div>

        <div class="col-xs-12 u-mb3">
          <div class="col-md-6 col-xs-12 u-mb3 pull-right">
            <table>
              <tr>
                <td class="u-fz-h2">
                  CANTIDAD:
                </td>
                <td class="u-fz-h1 u-fw-bold u-pl3" id="order_total-quantity">
                  10
                </td>
              </tr>

              <tr>
                <td class="u-fz-h2 u-right-align">
                  TOTAL:
                </td>
                <td class="u-fz-h1 u-fw-bold u-pl3" id="order_total-price">
                </td>
              </tr>
<!--               <tr>
                <td class="u-fz-h2 u-right-align" style="color:red; font-size:16px">
                  *Costo de Env??o en Tacna: S/. 20 Soles adicional
                </td>
              </tr> -->

            </table>
          </div>
        </div>

        <div class="col-xs-12 u-mb3">
           <a href="" id="order__see-pdf" target="_blank" class="btn btn-success" id="order_send-email">Ver Pdf</a>
           <button class="btn btn-success" id="order_send-email" style="display: none;">Enviar Email</button>
        </div>

        <div class="col-xs-12 u-mb3" style="display: none;">
          <textarea style="width: 100%;" name="" id="order_message"  rows="3" placeholder="Escriba el mensaje para env??ar al cliente">
          </textarea>
        </div>

        <!-- <div class="col-xs-12 u-center">
          <button class="btn btn-success btn-modal u-uppercase u-fw-s-bold u-mb3 u-mr2" id="order__confirm">
            <i class="glyphicon glyphicon-ok u-mr2"></i>Confirmar
          </button>

          <button class="btn btn-danger btn-modal u-uppercase u-fw-s-bold u-mb3 u-mr2" id="order__cancel">
            <i class="glyphicon glyphicon-remove u-mr2"></i>Cancelar
          </button>
          <button class="btn btn-info btn-modal u-uppercase u-fw-s-bold u-mb3 u-mr2" data-dismiss="modal">
            Cerrar
          </button>
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" id="order__cancel"><i class="glyphicon glyphicon-remove u-mr2"></i>Cancelar</button>
        <button type="button" class="btn btn-success" id="order__confirm"><i class="glyphicon glyphicon-ok u-mr2"></i>Confirmar</button>
      </div>
    </div>
  </div>
</div>
