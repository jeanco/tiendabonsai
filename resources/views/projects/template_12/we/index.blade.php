
@extends('template_12.layouts.index')
@section('content')

<main class="bg_gray">

	<div class="top_banner general">
			<div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0)">
				<div class="container">
					<div class="row justify-content-end">
						<!--div class="col-lg-8 col-md-6 text-right">
							<h1>Dolor docendi fuisset ad<br>movet mucius diceret et qui</h1>
						</div-->
					</div>
				</div>
			</div>
			<img src="{{ isset( $gallery_company[0]->resource) ? $gallery_company[0]->resource:  ''  }}" class="img-fluid" alt="">  
		</div>
		<!--/top_banner-->
			<div id="quienes-somos" class="container margin_60_35 add_bottom_30">
				<!--div class="main_title">
					<h2 style="font-weight: bold; padding-top: 20px">Sobre  Nosotros{{--$company_main->business_name--}}</h2>

				</div-->

				<div>
					
				</div>
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-5">
						<h2 style="font-weight: bold; padding-top: 20px">Sobre Nosotros  {{--$company_main->business_name--}}</h2>

						{!!$company_main->description_company!!}
					</div>
					<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">

							<iframe width="100%" height="380" src="https://www.youtube.com/embed/{{ isset($video) ? $video:  ''  }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 25px;"></iframe>
					</div>
				</div>
		
				
				<!--div class="row justify-content-center align-items-center">
					<div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
							<img src="/template_12/img/about_2.svg" alt="" class="img-fluid" width="350" height="268">
					</div>
					<div class="col-lg-5">
						<div class="box_about">
							<h2>Top Brands</h2>
							<p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
							<p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
							<img src="/template_12/img/arrow_about.png" alt="" class="arrow_2">
						</div>
					</div>
				</div>
			
				<div class="row justify-content-center align-items-center ">
					<div class="col-lg-5">
						<div class="box_about">
							<h2>+5000 products</h2>
							<p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
							<p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
						</div>

					</div>
					<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
							<img src="/template_12/img/about_3.svg" alt="" class="img-fluid" width="350" height="316">
					</div>
				</div-->
				
			</div>
			<!-- /container -->

			<div id="nuestra-historia" class=" margin_60_35 add_bottom_30" style="background: #212121;">
				<div class="main_title">
				<h2 style="color: white; font-weight: bold; padding-top: 20px">Nuestra Historia</h2>
				<!--p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p-->
			</div>
				<!--div class="main_title">
					<img src="{{ isset( $gallery_company[1]->resource) ? $gallery_company[1]->resource:  ''  }}" width="60%">

				</div-->
				
			
			<div class="owl-carousel owl-theme carousel_centered">
				<div class="item">
					<a href="#">
						<!--div class="title">
							<h4>Julia Holmes<em>CEO</em></h4>
						</div--><img src="{{ isset( $gallery_company[1]->resource) ? $gallery_company[1]->resource:  ''  }}" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<!--div class="title">
							<h4>Lucas Smith<em>Marketing</em></h4>
						</div--><img src="{{ isset( $gallery_company[2]->resource) ? $gallery_company[2]->resource:  ''  }}" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<!--div class="title">
							<h4>Paul Stephens<em>Business strategist</em></h4>
						</div--><img src="{{ isset( $gallery_company[3]->resource) ? $gallery_company[3]->resource:  ''  }}" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<!--div class="title">
							<h4>Paul Stephens<em>Business strategist</em></h4>
						</div--><img src="{{ isset( $gallery_company[4]->resource) ? $gallery_company[4]->resource:  ''  }}" alt="">
					</a>
				</div>
			
				<!--div class="item">
					<a href="#">
						<div class="title">
							<h4>Pablo Himenez<em>Customer Service</em></h4>
						</div><img src="/template_12/img/staff/4_carousel.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>Andrew Stuttgart<em>Admissions</em></h4>
						</div><img src="/template_12/img/staff/5_carousel.jpg" alt="">
					</a>
				</div-->
			</div>
	
				
			
				
				
			</div>

			{{--<div id="carousel-home">
			<div class="owl-carousel owl-theme">
				<div class="owl-slide cover" style="background-image: url({{ isset( $gallery_company[8]->resource) ? $gallery_company[8]->resource:  ''  }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6 static">
									<!--div class="slide-text white">
										<h2 class="owl-slide-animated owl-slide-title">"Awesome Experience"</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											<em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut.</em>
										</p>
										<div class="owl-slide-animated owl-slide-cta"><small>Susan - Photographer</small></div>
									</div-->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
				<div class="owl-slide cover" style="background-image: url({{ isset( $gallery_company[9]->resource) ? $gallery_company[9]->resource:  ''  }});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6 static">
									<!--div class="slide-text white">
										<h2 class="owl-slide-animated owl-slide-title">"Great Support"</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											<em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne.</em>
										</p>
										<div class="owl-slide-animated owl-slide-cta">Mary - Doctor</div>
									</div-->
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div id="icon_drag_mobile"></div>
		</div>--}}
		<!--/carousel-->

		<div id="mision" class="container margin_60_35 add_bottom_30">


				<div class="row justify-content-center align-items-center">
					<div class="col-lg-5">
						<div class="box_about">
							<h2 style="font-weight: bold; padding-top: 20px">Misión</h2>
							<p class="lead">{!!$company_main->mission!!}</p>
						</div>
					</div>
					<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
							<img src="{{ isset( $gallery_company[5]->resource) ? $gallery_company[5]->resource:  ''  }}" alt="" class="img-fluid " style="border-radius: 25px;" width="350" height="268">
					</div>
				</div>
		
				
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
							<img src="{{ isset( $gallery_company[6]->resource) ? $gallery_company[6]->resource:  ''  }}" alt="" class="img-fluid " style="border-radius: 25px;" width="350" height="268">
					</div>
					<div class="col-lg-5">
						<div class="box_about">
							<h2 style="font-weight: bold; padding-top: 20px">Visión</h2>
							<p class="lead">{!!$company_main->vision!!}</p>
						</div>
					</div>
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
			<!-- /bg_white -->
		{{--<div class="container margin_60">
		<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="step first">
					
					<ul class="nav nav-tabs" id="tab_checkout" role="tablist">
					  <li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Tacna</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">Ilo y Moquegua</a>
					  </li>

					  <li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_3" role="tab" aria-controls="tab_3" aria-selected="false">Chile</a>
					  </li>
					</ul>
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
							<div class="container margin_60">
			<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 10px">Nuestro Equipo de Ventas en Tacna</h2>
			</div>
			<div class="owl-carousel owl-theme carousel_centered">
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>JULIO ISASI<em>
							Vendedor Mayorista<br>
							julio.isasi@dmalibu.com
							</em>952 522222</h4>
						</div><img src="/template_12/img/staff/1_carousel.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>PATRICIA ORTEGA<em>
							Vendedor Mayorista<br>
							patricia.ortega@dmalibu.com
							</em>952 654068</h4>
						</div><img src="/template_12/img/staff/2_carousel.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>DAVID MERINO<em>
							Ejecutivo de Comercial - Supervisor<br>
							david.merino@dmalibu.com
							</em>952 940460</h4>
						</div><img src="/template_12/img/staff/3_carousel.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>AYNETH CONDORI<em>
							Asesora Comercial<br>
							ayneth.condori@dmalibu.com
							</em>990 413005</h4>
						</div><img src="/template_12/img/staff/4_carousel.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>JUANA OLIVERA<em>
							Asesora Comercial – Cono Sur<br>
							juana.olivera@dmalibu.com
							</em>994 478573</h4>
						</div><img src="/template_12/img/staff/5_carousel.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>MIRYAM ESCALANTE<em>
							Asesora Comercial - Cercado<br>
							miryam.escalante@dmalibu.com
							</em>987 065888</h4>
						</div><img src="/template_12/img/staff/5_carousel.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>ALEXANDRA LIENDO<em>
							Asesora Comercial – Cono Norte<br>
							alexandra.liendo@dmalibu.com
							</em>973 099787</h4>
						</div><img src="/template_12/img/staff/5_carousel.jpg" alt="">
					</a>
				</div>
			</div>
			<!-- /carousel -->
		</div>

							<hr>
						</div>
						<!-- /tab_1 -->
					  <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab_2">
								
<div class="container margin_60">
			<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 10px">Nuestro Equipo de Ventas en Ilo – Moquegua</h2>
			</div>
			<div class="owl-carousel owl-theme carousel_centered">
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>OSCAR HUACO<em>
							Ejecutivo de Ventas Zona ILO<br>
							oscar.huaco@dmalibu.com
							</em>958 3210864</h4>
						</div><img src="/template_12/img/staff/1_carousel.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>VERÓNICA GODOY<em>
							Ejecutivo de Venta Zona Moquegua<br>
							veronica.godoy@dmalibu.com
							</em>953 674113</h4>
						</div><img src="/template_12/img/staff/2_carousel.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>HEBER LLERENA<em>
							Asesor Comercial Moquegua<br>
							heber.llerena@dmalibu.com
							</em>958 320859</h4>
						</div><img src="/template_12/img/staff/3_carousel.jpg" alt="">
					</a>
				</div>
				
			</div>
			<!-- /carousel -->
		</div>
		
						</div>
						<!-- /tab_2 -->

						<div class="tab-pane fade" id="tab_3" role="tabpanel" aria-labelledby="tab_3">
							

		<div class="container margin_60">
			<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 10px">Nuestro Equipo de Ventas en Chile</h2>
			</div>
			<div class="owl-carousel owl-theme carousel_centered">
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>SERGIO SÁNCHEZ<em>
							Ejecutivo Comercial Arica<br>
							facebook.com/SANCHEZMATERIALES
							</em>+56 932 880537</h4>
						</div><img src="/template_12/img/staff/1_carousel.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<div class="title">
							<h4>LORETO SÁNCHEZ<em>
							Ejecutivo Comercial Iquique<br>
							facebook.com/SANCHEZMATERIALES
							</em>+56 961 479372</h4>
						</div><img src="/template_12/img/staff/2_carousel.jpg" alt="">
					</a>
				</div>
			
				
			</div>
			<!-- /carousel -->
		</div>
						</div>
						<!-- /tab_3 -->
					</div>
					</div>
					<!-- /step -->
				</div>
		</div>
	</div>--}}


		<!-- /container -->
	</main>
	<!--/main-->

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_12/css/about.css" rel="stylesheet">


@stop
@section('plugins-js')



@stop