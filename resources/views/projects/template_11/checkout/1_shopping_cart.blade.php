
@extends('template_11.layouts.index')
@section('content')


	<main class="bg_gray font-template">
		<div class="container margin_30">
			<div class="row">
				<div class="col-md-8">
					<div class="row align-items-center mb-4">
						<div class="col-md-6 font-weight-bold" style="font-size: 18px;">TUS PRODUCTOS SELECCIONADOS</div>
						<!--div class="col-md-6 text-right" style="display: flex; align-items: center;">
							<span>Sucursal:</span>&emsp;
							<select class="form-control" name="city_id">
								<option value="0" selected>Sucursal Tacna</option>
								<option value="1">Sucursal Ilo</option>
							</select>
						</div-->
					</div>
					<hr class="my-3">
					<!-- //////////// -->
					<table class="table table-striped cart-list">
						<thead>
							<tr>
								<th>Productos</th>
								<th>Precio</th>
								<!-- <th>DSTO.</th> -->
								<th>Cantidad</th>
								<th>SubTotal</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="cart_tbody"></tbody>
					</table>
					{{-- <div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<div class="col-sm-12">
							<div class="apply-coupon">
								<div class="form-group form-inline">
									<input type="text" name="coupon-code" value="" placeholder="Código de Cupón" class="form-control"><button type="button" class="btn_1 outline" id="apply_coupon">Aplicar Cupón</button>
								</div>
							</div>
						</div>
					</div> --}}
				</div>

				<div class="col-md-4">
					<div class="card resumen">
					  <div class="card-body">
					    <div class="font-weight-bold" style="font-size: 1.15rem;">RESUMEN DE TU PEDIDO</div>
							<hr class="my-3">
							<div class="total_checkout mb-2">CUPÓN DE DESCUENTO</div>
							<div class="row">
									<div class="col-md-6">
										<input type="text" name="coupon-code" value="" placeholder="Código de Cupón" class="form-control">
									</div>
									<div class="col-md-6">
										<button type="button" class="btn_1 outline btn-block" id="apply_coupon">APLICAR</button>
									</div>
							</div>
							
							<hr class="my-3">
							<div class="row justify-content-between total_checkout px-3" id="cart-subtotal">
									<span>Subtotal</span> S/0.00
							</div>
							<!-- <div class="row justify-content-between rest_checkout px-3" id="cart-discount">
									<span>Subtotal</span> S/0.00
							</div> -->
							<div id="cart-discount">
								<div class="row justify-content-between rest_checkout px-3">
										<span>Dscto Cupón</span> S/0.00
								</div>
								<!-- <a href="#" class="quit_cupon">Remover cupón</a> -->
							</div>
							<hr class="my-3">
							<div class="row justify-content-between total_checkout px-3" id="cart-total">
									<span>Subtotal</span> S/0.00
							</div>
							<hr class="my-3">
							<div class="text-center mb-2">
								<a href="/checkout/info" class="btn sales_car btn-block full-width cart">CONTINUAR</a>
							</div>
							<div class="text-center">
								<a href="/catalogo" class="back_catalog">Volver al Catálogo</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!--/main-->

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_11/css/cart.css" rel="stylesheet">
@stop
@section('plugins-js')

<script src="/template_11/js/checkout.js"></script>

@stop
