<div id="coupon-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Información de los cupones</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div class="col-md-12 u-mb3 u-center u-color-error titulo-error" id="coupon_error"></div>

        {!! Form::open(array('id'=>'coupon_form','role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
        <input type="hidden" name="coupon_id" id="coupon_id" value="">

        <div class="o-wrapper u-mb4">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"><i class="glyphicon glyphicon-file"></i>Empresa</label>
              <select class="form-control u-mb3" name="company_id">
                @foreach($companies as $i => $company)
                <option value="{{ $company['id'] }}">{{ $company['name_company']  }}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Código: </label>
              <input class="form-control" name="code" id="coupon_code" placeholder="Código">
              <div class="mensaje-error" id="coupon-code-error"></div>
            </div>

            <div class="form-group">
              <label class="control-label">Descripción: </label>
              <textarea class="form-control" name="description" id="coupon_description" placeholder="Descripción"></textarea>
              <div class="mensaje-error" id="coupon-description-error"></div>
            </div>

            <div class="form-group">
              <label class="control-label">Tipo de descuento: </label>
              <select class="form-control" id="coupon_type" name="coupon_type_id">
                @foreach($coupon_types as $type)
                  <option value="{{ $type['id'] }}">{{ $type['name'] }}</option> <!--1. tipo DSCTO por Valor en % del total del carrito-->
                @endforeach                                                       <!--2. tipo DSCTO por Valor en S/ del total del carrito-->
              </select>                                                           <!--3. tipo DSCTO por Valor en % por producto-->
            </div>
            <div class="form-group">
              <label class="control-label">Monto de DSCTO: </label>
              <input class="form-control" name="amount" id="coupon_amount" placeholder="Monto del DSCTO.">
              <div class="mensaje-error" id="coupon-amount-error"></div>
            </div>

            <div class="form-group">
              <label class="control-label">Fecha de inicio: </label>
              <input class="form-control" name="start_date" id="coupon_start-date" placeholder="Fecha de inicio">
              <div class="mensaje-error" id="coupon-start-date-error"></div>
            </div>

            <div class="form-group">
              <label class="control-label">Fecha de vencimiento: </label>
              <input class="form-control" name="end_date" id="coupon_end-date" placeholder="Fecha fin">
              <div class="mensaje-error" id="coupon-end-date-error"></div>
            </div>

          </div>
          <div class="col-md-6">

          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona la sede de Origen:</label>
            <select class="form-control u-mb3" name="place_id">
            @foreach($places as $i => $place)
            <option value="{{ $place['id'] }}">{{ $place['name']  }}</option>
            @endforeach
            </select>
            <div class="mensaje-error"></div>
          </div>

            <div class="form-group">
              <label class="control-label">Compra Mínima: </label>
              <input class="form-control" name="minimum" id="coupon_minimum" placeholder="Cantidad Mínima de compra">
              <div class="mensaje-error" id="coupon-minimum-error"></div>
            </div>

            <div class="form-group">
              <label class="control-label">Compra máxima: </label>
              <input class="form-control" name="maximum" id="coupon_maximum" placeholder="Cantidad Máxima de compra">
              <div class="mensaje-error" id="coupon-maximum-error"></div>
            </div>

            <div class="form-group">
              <div class="radio">
                <input type="radio" name="radio_products" id="radio_all-products" checked="checked">
                <label for="bcp">Considerar a los siguientes productos:</label>
                <br>
                <input type="radio" name="radio_products" id="radio_without-products">
                <label for="otro_banco">Todos menos:</label>
              </div>

              <div class="form-group all-products">
                <label class="control-label">Productos: </label>
                <select class="form-control select2" name="" id="coupon_products" multiple="multiple" style="width: 100%">
                  @foreach($products as $product)
                    <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                  @endforeach
                </select>
                <label class="control-label">Todos: </label>
                <input type="checkbox" name="checkbox_all" class="form-control">
              </div>

              <div class="form-group without-products">
                <label class="control-label">Omitir los siguientes productos: </label>
                <select class="form-control select2" name="" id="coupon_not-these-products" multiple="multiple" style="width: 100%">
                  @foreach($products as $product)
                    <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                  @endforeach
                </select>
              </div>

            </div>


            <div class="form-group">
              <label class="control-label">Límite: </label>
              <input class="form-control" name="limit" id="coupon_limit" placeholder="Límite de uso">
              <div class="mensaje-error" id="coupon-limit-error"></div>
            </div>

            <div class="form-group">
              <label class="control-label">Políticas y condiciones: </label>
              <textarea class="form-control" name="conditions_policy" id="coupon_conditions-policy" placeholder="Políticas y condiciones"></textarea>
              <div class="mensaje-error" id="coupon-conditions-error"></div>
            </div>


          </div>
        </div>

        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="coupon__cancel">Cancelar</button>
        <button type="button" class="btn btn-success" id="coupon__save">Crear</button>
        <button type="button" class="btn btn-success" id="coupon__update">Guardar</button>
      </div>
    </div>
  </div>
</div>
