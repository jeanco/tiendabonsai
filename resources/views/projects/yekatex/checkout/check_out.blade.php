@extends('yekatex.layouts.index')
@section('content')
<div class="container mt-30 mb-30">
  <div class="row">
    <div class="col-md-4 col-sm-12 text-center">
      <a href="{{ URL::to('/orden') }}" class="btn btn-order">01. Carrito de Compras</a>
    </div>
    <div class="col-md-4 col-sm-12 text-center">
      <a href="{{ URL::to('/orden/info') }}" class="btn btn-danger btn-block">02. Confirmar</a>
    </div>
    <div class="col-md-4 col-sm-12 text-center">
      <a href="javascript:void(0);" class="btn btn-order">03. Orden Completada</a>
    </div>
  </div>
</div>
<div class="checkout-area pb-100 pt-15 pb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <div class="checkbox-form mb-sm-40">
                    <h3>Detalles de facturación</h3>
                    <form>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <strong>DNI</strong>
                                  <input type="text" name="postcode" class="form-control" id="checkout_identity-document" value="">
                              </div>
                              <div class="col-md-6 col-xs-12"></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <strong>Nombres *</strong>
                                  <input type="text" name="first_name" class="form-control" id="checkout_firstname" value="">
                              </div>
                              <div class="col-md-6 col-xs-12">
                                  <strong>Apellidos *</strong>
                                  <input type="text" name="last_name" class="form-control" id="checkout_lastname" value="">
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <strong>Correo electrónico *</strong>
                                  <input type="text" name="email" class="form-control" id="checkout_email_" value="">
                              </div>
                              <div class="col-md-6 col-xs-12">
                                  <strong>Celular *</strong>
                                  <input type="text" name="phone" class="form-control" id="checkout_cel-whatsapp_" value="">
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <strong>País *</strong>
                                  <select name="CountryType" id="checkout_country" class="form-control">
                                      @foreach($countries as $key => $country)
                                          <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-6 col-xs-12">
                                  <strong>Ciudad*</strong>
                                  <select name="CountryType" id="checkout_city" class="form-control">
                                      @foreach($cities as $key => $city)
                                          <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-12">
                                  <strong>Dirección *</strong>
                                  <input type="text" name="address" class="form-control" id="checkout_address" value="">
                              </div>
                          </div>
                      </div>
                      <!-- <div class="form-group">
                          <div class="row">
                              <div class="col-md-12">
                                  <input type="checkbox" name="acc"> Create an account?
                              </div>
                          </div>
                      </div> -->
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-12">
                                  <strong>Observación</strong>
                                  <textarea name="note" id="checkout_description" tabindex="2" class="form-control form-textarea"></textarea>
                              </div>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
              <div class="your-order">
                  <h3>Mi Orden</h3>
                  <div class="your-order-table table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-name">Producto</th>
                                <th class="product-total" style="width: 30px;"></th>
                                <th class="product-total" style="width: 120px;">Total</th>
                            </tr>
                        </thead>
                        <tbody id="checkout_tbody"></tbody>
                    </table>
                    <table>
                        <tr class="cart-subtotal">
                            <th class="text-left" style="width: 100px;">Subtotal</th>
                            <td><span class="amount text-right" id="checkout_subtotal"></span></td>
                        </tr>
                        <!--tr class="cart_item">
                            <td class="product-name text-left" style="width: auto;">ENVÍO:</td>
                            <td class="product-name text-left">
                              <input class="inputcheck" id="radio1" type="checkbox" style="display: none;">
                              <label class="checkbox" for="radio1" style="font-weight: 400; text-transform: uppercase; margin-bottom: 5px;"><span><svg width="12px" height="10px" viewbox="0 0 12 10"><polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>&emsp;NACIONAL: $12.00</label>
                              <input class="inputcheck" id="radio2" type="checkbox" style="display: none;">
                              <label class="checkbox" for="radio2" style="font-weight: 400; text-transform: uppercase; margin-bottom: 5px;"><span><svg width="12px" height="10px" viewbox="0 0 12 10"><polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>&emsp;Envio Gratis</label>
                              <input class="inputcheck" id="radio3" type="checkbox" style="display: none;">
                              <label class="checkbox" for="radio3" style="font-weight: 400; text-transform: uppercase; margin-bottom: 5px;"><span><svg width="12px" height="10px" viewbox="0 0 12 10"><polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>&emsp;INTERNACIONAL: $60.00</label>
                              <input class="inputcheck" id="radio4" type="checkbox" style="display: none;">
                              <label class="checkbox" for="radio4" style="font-weight: 400; text-transform: uppercase; margin-bottom: 5px;"><span><svg width="12px" height="10px" viewbox="0 0 12 10"><polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span>&emsp;DELIVERY LOCAL: $5.00</label>
                            </td>
                        </tr-->
                        <!--tr class="cart-subtotal">
                            <th class="text-left" style="width: 100px;">Costo de envio</th>
                            <td><span class="amount text-right calculate"></span></td>
                        </tr-->
                        <tr class="order-total">
                            <th class="text-left" style="width: auto;">Total</th>
                            <td><span class="total amount text-right" id="checkout_total"></span>
                            </td>
                        </tr>
                    </table>
                  </div>
                  <div class="order-transfer clearfix">
                      <ul class="tabs">
                          @foreach($accounts as $key => $account)
                          <li data-index={{ $account['id'] }} class="payment-way-selected {{ ($key == 0) ? 'active' : '' }}">
                              <img width="20%" src="{{ $account['payment_entity']['logo'] }}">
                              <h4>{{ $account['name'] }}
                                  <span>{{-- $account['description'] --}}</span></h4>
                          </li>
                          @endforeach
                      </ul>
                  </div>
                  <div class="text-center">
                    <a href="/completado" class="customer-btn" id="checkout__save">REALIZAR PEDIDO</a>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('plugins-js')
<script type="text/javascript" src="/website/js/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="/website/js/orden_info.js"></script>
<script type="text/javascript">

axios.get(`/api/products/cart-lite?ids=${localStorage.getItem("cart")}`)
  .then((response) => {
    let _subTotal = 0,
      _content = ``;
    getElement(`#checkout_tbody`).innerHTML = ``;

    response.data.forEach((product) => {
      _subTotal += product.price * product.quantity;

      _content += `
                        <tr class="cart_item">
                            <td class="product-name text-left" style="padding-right: 10px;">${product.name}</td>
                            <td class="product-total text-left"><span class="product-quantity"> × ${product.quantity}</span></td>
                            <td class="product-total"><span class="amount text-right">S/. ${product.price}</span></td>
                        </tr>
                        `;
    });

    getElement(`#checkout_tbody`).innerHTML = _content;
    getElement(`#checkout_subtotal`).innerHTML = `S/.${_subTotal}`;
    getElement(`#checkout_total`).innerHTML = `S/.${_subTotal}`;
  });
</script>
@stop
