
@extends('template_4.layouts.index')
@section('content')

<main class="bg_gray  font-template">

	<div class="top_banner general">
			<div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
				<div class="container padding_we">
					<div class="row">
						<div class="col-md-6">
							<div class="text-white font-weight-bold mb-4" style="font-size: 3.5rem; line-height: 1;">Kamasa<br>¡mejora tu casa!</div>
							<div class="text-white" style="font-size: 16px; line-height: 1.2;">
								Brindando gran variedad de productos de las mejores marcas a los mejores precios, como son: LG, Daewo, Indurama, Electrolux, Samsung, Sony, Philips, entre otros.
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="{{ isset( $gallery_company[0]->resource) ? $gallery_company[0]->resource:  ''  }}" class="img-fluid" alt="">
	</div>

	<!-- Mision -->
	<div id="mision" class="row m-0 align-items-center" style="background: var(--main-bg-color-primario);">
		<div class="col-md-6 text-center text-white" style="padding: 10px 90px;">
			<div class="font-weight-bold" style="font-size: 1.5em;">Misión</div>
			<p class="lead" style="line-height: 1.2; font-size: 16px;">{!!$company_main->mission!!}</p>
		</div>
		<div class="col-md-6 p-0">
			<img src="{{ isset( $gallery_company[3]->resource) ? $gallery_company[3]->resource:  ''  }}" alt="" class="img-fluid " width="100%">
		</div>
	</div>

	<!-- Vision -->
	<div class="row m-0 align-items-center" style="background: var(--main-bg-color-cuarto);">
		<div class="col-md-6 p-0">
			<img src="{{ isset( $gallery_company[4]->resource) ? $gallery_company[4]->resource:  ''  }}" alt="" class="img-fluid " width="100%">
		</div>
		<div class="col-md-6 text-center text-white" style="padding: 10px 90px;">
			<div class="font-weight-bold" style="font-size: 1.5em;">Visión</div>
			<p class="lead" style="line-height: 1.2; font-size: 16px;">{!!$company_main->vision!!}</p>
		</div>
	</div>

	<!-- Quienes somos -->
	<div id="quienes-somos" style="background-image: url('https://dl.dropboxusercontent.com/s/adzp06t2hjjsql1/img_mejora.jpg?dl=0'); background-size: 100% 100%;">
		<div class="container py-5">
			<div class="row align-items-center" >
				<div class="col-md-6 py-5" style="padding-right: 100px">
					<div class="font-weight-bold text-uppercase mb-4" style="color: var(--main-bg-color-secundario); font-size: 1.5em;">Sobre  {{$company_main->business_name}}</div>
					<div class="description_about">{!!$company_main->description_company!!}</div>
				</div>
				<div class="col-md-6">
					<img src="{{ isset( $gallery_company[1]->resource) ? $gallery_company[1]->resource:  ''  }}" alt="" class="img-fluid " width="100%">
				</div>
			</div>
		</div>
	</div>

	<!-- historia 1 -->
	<div id="nuestra-historia" class="row m-0 align-items-center">
		<div class="col-md-6 p-0">
			<img src="{{ isset( $gallery_company[2]->resource) ? $gallery_company[2]->resource:  ''  }}" alt="" class="img-fluid " width="100%">
		</div>
		<div class="col-md-6 p-0 desktop_header">
			<img src="https://dl.dropboxusercontent.com/s/zkuwqz23eiw3chu/imgnos3.jpg?dl=0" alt="" class="img-fluid " width="100%">
			<div class="history_desc">
				<div class="container">
					<div class="font-weight-bold text-white mb-4" style="line-height: 1.2">
						<span style="font-size: 16px;">NUESTRA HISTORIA</span><br>
						<span style="font-size: 2.5rem;">LOS INICIOS</span>
					</div>
					<div class="card">
					  <div class="card-body">
					    <div class="text-center" style="font-size: 16px;">DONDE COMENZAMOS</div>
							<p class="text-justify">
								Con la creación de la zona franca comercial de Tacna Zofra Tacna nace la primera tienda de electrodomésticos, es en junio de 1997 donde nace la idea de implementar una pequeña tienda de electrodomésticos en el interior del Centro Comercial Bolognesi. En un inicio fuimos distribuidores exclusivos de las marcas LG y AIWA, abasteciendo los diferentes centros comerciales de la Zofra Tacna, años más tarde pudimos notar que la demanda aumentaba y la necesidad del público en adquirir nuevos productos de diferentes marcas eran los pedidos y sugerencias que más se escuchaban; por tal motivo decidimos seguir invirtiendo en nuestro negocio con el único objetivo de brindar un mejor servicio con productos de calidad, de reconocidas marcas a nivel mundial. Posteriormente, notamos que nuestra pequeña tienda al interior del centro comercial Bolognesi ya no daba abasto para atender a nuestros clientes, motivo por el cual decidimos aperturar un nuevo local, uno mucho más amplio que pueda brindar una mejor atención y comodidad a nuestros clientes, esta se ubicaría en la avenida Coronel Mendoza, frente al centro comercial Bolognesi.
							</p>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 movil_header" style="background-image: url('https://dl.dropboxusercontent.com/s/zkuwqz23eiw3chu/imgnos3.jpg?dl=0'); background-size: 100% 100%; padding: 50px 50px;">
			<div class="font-weight-bold text-white mb-4" style="line-height: 1.2">
				<span style="font-size: 16px;">NUESTRA HISTORIA</span><br>
				<span style="font-size: 2.5rem;">LOS INICIOS</span>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="text-center" style="font-size: 16px;">DONDE COMENZAMOS</div>
					<p class="text-justify">
						Con la creación de la zona franca comercial de Tacna Zofra Tacna nace la primera tienda de electrodomésticos, es en junio de 1997 donde nace la idea de implementar una pequeña tienda de electrodomésticos en el interior del Centro Comercial Bolognesi. En un inicio fuimos distribuidores exclusivos de las marcas LG y AIWA, abasteciendo los diferentes centros comerciales de la Zofra Tacna, años más tarde pudimos notar que la demanda aumentaba y la necesidad del público en adquirir nuevos productos de diferentes marcas eran los pedidos y sugerencias que más se escuchaban; por tal motivo decidimos seguir invirtiendo en nuestro negocio con el único objetivo de brindar un mejor servicio con productos de calidad, de reconocidas marcas a nivel mundial. Posteriormente, notamos que nuestra pequeña tienda al interior del centro comercial Bolognesi ya no daba abasto para atender a nuestros clientes, motivo por el cual decidimos aperturar un nuevo local, uno mucho más amplio que pueda brindar una mejor atención y comodidad a nuestros clientes, esta se ubicaría en la avenida Coronel Mendoza, frente al centro comercial Bolognesi.
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- historia 2 -->
	<div class="club_background2 " style="background-image: url('https://dl.dropboxusercontent.com/s/gncrilc94kacop8/imgnos4.jpg?dl=0');">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 p-5">
					<div class="card">
					  <div class="card-body px-5">
					    <div class="text-center" style="font-size: 16px;">SEGUIMOS CRECIENDO</div>
							<p class="text-justify">
								Así nace Tiendas Kamasa con 5 trabajadores, una oficina administrativa y un vehículo para el traslado de los electrodomésticos a su domicilio sin recargo alguno, además contando con el respaldo, garantía y servicio técnico de grandes firmas como LG, SONY, SAMSUNG, entre otros. Logrando tener un stock variado de modelos y marcas para cada necesidad; mas adelante nuevas marcas formarían parte de nuestra cartera de proveedores como ELECTROLUX, INDURAMA Y DAEWOO. Un punto importante para nosotros es premiar y reconocer nuestros buenos clientes, motivo por el cual Tiendas Kamasa crea a lo largo de los doce meses del año, diferentes promociones y sorteos, implementando sistemas de créditos facilidades de pago y convenios institucionales, que fueron bien recibidos por los mismos clientes. En el año 2009 Tiendas Kamasa paso a ser una empresa con mayor posicionamiento gracias a su nueva ubicación estratégica en el centro de la ciudad, cerca a otras empresas competidoras, que estimulan a Kamasa a mejorar continuamente. Actualmente Kamasa forma parte del Centro Comercial San Martin Plaza que reúne empresas de diversos rubros para presentar una mejor alternativa a la población tacneña y visitantes.
							</p>
					  </div>
					</div>
				</div>
				<div class="col-md-6 py-5">
					<div class="font-weight-bold text-white mb-3" style="font-size: 2.5rem; line-height: 1.2">
						DISFRUTA DE NUESTROS PRODUCTOS
					</div>
					<a href="/catalogo" class="btn btn_2">Ver catálogo</a>
				</div>
			</div>
		</div>
	</div>

	<div id="valores" class="bg_white">
		<div class="container py-5">
			<div class="font-weight-bold">
				<span style="font-size: 16px;">NUESTROS VALORES</span><br>
				<span style="font-size: 2.5rem;">LO QUE VIVIMOS</span>
			</div>
			<div class="row">
				@foreach( $values as $value)
				<div class="col-lg-4 col-md-6">
					<div class="box_feat">
						<!--i class="ti-medall-alt"></i-->
						<img src="{{$value->image}}" width="150px">
						<h3>{{$value->title}}</h3>
						<p>{{$value->description}}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<div id="trabaja" class="bg_white">
		<div class="container p-5">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="text-center mb-4" style="font-size: 2.5rem; line-height: 1.2; font-weight: 800;">
						¿Interesado en trabajar con nosotros?
					</div>
					<div class="text-center mb-4" style="font-size: 16px; line-height: 1.2">
						Tiendas Kamasa te invita a formar parte de su equipo de trabajo, estamos en constante crecimiento y necesitamos personas como tú. Tendrás la oportunidad de desarrollar tu carrera y talento en el área más indicada, podrás adquirir nuevos conocimientos, tomar iniciativas en proyectos y trabajar en un ambiente donde se valora tu esfuerzo, por ello te animamos a enviar tu Hoja de Vida.
					</div>
					<div class="text-center mb-4">
						<a href="/contacto" class="btn_1"><b>Pónganse en contacto con nosotros</b></a>
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
    <link href="/template_4/css/about.css" rel="stylesheet">


@stop
@section('plugins-js')



@stop
