
@extends('template_4.layouts.index')
@section('content')

<main class="bg_gray">

	<div class="top_banner general">
			<div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
				<div class="container padding_we">
					<div class="row">
						<div class="col-md-6">
							<div class="text-white font-weight-bold mb-4" style="font-size: 3.5rem; line-height: 1;">{{$company_main->name_company}}<br>¡Equipa tu casa!</div>
							<div class="text-white" style="font-size: 16px; line-height: 1.2;">
								Tenemos las mejores marcas en electrodomésticos y hogar.
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
			<h2 style="font-weight: bold;  color: white;">Misión</h2>
			<p class="lead" style="line-height: 1.2; font-size: 16px;">{!!$company_main->mission!!}</p>
		</div>
		<div class="col-md-6 p-0">
			<img src="{{ isset( $gallery_company[1]->resource) ? $gallery_company[1]->resource:  ''  }}" alt="" class="img-fluid " width="100%">
		</div>
	</div>

	<!-- Vision -->
	<div id="vision" class="row m-0 align-items-center" style="background: var(--main-bg-color-secundario);">
		<div class="col-md-6 p-0">
			<img src="{{ isset( $gallery_company[2]->resource) ? $gallery_company[2]->resource:  ''  }}" alt="" class="img-fluid " width="100%">
		</div>
		<div class="col-md-6 text-center text-white" style="padding: 10px 90px;">
			<h2 style="font-weight: bold; color: white;">Visión</h2>
			<p class="lead" style="line-height: 1.2; font-size: 16px;">{!!$company_main->vision!!}</p>
		</div>
	</div>

	<!-- Quienes somos -->
	{{--<div id="quienes-somos" >
		<div class="container">
			<div class="row align-items-center" >
				<div class="col-md-6 py-5" style="padding-right: 100px">
					
					<h2 style="font-weight: bold; color: var(--main-bg-color-secundario);">Sobre {{$company_main->business_name}}</h2>
					<div class="description_about">{!!$company_main->description_company!!}</div>
				</div>
				<div class="col-md-6">
					<img src="{{ isset( $gallery_company[3]->resource) ? $gallery_company[3]->resource:  ''  }}" alt="" class="img-fluid " width="100%">
				</div>
			</div>
		</div>
	</div>--}}

	<!-- Mision -->
	<div id="quienes-somos" class="row m-0 align-items-center" >
		<div class="col-md-6 text-center text-white" style="padding: 10px 90px;">
			<h2 style="font-weight: bold;  color: var(--main-bg-color-secundario);">Sobre {{$company_main->business_name}}</h2>
			<p class="lead" style="line-height: 1.2; font-size: 16px; color: black;">{!!$company_main->description_company!!}</p>
		</div>
		<div class="col-md-6 p-0">
			<img src="{{ isset( $gallery_company[3]->resource) ? $gallery_company[3]->resource:  ''  }}" alt="" class="img-fluid " width="100%">
		</div>
	</div>

	{{--<!-- historia 1 -->
	<div id="nuestra-historia" class="row m-0 align-items-center">
		<div class="col-md-6 p-0">
			<img src="{{ isset( $gallery_company[4]->resource) ? $gallery_company[4]->resource:  ''  }}" alt="" class="img-fluid " width="100%">
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
	</div>--}}

	<!-- historia 2 -->
	<div class="top_banner general"  >
			<div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
				<div class="container padding_we">
					<div class="row">
						<div class="col-md-12">
							<div class="text-white font-weight-bold mb-4" style="font-size: 2.5rem; line-height: 1; text-align: center;">La calidad que buscas en : Electrodomésticos , colchones , camas , hogar con los mejores Precios , están en Roesvil , desde hace más de 20 años a su servicio.</div>
							<div class="text-center">
						<a href="/catalogo" class="btn btn_2">Ver catálogo</a>
					</div>
						</div>
					</div>
				</div>
			</div>
			<img src="{{ isset( $gallery_company[4]->resource) ? $gallery_company[4]->resource:  ''  }}" class="img-fluid" alt="">
	</div>

	<!--div class="club_background2 ">
		<div class="container">
			<div class="row align-items-center">
			
				<div class="col-md-12 py-5" style="height: 450px;">
					<div class="font-weight-bold text-white mb-3" style="font-size: 2.5rem; line-height: 1.5;   padding-top: 60px;  text-align: center;">
						Disfruta de nuestros <br> Productos
					</div>
					<div class="text-center">
						<a href="/catalogo" class="btn btn_2">Ver catálogo</a>
					</div>
					
				</div>
			</div>
		</div>
	</div-->

		<!-- Vision -->
	<div  class="row m-0 align-items-center" style="background: var(--main-bg-color-secundario);">
		<div class="col-md-6 p-0">
			<img src="{{ isset( $gallery_company[5]->resource) ? $gallery_company[5]->resource:  ''  }}" alt="" class="img-fluid " width="100%">
		</div>
		<div class="col-md-6 text-center text-white" style="padding: 10px 90px;">

			<h2 style="font-weight: bold; padding-top: 20px; text-align: center; color: white;">Nuestra Propuesta de Valor</h2>
			<p class="lead" style="line-height: 1.2; font-size: 16px;">{!!$company_main->vision!!}</p>
		</div>
	</div>

		<div id="valores" class="bg_white">
				<div class="container margin_60_35">
					<div class="main_title">
						<h2 style="font-weight: bold; padding-top: 20px">Nuestros Valores Corporativos</h2>
						<!--p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p-->
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
						<!--div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-medall-alt"></i>
								<h3>+ 1000 Customers</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-help-alt"></i>
								<h3>H24 Support</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-gift"></i>
								<h3>Great Sale Offers</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-headphone-alt"></i>
								<h3>Help Direct Line</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-wallet"></i>
								<h3>Secure Payments</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-comments"></i>
								<h3>Support via Chat</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
							</div>
						</div-->
					</div>
					<!--/row-->
				</div>
			</div>

	<div id="trabaja" class="bg_white">
		<div class="container p-5">
			<div class="row justify-content-center">
				<div class="col-md-11">
				
					<h2 style="font-weight: bold; padding-top: 20px; text-align: center;">¿Interesado en trabajar con nosotros?</h2>
					<div class="text-center mb-4" style="font-size: 16px; line-height: 1.2">
						Te invitamos a formar parte de nuestro equipo de trabajo, Tendrás la oportunidad de desarrollar tu carrera y talento en el área más indicada, tomar iniciativas en proyectos y trabajar en un ambiente donde se valora tu esfuerzo, por ello te animamos a enviar tu Hoja de Vida.
					</div>
					<div class="text-center mb-4">
						<a href="/contacto" class="btn_1"><b>Quiero contactarme</b></a>
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
