@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-origin: content-box;background-image:url( {{ isset( $gallery_company[8]->resource) ? $gallery_company[8]->resource:  ''  }})">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Carrito de Compras</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row END -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                  <a href="{{ URL::to('/orden') }}" class="btn site-button  btn-block">01. Carrito de Compras</a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href="{{ URL::to('/orden-info') }}" class="btn btn-block" id="cart_tab-confirm">02. Confirmar</a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a href="javascript:void(0);" class="btn btn-block">03. Orden Completada</a>
                </div>
            </div>
            <div class="row" style="margin-top: 25px">
                <!-- Contenido -->
                <div class="col-md-8 col-xs-12">
                    <div style="font-size: 20px; font-weight: 600; margin-bottom: 20px;">Lista de Ítems</div>
                    <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th class="product-thumbnail" width="20%">IMAGEN</th>
                                  <th class="product-name">PRODUCTO</th>
                                  <th class="product-price">PRECIO</th>
                                  <th class="quantity" width="20%">CANTIDAD</th>
                                  <th class="product-subtotal">TOTAL</th>
                                  <th class="product-acciones"></th>
                              </tr>
                          </thead>
                          <tbody id="cart_tbody">
                              {{-- <tr>
                                  <td style="vertical-align: middle;"><img src="/wings/img/blog1.jpg" class="img-thumbnail" alt="responsive image"></td>
                                  <td style="vertical-align: middle;">Capot de bus</td>
                                  <td style="vertical-align: middle;">S/. 470.00</td>
                                  <td style="vertical-align: middle;"> <input type="text" value="1" name="demo_vertical1"> </td>
                                  <td style="vertical-align: middle;">S/. 470.00</td>
                                  <td style="vertical-align: middle;"> <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-times"></i></button> </td>
                              </tr>
                              <tr>
                                  <td style="vertical-align: middle;"><img src="https://wingsautomoviles.com/wp-content/uploads/2019/06/Bitmap3.png" class="img-thumbnail" alt="responsive image"></td>
                                  <td style="vertical-align: middle;">Tubo de escape Aluminio</td>
                                  <td style="vertical-align: middle;">S/. 230.00</td>
                                  <td style="vertical-align: middle;"> <input type="text" value="2" name="demo_vertical2"> </td>
                                  <td style="vertical-align: middle;">S/. 460.00</td>
                                  <td style="vertical-align: middle;"> <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-times"></i></button> </td>
                              </tr> --}}
                          </tbody>
                      </table>
                    </div>
                </div>
                <!-- Costos -->
                <div class="col-md-4 col-xs-12">
                    <div style="background: #ececec; padding: 20px;">
                        <div class="text-center" style="font-size: 20px; font-weight: 600; margin-bottom: 20px;">Precio Calculado</div>
                        <table class="table">
                            <tr class="cart-subtotal">
                                <th class="text-left">Subtotal</th>
                                <td id="cart_subtotal">S/. 930.00</td>
                            </tr>
                            <tr class="order-total">
                                <th class="text-left">Total</th>
                                <td id="cart_total">S/. 980.00</td>
                            </tr>
                        </table>
                    </div>
                    <div style="margin-top: 25px;">
                      <a href="{{ URL::to('/orden-info') }}" class="btn site-button btn-block inactiveLink" id="cart_confirm">Siguiente</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
<link href="/wings/plugins/touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" media="all">
<style type="text/css">
td .bootstrap-touchspin .input-group-btn-vertical {
  width: 15%;
}
</style>
@stop
@section('plugins-js')
<script src="/wings/plugins/touchspin/jquery.bootstrap-touchspin.js"></script>
<script type="text/javascript">
  $("input[name='demo_vertical1']").TouchSpin({
    verticalbuttons: true
  });

  $("input[name='demo_vertical2']").TouchSpin({
    verticalbuttons: true
  });
</script>
<script src="/wings/js/cart_order.js"></script>
@stop
