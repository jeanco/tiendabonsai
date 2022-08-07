
@extends('template_13.layouts.index')
@section('content')


	<main class="bg_gray">
		<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="/">Inicio</a></li>
					<!--li>Carrito de compras</li-->
					<li>Carrito de compras</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-9">
					<!--h1>Carrito de Compras</h1-->
					<h1>Carrito de compras</h1>
				</div>

					<div class="col-md-3 form-group">
									<label>Sucursal</label>
									<div class="custom-select-form">
										<select class="wide add_bottom_5" name="place_id">
		                                	@foreach($places as $key => $place)

		                                		@if($place['id'] == $place_selected)
													<option value="{{ $place['id'] }}" selected="selected">{{ $place['name'] }}</option>
		                                		@else
													<option value="{{ $place['id'] }}">{{ $place['name'] }}</option>
		                                		@endif


		                                	@endforeach
										</select>

									</div>
									<div style="font-size: 11px;background: #d3fed3;   padding: 5px;"><span style="font-weight: bold;" >Nota: </span>Puede seleccionar la sucursal que esta más cerca a su ubicación para visualizar el precio sugerido.</div>

								</div>

			</div>


		</div>
		<!-- /page_header -->
		<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th>
										Productos
									</th>
									<th>
										Precio Unit.
									</th>
									<th >
										DSTO.
									</th>
									<th>
										Cantidad
									</th>
									<th>
										SubTotal
									</th>
									<th>

									</th>
								</tr>
							</thead>
							<tbody id="cart_tbody">
								{{--
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="/template_13/img/products/product_placeholder_square_small.jpg" data-src="/template_13/img/products/shoes/1.jpg" class="lazy" alt="Image">
										</div>
										<span class="item_cart">Armor Air x Fear</span>
									</td>
									<td>
										<strong>$140.00</strong>
									</td>
									<td>
										<div class="numbers-row">
											<input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
										<div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
									</td>
									<td>
										<strong>$140.00</strong>
									</td>
									<td class="options">
										<a href="cart.html#"><i class="ti-trash"></i></a>
									</td>
								</tr>
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="/template_13/img/products/product_placeholder_square_small.jpg" data-src="/template_13/img/products/shoes/2.jpg" class="lazy" alt="Image">
										</div>
										<span class="item_cart">Armor Okwahn II</span>
									</td>
									<td>
										<strong>$110.00</strong>
									</td>
									<td>
										<div class="numbers-row">
											<input type="text" value="1" id="quantity_2" class="qty2" name="quantity_2">
										<div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
									</td>
									<td>
										<strong>$110.00</strong>
									</td>
									<td class="options">
										<a href="cart.html#"><i class="ti-trash"></i></a>
									</td>
								</tr>
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="/template_13/img/products/product_placeholder_square_small.jpg" data-src="/template_13/img/products/shoes/3.jpg" class="lazy" alt="Image">
										</div>
										<span class="item_cart">Armor Air Wildwood ACG</span>
									</td>
									<td>
										<strong>$90.00</strong>
									</td>

									<td>
										<div class="numbers-row">
											<input type="text" value="1" id="quantity_3" class="qty2" name="quantity_3">
										<div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
									</td>
									<td>
										<strong>$90.00</strong>
									</td>
									<td class="options">
										<a href="cart.html#"><i class="ti-trash"></i></a>
									</td>
								</tr>
								--}}
							</tbody>
						</table>

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<!--div class="col-sm-4 text-right">
							<button type="button" class="btn_1 gray">Update Cart</button>
						</div-->

							{{--<div class="col-sm-12">
							<div class="apply-coupon">
								<div class="form-group form-inline">
									<input type="text" name="coupon-code" value="" placeholder="Código de Cupón" class="form-control"><button type="button" class="btn_1 outline" id="apply_coupon">Aplicar Cupón</button>
								</div>
							</div>
						</div>--}}
						<div class="col-sm-12">
							<div class="apply-coupon">
								<div class="form-group form-inline">
									<a href="/catalogo" id="clean-cart" style="text-decoration: underline;">Limpiar Carrito</a>
								</div>
							</div>
						</div>

					</div>
					<!-- /cart_actions -->

		</div>
		<!-- /container -->

		<div class="box_cart">
			<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
			<ul>
				<li id="cart-subtotal">
					<span>Subtotal</span> S/0.00
				</li>
				<li id="cart-discount">
					<span>Dscto Cupón</span> S/0.00
				</li>
				<li id="cart-total">
					<span>Total</span> S/0.00
				</li>
			</ul>
			<a href="/checkout/info" id="pivot" class="btn_1 full-width cart">Continuar la compra</a>
			<div class="tooltip" id="tooltip">
					<div class="thumb">
						<img src="/template_13/img/paso_checkout.png" alt="">
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
					</div>
				</div>
			</div>
		</div>
		<!-- /box_cart -->

	</main>
	<!--/main-->



<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_13/css/cart.css" rel="stylesheet">
    <link href="/template_13/css/tooltips.css" rel="stylesheet">
    <style type="text/css">
    /*	[data-title]:hover:after {
    opacity: 1;
    transition: all 0.1s ease 0.2s;
    visibility: visible;
}

[data-title]::before {
    display: none; 
    content: attr(data-info);
    color: white;
    font-size: 0.8em;
    padding: 2px 8px;
    background: rgba(0,0,0,0.8);
    border-radius: 5px;
    position: absolute; 
    top: 1.5em;
    left: 5px;
    min-width: 500px;
    z-index: 999;
}

[data-title]:after {
    content: attr(data-title);
    background-color: #de001a;
    color: #fff;
    font-size: 14px;
  
    position: absolute;
    padding: 15px 20px;
    bottom: -1.6em;
    left: 100%;
    white-space: nowrap;
    box-shadow: 1px 1px 3px #222222;
    opacity: 0;

    z-index: 99999;
  
    border-radius: 6px;
    
}
[data-title] {
    position: relative;

}*/



    </style>
@stop
@section('plugins-js')
{{--<script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>--}}
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
<script src="/template_13/js/checkout.js"></script>
<script src="/template_13/js/tooltips.js"></script>

@stop