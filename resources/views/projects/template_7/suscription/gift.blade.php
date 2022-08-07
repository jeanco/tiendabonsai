	

@extends('template_7.layouts.index')
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
					<h2>Registro exitoso!</h2>
					<p>Ahora puede descargar nuestro Catálogo Digital</p>

					

					<br><br>
							<div class="btn_add_to_cartx"><a href="{{ isset( $catalogs[0]->link) ? $catalogs[0]->link:  ''  }}" target="_blank" class="btn_1"  style="width: 100%; margin: 10px 0 10px 0; display: inline;    padding: 10px 18px;">Descargar Catálogo Digital</a></div>
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
    <link href="/template_7/css/checkout.css" rel="stylesheet">


@stop
@section('plugins-js')


@stop
