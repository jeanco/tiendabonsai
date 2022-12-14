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
              <li><a href="/orden" class="active" style="padding: 26px 50px 26px 65px;">01. Carrito de Compras</a></li>
              <li><a href="/orden/info" style="padding: 26px 50px 26px 65px;">02. Confirmar</a></li>
              <li><a href="/orden/pago-en-linea" title="" style="padding: 26px 50px 26px 65px;">03. Orden de Pago</a></li>
              <li><a href="#" title="" style="padding: 26px 50px 26px 65px;">04. Orden Completada</a></li>
          </ul>
          <div class="text-center hidden-sm-up">
            <a href="/orden" class="shop-bar"><i class="fas fa-cart-arrow-down fa-2x"></i></a>
            <a href="/orden/info" class="shop-bar1"><i class="fas fa-address-card fa-2x"></i></a>
            <a href="/orden/pago-en-linea" class="shop-bar1"><i class="far fa-credit-card fa-2x"></i></a>
            <a href="JavaScript:Void(0);" class="shop-bar1"><i class="far fa-thumbs-up fa-2x"></i></a>
          </div>
          <!-- ////// -->
            <div class="checkout-cart-form">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <table class="table shop_table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">IMAGEN</th>
                                    <th class="product-name">PRODUCTO</th>
                                    <th class="product-price">PRECIO</th>
                                    <th class="quantity">CANTIDAD</th>
                                    <th class="product-subtotal">TOTAL</th>
                                    <th class="product-acciones">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="cart_tbody">
                               sin datos
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="aside-shopping-cart-total">
                            <h2>TOTAL DE CARRITO</h2>
                            <ul>
                                <li><span class="text">Subtotal:</span><span class="cart-number" id="cart_subtotal">S/.0.00</span></li>
                                {{-- <li><span class="text">ENV??O:</span>
                                    <div class="shipping">
                                        <form method="get" action="http://landing.engotheme.com/search" role="search">
                                            <input type="radio" name="gender" value="Flat" id="radio1" checked="checked">
                                            <label for="radio1">NACIONAL: $12.00</label>
                                            <input type="radio" name="gender" value="Free" id="radio2">
                                            <label for="radio2">Envio Gratis</label>
                                            <input type="radio" name="gender" value="Delivery" id="radio3">
                                            <label for="radio3">INTERNACIONAL: $60.00</label>
                                            <input type="radio" name="gender" value="Local-Delivery" id="radio4">
                                            <label for="radio4">DELIVERY LOCAL: $5.00</label>
                                        </form>
                                    </div>
                                </li>
                                <li><span class="text calculate">Costo Total de Env??o</span>
                                </li>--}}
                                <li><span class="text">Total:</span><span class="cart-number big-total-number" id="cart_total">S/.0.00</span></li>
                            </ul>
                            <div class="process">
                                <a href="/orden/info"><button class="btn-checkout">CONFIRMAR COMPRA</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shopping-cart-option">
                    <div class="button-option">
                        <a href="/catalogo" class="btn-continue-shopping active">Continuar Comprando </a>
                        <a href="#" onclick="localStorage.removeItem('cart');window.location.reload();return false;" class="btn-clear">Vaciar Carrito</a>
                    </div>
                    <!--div class="shopping-cart-coupon">
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <form action="checkout-1.html#" method="POST" class="coupon-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Coupon Code">
                                        <span class="icon-coupon"></span>
                                    </div>
                                    <button type="submit" class="btn-submit"></button>
                                </form>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <a href="#" class="btn-update-cart">Actualizar</a>
                            </div>
                        </div>
                    </div-->
                </div>
            </div>
        </div>
    </section>


@stop

@section('pulgins-js')

<script type="text/javascript" src="website/js/bootstrap-slider.min.js"></script>
<!-- <script type="text/javascript" src="website/js/catalog.js"></script> -->
<script type="text/javascript" src="website/js/cart.js"></script>
@stop
