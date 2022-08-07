
@extends('template_2.layouts.index')
@section('content')

<main class="bg_gray">


	<div class="top_banner general banner_contact" style="">
		@if($company_main->banner_contact)
			<div class="opacity-mask banner_contact d-flex align-items-md-center"  data-opacity-mask="rgba(0, 0, 0, 0.4)" style="background:  url({{ $company_main->banner_contact }}); background-size: cover; ">
			@else
			<div class="opacity-mask banner_contact d-flex align-items-md-center"  style="background:  #0e0e0e; background-size: cover; height: 250px;">
			@endif
				<div class="container">
					<div class="row justify-content-end">
						 <div class="col-md-12">
				<div class="content">
					<div class="wrapper">


					 <form action="modal-newsletter.html#">
					 	<div class="row">
					 		<div class="col-md-2">

					 		</div>
					 		<div class="col-md-8" >
					 			<h2 style="color: white;">Contáctenos</h2>
					<h6 style="color: white;">Estamos dispuestos a atender tus consultas y sugerencias.</h6>
					 		</div>
					 		<div class="col-md-2">

					 		</div>

					 	</div>
					 </form>
					</div>
				</div>
            </div>
					</div>
				</div>
			</div>
			<!--img src="/template_2/img/top_about.jpg" class="img-fluid" alt="" style="filter: brightness(0.5);"-->
		</div>
			<div class=" margin_60" style="padding-top: 0px;">
				<div class="main_title">
				{{--<h2 style="font-weight: bold; padding-top: 20px">Contacto</h2>
					<p>Estamos dispuestos a atender tus consultas y sugerencias.</p>--}}

				</div>
				<div class="row">
						<div class="col-md-4">

						</div>
						<div class="col-md-4 form-group text-center">
									<div class="row">
										<div class="col-md-6">
											<p>Seleccione La sucursal:</p>
										</div>
										<div class="col-md-6">
											<div class="custom-select-form">
										<select class="wide " name="place_id" style="display: none;">
	                                	@foreach($places as $key => $place)
	             		                    @if($place['id'] == $place_selected)
												<option value="{{ $place['id'] }}" selected="selected">{{ $place['name'] }}</option>

												@php
													$place_name = $place['name'];
												@endphp

	                                		@else
												<option value="{{ $place['id'] }}">{{ $place['name'] }}</option>
	                                		@endif
	                                	@endforeach
										</select>
									</div>
										</div>

									</div>

								</div>

						<div class="col-md-4">

						</div>

					</div>
				<div class="row justify-content-center" style="background: #212121; color: white;">
					<div class="col-lg-3">
						<div class="box_contacts">
							<!--i class="ti-email"></i-->
							<img src="/template_2/img/mensajes.png" width="55px" style="    padding-top: 0px;">
							<h2 style="color: white;">Correo Electrónico</h2>
							<a style="color: white;" href="#" id="contact_email_">{{$company_main->email}}</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="box_contacts">
							<!--i class="ti-map-alt"></i-->
							<img src="/template_2/img/ubicacion.png" width="55px" style="    padding-top: 0px;">
							<h2 style="color: white;">Nuestra Sucursal</h2>
							<div  id="contact_address">{{$company_main->address}}</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="box_contacts">
							<!--i class="ti-headphone-alt"></i-->
							<img src="/template_2/img/cel.png" width="55px" style="    padding-top: 0px;">
							<h2 style="color: white;">Celular</h2>
							<a href="#" style="color: white;" id="contact_cel">{{$company_main->cel}}</a> <br> <a href="#" style="color: white;"  id="contact_phone">{{$company_main->phone}}</a>
							<!--small>de 9 a 7 pm</small-->
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		<div class="bg_white">
			<div class="container margin_60_35">
				<h4 class="pb-3" style="font-weight: bold; padding-top: 20px">Contáctenos</h4>
				<div class="row">
					<div class="col-lg-4 col-md-6 add_bottom_25">
						<div class="form-group">
							<input class="form-control" type="text" placeholder="Nombres y Apellidos *" id="contact_name">
							<div id="contact-error-name" class="mensaje-error text-danger"></div>
						</div>
						<div class="form-group">
							<input class="form-control" type="email" placeholder="Email *" id="contact_email">
							<div id="contact-error-email" class="mensaje-error text-danger"></div>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" placeholder="Celular *" id="contact_cellphone">
							<div id="contact-error-email" class="mensaje-error text-danger"></div>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" placeholder="Asunto *" id="contact_subject">
							<div id="contact-error-subject" class="mensaje-error text-danger"></div>
						</div>
						<div class="form-group">
							<textarea class="form-control" style="height: 150px;" placeholder="Mensaje *" id="contact_msg"></textarea>
							<div id="contact-error-msg" class="mensaje-error text-danger"></div>
						</div>
						<div class="form-group">
							<button type="button" class="btn_1 full-width" id="contact__send">Enviar</button>
						</div>
					</div>
					{{--<input type="hidden" id="company_latitude" name="latitude" value="{{ $company->latitude }}">
        			<input type="hidden" id="company_longitude" name="longitude" value="{{ $company->longitude }}">--}}
					<div class="col-lg-8 col-md-6 add_bottom_25">
						{{--
						<div id="location">
						</div>
						--}}
                        {{--<div id="home_company-map"></div>--}}

                        {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3792.815670285208!2d-70.29920348540301!3d-18.08008608766709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915ac91bade1c071%3A0x6f39eaf49489191d!2sZOFRATACNA!5e0!3m2!1sen!2spe!4v1590622664932!5m2!1sen!2spe" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>--}}

                        <div id="contact_geo">
                        </div>
						{{--
						<iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d797.5343543044748!2d-70.25090623942164!3d-18.03753895703797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915acf519648ea1d%3A0x55cb8a5ff0e27392!2sPlaza%20Eduardo%20Perez%20Gamboa!5e0!3m2!1ses-419!2spe!4v1589401748513!5m2!1ses-419!2spe" style="border: 0" allowfullscreen>
						</iframe>
						--}}

					</div>
				</div>
				<!-- /row -->
				@if(count($staff))
				<div class="container">
				<div class="row">
					<div class="main_title">
				<h2 style="font-weight: bold; padding-top: 10px" id="owl-carousel-title">Nuestro Equipo de Ventas {{ $place_name }}</h2>
			</div>
			<div class="my-owl-carousel owl-carousel owl-theme carousel_centered">
				@foreach($staff as $person)
				<div class="item">
					<a href="https://api.whatsapp.com/send?phone={{ $person['whatsapp'] }}&text=" target="_blank">
						<div class="title">
							<h4>{{ $person['first_name'] }} {{ $person['last_name'] }}<br><span style="color: var(--main-bg-color-secundario)">
							{{ $person['role'] }}</span> <br>
							{{ $person['email'] }}

							<br>
							<br>
							<span style="font-size: 14px;">Comunícate con un click</span><hr style="margin: 5px 0 5px 0;">
							<img src="/template_2/img/whatsapp_ico.png" class="button_select" style=" width: 25px !important;     display: inline-block;">
							<span style="     display: inline-block;"> {{ $person['whatsapp'] }}</span>

						</h4>

						</div><img src="{{ $person['image'] }}" alt="">
					</a>
				</div>
				@endforeach
				{{--

				<div class="item">
					<a href="https://api.whatsapp.com/send?phone=51952654068&text=" target="_blank">
						<div class="title">
							<h4>PATRICIA ORTEGA<br><span style="color: var(--main-bg-color-secundario)">
							Vendedor Mayorista</span><br>
							patricia.ortega@dmalibu.com

							<br>
							<br>
							<span style="font-size: 14px;">Comunícate con un click</span><hr style="margin: 5px 0 5px 0;">
							<img src="/template_2/img/whatsapp_ico.png" class="button_select" style=" width: 25px !important;     display: inline-block;">
							<span style="     display: inline-block;">952 654068</span>

						</h4>
						</div><img src="/template_2/img/staff/Patricia.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="https://api.whatsapp.com/send?phone=51952940460&text=" target="_blank">
						<div class="title">
							<h4>DAVID MERINO<br><span style="color: var(--main-bg-color-secundario)">
							Ejecutivo de Comercial - Supervisor</span><br>
							david.merino@dmalibu.com

							<br>
							<br>
							<span style="font-size: 14px;">Comunícate con un click</span><hr style="margin: 5px 0 5px 0;">
							<img src="/template_2/img/whatsapp_ico.png" class="button_select" style=" width: 25px !important;     display: inline-block;">
							<span style="     display: inline-block;">952 940460</span>

						</h4>
						</div><img src="/template_2/img/staff/David.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="https://api.whatsapp.com/send?phone=51990413005&text=" target="_blank">
						<div class="title">
							<h4>AYNETH CONDORI<br><span style="color: var(--main-bg-color-secundario)">
							Asesora Comercial</span><br>
							ayneth.condori@dmalibu.com

							<br>
							<br>
							<span style="font-size: 14px;">Comunícate con un click</span><hr style="margin: 5px 0 5px 0;">
							<img src="/template_2/img/whatsapp_ico.png" class="button_select" style=" width: 25px !important;     display: inline-block;">
							<span style="     display: inline-block;">990 413005</span>

						</h4>
						</div><img src="/template_2/img/staff/Ayneth.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="https://api.whatsapp.com/send?phone=51994478573&text=" target="_blank">
						<div class="title">
							<h4>JUANA OLIVERA<br><span style="color: var(--main-bg-color-secundario)">
							Asesora Comercial – Cono Sur</span><br>
							juana.olivera@dmalibu.com

							<br>
							<br>
							<span style="font-size: 14px;">Comunícate con un click</span><hr style="margin: 5px 0 5px 0;">
							<img src="/template_2/img/whatsapp_ico.png" class="button_select" style=" width: 25px !important;     display: inline-block;">
							<span style="     display: inline-block;">994 478573</span>

						</h4>
						</div><img src="/template_2/img/staff/Juanita.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="https://api.whatsapp.com/send?phone=51987065888&text=" target="_blank">
						<div class="title">
							<h4>MIRYAM ESCALANTE<br><span style="color: var(--main-bg-color-secundario)">
							Asesora Comercial - Cercado</span><br>
							miryam.escalante@dmalibu.com

							<br>
							<br>
							<span style="font-size: 14px;">Comunícate con un click</span><hr style="margin: 5px 0 5px 0;">
							<img src="/template_2/img/whatsapp_ico.png" class="button_select" style=" width: 25px !important;     display: inline-block;">
							<span style="     display: inline-block;">987 065888</span>

						</h4>
						</div><img src="/template_2/img/staff/Miryam.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="https://api.whatsapp.com/send?phone=51973099787&text=" target="_blank">
						<div class="title">
							<h4>ALEXANDRA LIENDO<br><span style="color: var(--main-bg-color-secundario)">
							Asesora Comercial – Cono Norte</span><br>
							alexandra.liendo@dmalibu.com

							<br>
							<br>
							<span style="font-size: 14px;">Comunícate con un click</span><hr style="margin: 5px 0 5px 0;">
							<img src="/template_2/img/whatsapp_ico.png" class="button_select" style=" width: 25px !important;     display: inline-block;">
							<span style="     display: inline-block;">973 099787</span>

						</h4>
						</div><img src="/template_2/img/staff/Alexandra.jpg" alt="">
					</a>
				</div>
				--}}
			</div>
				</div>
				</div>
				@endif


			</div>
			<!-- /container -->
		</div>
		<!-- /bg_white -->
	</main>
	<!--/main-->

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_2/css/contact.css" rel="stylesheet">
    <link href="/template_2/css/about.css" rel="stylesheet">
@stop
@section('plugins-js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>
<script type="text/javascript" src="/template_2/js/contact.js"></script>

<script type="text/javascript">

	//const owlCarousel = $('.owl-carousel');
	//const owlCarouselTitle = document.querySelector('#owl-carousel-title');

	//get_staff($(`select[name=place_id]`).val());

	$('#home_company-map').locationpicker({
		enableAutocomplete: true,
		enableReverseGeocode: true,
		radius: 0,
		location: {
			latitude: $('#company_latitude').val(),
			longitude: $('#company_longitude').val()
		},
		inputBinding: {
			// latitudeInput: $('#product_latitude'),
			// longitudeInput: $('#product_longitude'),
			// locationNameInput: $('#product_address')
		}
	});

	fill_place_information();

	function fill_place_information(){
		axios.get(`/api/template_2/place/${$(`select[name=place_id]`).val()}`)
		.then((response) => {
			$(`#contact_email_`).html(response.data.email);
			$(`#contact_address`).html(response.data.address);
			$(`#contact_cel`).html(response.data.cel);
			$(`#contact_phone`).html(response.data.phone);
			/*$(`#contact_geo`).html(response.data.geolocalization);*/
			var content= '';
			content = response.data.geolocalization;

			/*alert(content);*/
			$('#contact_geo').html(``);
			$('#contact_geo').html(content);
		});
	}

    $(`select[name="place_id"]`).on('change', function(e){
        axios.post(`/api/template_2/set-place`, {
            'place_id': e.target.value,
        })
        .then((response) => {
        	location.reload();
        });
    });

	// $(`select[name=place_id]`).on('change', function(e){
	// 	fill_place_information();
	// 	const channel_name = $(e.target).find(":selected").text();
	// 	owlCarouselTitle.innerHTML = `Nuestro Equipo de Ventas ${channel_name}`;
	// 	get_staff(e.target.value);
	// });

	// function get_staff(place_id)
	// {
	// 	axios.get(`/api/place/${place_id}/staff`)
	// 	.then((response) => {
	// 		const people = response.data;
	// 		//owlCarousel.trigger('destroy.owl.carousel');

	// 		if (people.length) {

	// 		}

	// 	});
	// }



</script>


@stop
