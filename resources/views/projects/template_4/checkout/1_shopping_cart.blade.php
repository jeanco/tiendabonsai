
@extends('template_4.layouts.index')
@section('content')


	<main class="bg_gray">
		<div class="container margin_30">
			<div class="row">
				<div class="col-md-8">
					<div class="row align-items-center mb-4">
						<div class="col-md-6 font-weight-bold" style="font-size: 18px;">Mi Orden</div>
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
								<th>Precio Unit.</th>
							
								<th style="text-align: center;">Cantidad</th>
								<th>SubTotal</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="cart_tbody"></tbody>
					</table>
					<hr>
					<div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<div class="col-sm-12">
							<div class="apply-coupon">
								<span >Si tienes código de cupon, por favor, aplícalo abajo.</span>
								<div class="form-group form-inline" style="padding-top: 10px;">
									<input type="text" name="coupon-code" value="" placeholder="Código de Cupón" class="form-control"><button type="button" class="btn_1 " id="apply_coupon">Aplicar Cupón</button>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="apply-coupon">
								<div class="form-group form-inline">
									<a href="/catalogo" id="clean-cart" style="text-decoration: underline;">Limpiar Carrito</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card">
					  <div class="card-body">
					    <div class="font-weight-bold" style="font-size: 1.15rem;">RESUMEN DE TU ORDEN</div>
							<hr class="my-3">
							<div class="row justify-content-between total_checkout px-3" id="cart-subtotal">
									<span>Subtotal</span> S/0.00
							</div>
							<div class="row justify-content-between rest_checkout px-3" id="cart-discount">
									<span>Subtotal</span> S/0.00
							</div>
							<hr class="my-3">
							<div class="row justify-content-between total_checkout px-3" id="cart-total">
									<span>Subtotal</span> S/0.00
							</div>
							<hr class="my-3">
							<div class="text-center">
								<!--a href="/checkout/info" class="btn_1 full-width cart">CONTINUAR</a><br-->
								<a href="/checkout/info" id="pivot" class="btn_1 full-width cart">Continuar la compra</a>
								<div class="tooltip" id="tooltip">
										<div class="thumb">
											<img src="/template_2/img/paso_checkout.png" alt="">
										</div>
										<div class="info">
											<h4 class="titulo">Continuar la Compra</h4>
											<p class="resumen">Click aquí para registrar sus datos y realizar su Compra Segura.</p>
											<!--p class="resumen">
												La Torre Eiffel es el monumento más famoso de Paris y símbolo de la capital francesa.<br />
											</p>
											<div class="contenedor-btn">
												<button>Comprar Boletos</button>
											</div-->
										</div>
								</div>
								<a href="/catalogo">Volver al Catálogo</a>
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
    <link href="/template_4/css/cart.css" rel="stylesheet">
    <link href="/template_2/css/tooltips.css" rel="stylesheet">
@stop
@section('plugins-js')
<script type="text/javascript">

	$(`#clean-cart`).on('click', function(e){
		e.preventDefault();
	    localStorage.removeItem(`cart`);
		location.reload();
	});


	const calcularPosicionTooltip = () => {
	// Calculamos las coordenadas del icono.
	const x = icono.offsetLeft;
	const y = icono.offsetTop;

	// Calculamos el tamaño del tooltip.
	const anchoTooltip = tooltip.clientWidth;
	const altoTooltip = tooltip.clientHeight;

	// Calculamos donde posicionaremos el tooltip.
	const izquierda = x - (anchoTooltip / 2) + 15;
	const arriba = y - altoTooltip - 20;

	tooltip.style.left = `${izquierda}px`;
	tooltip.style.top = `${arriba}px`;
};

	$(document).ready(function(){

		timer = setTimeout(() => {
		tooltip.classList.add('activo');
	}, 10);
  	
});

	/*$(document).ready(function(){
  	$('[data-toggle="tooltip"]').tooltip();
});


	var element = document.getElementById('name');
element.addEventListener('mouseover', function() {
  console.log('Event triggered');
});

var event = new MouseEvent('mouseover', {
  'view': window,
  'bubbles': true,
  'cancelable': true
});

element.dispatchEvent(event);*/


</script>
<script src="/template_4/js/checkout.js"></script>
<script src="/template_2/js/tooltips.js"></script>

@stop
