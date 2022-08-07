@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-origin: content-box;background-image:url( {{ isset( $gallery_company[8]->resource) ? $gallery_company[8]->resource:  ''  }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Confirmar Orden</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row END -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                  <a href="{{ URL::to('/orden') }}" class="btn btn-block">01. Carrito de Compras</a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href="{{ URL::to('/orden-info') }}" class="btn site-button btn-block">02. Confirmar</a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href="javascript:void(0);" class="btn btn-block">03. Orden Completada</a>
                </div>
            </div>
            <div class="row" style="margin-top: 25px">
                <!-- Contenido -->
                <div class="col-md-8 col-xs-12">
                    <div style="font-size: 20px; font-weight: 600; margin-bottom: 20px;">Información de Cliente</div>
                    <form>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <strong>DNI</strong>
                                  <input type="text" name="postcode" class="form-control" id="checkout_identity-document" value="">
                                  <div id="checkout-identity-document-error" class="mensaje-error text-danger"></div>
                              </div>
                              <div class="col-md-6 col-xs-12"></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <strong>Nombres *</strong>
                                  <input type="text" name="first_name" class="form-control" id="checkout_firstname" value="">
                                  <div id="checkout-first-name-error" class="mensaje-error text-danger"></div>
                              </div>
                              <div class="col-md-6 col-xs-12">
                                  <strong>Apellidos *</strong>
                                  <input type="text" name="last_name" class="form-control" id="checkout_lastname" value="">
                                  <div id="checkout-last-name-error" class="mensaje-error text-danger"></div>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <strong>Correo electrónico *</strong>
                                  <input type="text" name="email" class="form-control" id="checkout_email_" value="">
                                  <div id="checkout-email-error" class="mensaje-error text-danger"></div>
                              </div>
                              <div class="col-md-6 col-xs-12">
                                  <strong>Celular *</strong>
                                  <input type="text" name="phone" class="form-control" id="checkout_cel-whatsapp_" value="">
                                  <div id="checkout-cel-whatsapp-error" class="mensaje-error text-danger"></div>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-6 col-xs-12">
                                  <strong>País *</strong>
                                  <select name="" id="checkout_country" class="form-control">
                                      @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-6 col-xs-12">
                                  <strong>Ciudad*</strong>
                                  <select name="" id="checkout_city" class="form-control">
                                      <option value="1">Tacna</option>
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
                <!-- Costos -->
                <div class="col-md-4 col-xs-12">
                  <div style="background: #ececec; padding: 20px;">
                      <div class="text-center" style="font-size: 20px; font-weight: 600; margin-bottom: 20px;">Items</div>
                      <table class="table" id="checkout_table" style="font-size: 12px;">
                          {{-- <tr class="cart-subtotal">
                              <th class="text-left">Capot de bus</th>
                              <td>x1</td>
                              <td>S/. 470.00</td>
                          </tr>
                          <tr class="cart-subtotal">
                              <th class="text-left">Tubo de escape Aluminio	</th>
                              <td>x2</td>
                              <td>S/. 460.00</td>
                          </tr> --}}
                      </table>
                      <div class="text-center" style="font-size: 20px; font-weight: 600; margin-bottom: 20px;">Precio Calculado</div>
                      <table class="table">
                          <tr class="cart-subtotal">
                              <th class="text-left">Subtotal</th>
                              <td id="checkout_subtotal">S/. 930.00</td>
                          </tr>
                          <tr class="order-total">
                              <th class="text-left">Total</th>
                              <td id="checkout_total">S/. 980.00</td>
                          </tr>
                      </table>
                  </div>
                  <div style="margin-top: 25px;">
                    <a href="{{ URL::to('/win-confirmacion') }}" id="checkout__save" class="btn site-button btn-block" id="">Comprar</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
    <script src="/wings/js/info_order.js"></script>
@stop
