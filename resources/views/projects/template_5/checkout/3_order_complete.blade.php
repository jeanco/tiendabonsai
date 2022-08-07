

@extends('template_5.layouts.index')
@section('content')

	<main class="bg_gray">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-5">
					<div id="confirm">
						<div class="icon icon--order-success svg add_bottom_15">
							<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
								<g fill="none" stroke="#8EC343" stroke-width="2">
									<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
									<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
								</g>
							</svg>
						</div>

					@if(!(array)$charge)


					<h2>Su Pedido se realizó con éxito</h2>
					<p>En breve un asesor comercial se contactará con Usted para coordinar su pedido y la entrega de su comprobante. <br>Revise su correo electrónico para ver el detalle de su pedido. </p>
					<p>Monto Total: <span style="font-size: 18px; font-weight:bold;"> S/ {{ $total }}</span></p>
					@else
						@if($charge->object == "charge")
						<h2>Su Pedido se realizó exitosamente</h2>
						<p>En breve un asesor comercial se contactará con Usted para coordinar su pedido y la entrega de su comprobante. <br>Revise su correo electrónico para ver el detalle de su pedido. </p>
						{{--<p>{{ $charge->outcome->user_message }}</p>
						<p>{{ $charge->outcome->merchant_message }}</p>--}}
						<p style="background: #212121; color: white; padding: 10px; border-radius: 15px; font-size: 18px;">Monto Total:  <span style="font-size: 18px; font-weight:bold;"> S/ {{ $total }}</span></p>
						@endif

						@if($charge->object == "order")
						<h2>Su Compra se realizó exitosamente</h2>
						<p>En breve un asesor comercial se contactará con Usted para coordinar su pedido y la entrega de su comprobante.
						<p>Por favor acercarse a un agente bancario para realizar el pago en efectivo</p>
						<p>Revise su correo electrónico para ver el detalle del pedido.</p>
						<p>Código de pago: {{ $charge->payment_code }}</p>
						<p style="background: #212121; color: white; padding: 10px; border-radius: 15px; font-size: 18px;">Monto a Total:  <span style="font-size: 18px; font-weight:bold;"> S/ {{ $total }}</span></p>
						@endif

						@if($charge->object == "error")
						<!-- <h2></h2> -->
						<p>{{ $charge->merchant_message }}</p>
						@endif
					@endif

						


							<br><br>


							<h3 style="font-size: 18px; font-weight:bold;">Para una respuesta más rápida, envíe los detalles de su pedido haciendo click en el botón de abajo.</h3>

							@php
							$content = '';
								foreach($order_detail as $key => $detail){
										$content = $content.''.$detail->quantity.' und.'.' *'.$detail->product->name.'* '.'- S/ '.$detail->price.'%0A';
								}

								$dominio = $_SERVER['SERVER_NAME'].'/pdf-pedido/'.$order->uuid;
								$route = '/pdf-pedido/'.$order->uuid;
							
							@endphp


							{{-- <p>{{$content}}</p> --}}

						

							
							 <div class="btn_add_to_cartx" style="padding-top: 15px;">
							 	<a class="btn_1" style="font-size: 20px;width: 100%; margin: 10px 0 10px 0; background: #29b73b;" href="https://api.whatsapp.com/send?phone={{$company_main->cel}}&amp;text=%0A%0A*MI PEDIDO N° {{$order->code}}*%0A--------------------------------%0A{{$content}}--------------------------------%0ASub total: {{$order->subtotal}}%0ACosto de envío: {{$order->shipping_cost}}%0A*TOTAL A PAGAR:*%0AS/ {{$total}}%0A%0A*Método de Pago:*%0A{{ $order->account->name }}%0A{{$order->account->description}}%0A%0A*Detalles del Cliente:*%0A{{$order->customer->identity_document}}%0A{{$order->customer->first_name}} {{$order->customer->last_name}}%0A{{$order->customer->cel_whatsapp}}%0A{{$order->customer->email}}%0A%0A¡Gracias por su compra!%0A%0A*Link del pedido:*%0A%0A{{$dominio}}%0A%0APronto lo atenderemos =)" target="_blank"><i class="fab fa-whatsapp"></i> Enviar orden por Whatsapp <br>a {{$company_main->name_company}}</a>
							 </div>

							 @if($company_main->cel_optional)
							 <div class="btn_add_to_cartx" style="padding-top: 15px;">
							 	<a class="btn_1" style="font-size: 20px;width: 100%; margin: 10px 0 10px 0; background: #29b73b;" href="https://api.whatsapp.com/send?phone={{$company_main->cel_optional}}&amp;text=%0A%0A*MI PEDIDO N° {{$order->code}}*%0A--------------------------------%0A{{$content}}--------------------------------%0ASub total: {{$order->subtotal}}%0ACosto de envío: {{$order->shipping_cost}}%0A*TOTAL A PAGAR:*%0AS/ {{$total}}%0A%0A*Método de Pago:*%0A{{ $order->account->name }}%0A{{$order->account->description}}%0A%0A*Detalles del Cliente:*%0A{{$order->customer->identity_document}}%0A{{$order->customer->first_name}} {{$order->customer->last_name}}%0A{{$order->customer->cel_whatsapp}}%0A{{$order->customer->email}}%0A%0A¡Gracias por su compra!%0A%0A*Link del pedido:*%0A%0A{{$dominio}}%0A%0APronto lo atenderemos =)" target="_blank"><i class="fab fa-whatsapp"></i> Enviar orden por Whatsapp <br>a {{$company_main->business_name}}</a>
							 </div>
							 @endif

							 <hr>
							 <br><br>
							 <div class="btn_add_to_cartx"><a href="{{URL::to($route)}}" target="_blank" class="btn_1"  style="width: 100%; margin: 10px 0 10px 0; display: inline;    padding: 10px 18px; background:#272727;">ver mi orden</a></div>
							 <br><br>
							<div class="btn_add_to_cartx"><a href="/catalogo" class="btn_1"  style="width: 100%; margin: 10px 0 10px 0; display: inline;    padding: 10px 18px; ">Seguir Comprando</a></div>

					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

	</main>
	<!--/main-->

@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_5/css/checkout.css" rel="stylesheet">


@stop
@section('plugins-js')

<script type="text/javascript">
	localStorage.removeItem(`cart`);
	localStorage.removeItem(`coupon_code`);
	localStorage.removeItem(`coupon_by_percentage`);
	localStorage.removeItem(`coupon_amount`);
</script>

@stop
