@extends('yekatex.layouts.index')
@section('content')
<div class="container mt-30 mb-30">
  <div class="row">
    <div class="col-md-4 col-sm-12 text-center">
      <a href="{{ URL::to('/orden') }}" class="btn btn-danger btn-block">01. Carrito de Compras</a>
    </div>
    <div class="col-md-4 col-sm-12 text-center">
      <a href="{{ URL::to('/orden/info') }}" class="btn btn-order">02. Confirmar</a>
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
                    <h3>Lista de Ítems</h3>
                    <form>
                        <!-- Table Content Start -->
                        <div class="table-content table-responsive">
                            <table>
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
                                  <tbody id="cart_tbody"></tbody>
                              </table>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
              <div class="your-order">
                  <h3>Mi Orden</h3>
                  <div class="your-order-table table-responsive">
                    <table>
                        <tr class="cart-subtotal">
                            <th class="text-left" style="width: 100px;">Subtotal</th>
                            <td><span class="amount text-right" id="cart_subtotal"></span></td>
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
                            <td><span class="total amount text-right" id="cart_total"></span>
                            </td>
                        </tr>
                    </table>
                  </div>
                  <div class="text-center">
                    <a href="/orden/info" class="customer-btn">CONTINUAR</a>
                  </div>
              </div>
            </div>
            <div class="col-md-5 col-sm-12">
              <div class="button-option">
                  <a href="#" class="btn-cart">Continuar Comprando </a>&emsp;
                  <a href="#" onclick="localStorage.removeItem('cart');window.location.reload();return false;" class="btn-cart">Vaciar Carrito</a>
              </div>
              <div class="shopping-cart-coupon" style="display: none;">
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
              </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('plugins-js')
<script type="text/javascript" src="/website/js/bootstrap-slider.min.js"></script>
<!-- <script type="text/javascript" src="website/js/catalog.js"></script> -->
<script type="text/javascript" src="/js/fill_cart.js"></script>
<script type="text/javascript" src="/website/js/cart.js"></script>
@stop
