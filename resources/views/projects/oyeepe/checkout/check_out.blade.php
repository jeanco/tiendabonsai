@extends('oyeepe.layouts.index')
@section('content')
<section class="checkout-page">
    <div class="container">
        <!-- Header -->
        {{--<div class="heading-sub">
            <h3 class="pull-left">Carrito de Compras</h3>
            <ul class="other-link-sub pull-right">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Compras</a></li>
                <li><a class="active" href="#">Carrito</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>--}}
        <ul class="breadcrumb hidden-sm-down">
            <li><a href="/orden" style="padding: 26px 50px 26px 65px;">01. Carrito de Compras</a></li>
            <li><a href="/orden/info" class="active" style="padding: 26px 50px 26px 65px;">02. Confirmar</a></li>
            <li><a href="/orden/pago-en-linea" title="" style="padding: 26px 50px 26px 65px;">03. Orden de Pago</a></li>
            <li><a href="#" title="" style="padding: 26px 50px 26px 65px;">04. Orden Completada</a></li>
        </ul>
        <div class="text-center hidden-sm-up">
          <a href="/orden" class="shop-bar1"><i class="fas fa-cart-arrow-down fa-2x"></i></a>
          <a href="/orden/info" class="shop-bar"><i class="fas fa-address-card fa-2x"></i></a>
          <a href="/orden/pago-en-linea" class="shop-bar1"><i class="far fa-credit-card fa-2x"></i></a>
          <a href="JavaScript:Void(0);" class="shop-bar1"><i class="far fa-thumbs-up fa-2x"></i></a>
        </div>
        <!-- ////// -->
        <div class="orders">
            <div class="row">
                <div class="col-md-7">
                    {{--<div class="login-required">
                        <p>¿Eres Cliente? CLICK <a href="#" title="" class="login">AQUÍ</a> PARA INGRESAR</p>
                        <p>¿Tiene un cupón? CLICK <a href="#" title="" class="coupon-code">AQUÍ</a> E INGRESA TU CÓDIGO</p>
                    </div>--}}
                    <div class="billing-details">
                        <div class="billing-details-heading">
                            <h2 class="billing-title">
                            Detalles de facturación
                            </h2>
                        </div>
                        <div class="billing-details-content">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>DNI</strong>
                                        <input type="text" name="postcode" class="form-control" id="checkout_identity-document" value="{{ (Auth::check()) ? \App\Customer::whereUserId(Auth::user()->id)->first()->identity_document : '' }}">
                                    </div>
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
                                    <div class="col-md-12">
                                        <strong>Nombre de la  compañía</strong>
                                        <input type="text" name="company_name" class="form-control" id="checkout_legal-name" value="">
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
                        </div>
                    </div>
                    @if(!Auth::check())
                    <input type="checkbox" name="" id="checkout_create-a-user">
                    <label>¿Desea crear un usuario?</label>
                    @endif
                    <br>
                    <div id="checkout_create-a-user-area">
                        <div class="row" style="display: flex; margin-bottom: 10px;">
                            <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Titular de línea</div>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="" class="form-control" value="" id="register_cel-holder">
                                <div id="register-cel-holder-error" class="mensaje-error text-danger"></div>
                            </div>
                        </div>
                        <div class="row" style="display: flex; margin-bottom: 10px;">
                            <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Sexo</div>
                            <div class="col-md-4 col-sm-12">
                                <select class="form-control" id="register_gender">
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                    <option value="0">Otros</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">F. Nac.</div>
                            <div class="col-md-4 col-sm-12">
                                <input type="date" name="" class="form-control" id="register_birthday" value="">
                            </div>
                        </div>
                        <div class="row" style="display: flex; margin-bottom: 10px;">
                            <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Contraseña</div>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="" class="form-control" id="register_password" value="">
                                <div id="register-password-error" class="mensaje-error text-danger"></div>
                            </div>
                        </div>
                        <div class="row" style="display: flex; margin-bottom: 10px;">
                            <div class="col-md-2 col-sm-12" style="align-items: center; display: flex;">Repetir Contraseña</div>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="" class="form-control" id="register_password-verification" value="">
                                <div id="register-password-confirmation-error" class="mensaje-error text-danger"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="aside-order">
                        <h2>SU PEDIDO</h2>
                        <table class="table table-product">
                            <thead>
                                <tr>
                                    <th>PRODUCTO</th>
                                    <th></th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody id="checkout_tbody">
                            </tbody>
                        </table>
                        <ul class="tabs-first">
                            <li><span class="text" >Subtotal:</span><span class="cart-number sub-number pull-right" id="checkout_subtotal">S/ 00.00</span></li>
                            {{--<li><span class="text">Envío:</span>
                            <div class="shipping">
                                <form action="checkout-2.html#">
                                    <input type="radio" name="gender" value="Flat" id="radio1" checked="checked">
                                    <label for="radio1">NACIONAL: <span class="shipping-number">$12.00</span></label>
                                    <input type="radio" name="gender" value="Free" id="radio2">
                                    <label for="radio2">Envio Gratis</label>
                                    <input type="radio" name="gender" value="Delivery" id="radio3">
                                    <label for="radio3">INTERNACIONAL: <span class="shipping-number">$60.00</span></label>
                                    <input type="radio" name="gender" value="Local-Delivery" id="radio4">
                                    <label for="radio4">DELIVERY LOCAL: <span class="shipping-number indent">$5.00</span></label>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </li>--}}
                        <li><span class="text" >Total:</span><span class="cart-number big-total-number pull-right" id="checkout_total">S/ 00.00</span></li>
                    </ul>
                    <div class="order-transfer clearfix">
                        <ul class="tabs">
                            @foreach($accounts as $key => $account)
                            <li class="{{ ($key == 0) ? 'active' : '' }} payment-way-selected" data-index="{{ $account['id'] }}">
                                <img width="90%" src="{{ $account['payment_entity']['logo'] }}">
                                <h4>{{ $account['name'] }}
                                <span>{{-- $account['description'] --}}</span></h4>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="/completado" type="submit" id="checkout__save" class="btn-order" style="text-align: center;">realizar pedido</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@stop
@section('pulgins-js')
<script type="text/javascript" src="/website/js/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="/oyeepe/js/orden_info.js"></script>
@stop
