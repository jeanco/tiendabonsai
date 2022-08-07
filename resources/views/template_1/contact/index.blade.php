
@extends('template_1.layouts.index')
@section('content')

<main class="bg_gray">


	{{--<div class="top_banner general banner_contact" style="height: 250px;">
			<div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgbargba(35, 34, 34, 0.56)"
			style="background-image:  url({{ isset( $gallery_company[10]->resource) ? $gallery_company[10]->resource:  ''  }});
				   background-size: cover;">

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
			<!--img src="/template_1/img/top_about.jpg" class="img-fluid" alt="" style="filter: brightness(0.5);"-->
		</div>--}}
			{{--<div class=" margin_60" style="padding-top: 0px;">
				<div class="main_title">
			

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
				
				<!-- /row -->
			</div>--}}
			<!-- /container -->
		<div id="ubicacion" class="bg_white">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-md-4">
						<h4 class="pb-3" style="font-weight: bold; padding-top: 20px">Contáctenos</h4>
					</div>
					<div class="col-md-8 form-group ">
									<div class="row">
										<div class="col-md-5">
											<h4 class="pb-3" style="font-weight: bold; padding-top: 20px;">Seleccione La sucursal:</h4>
										</div>
										<div class="col-md-7" style="padding-top: 15px;">
											<div class="custom-select-form">
										<select class="wide " name="place_id" style="display: none;">
	                                	@foreach($places as $key => $place)
	             		                    @if($place['id'] == $place_selected)
												<option value="{{ $place['id'] }}" selected="selected">{{ $place['name'] }}</option>
	                                		@else
												<option value="{{ $place['id'] }}">{{ $place['name'] }}</option>
	                                		@endif
	                                	@endforeach
										</select>
									</div>
										</div>

									</div>

								</div>
				</div>
				
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


			</div>
			<!-- /container -->
			<div class="row justify-content-center" style="background: #212121; color: white;">
					<div class="col-lg-3">
						<div class="box_contacts">
							<!--i class="ti-email"></i-->
							<img src="/template_1/img/mensajes.png" width="55px" style="    padding-top: 0px;">
							<h2 style="color: white;">Correo Electrónico</h2>
							<a style="color: white;" href="#" id="contact_email_">{{$company_main->email}}</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="box_contacts">
							<!--i class="ti-map-alt"></i-->
							<img src="/template_1/img/ubicacion.png" width="55px" style="    padding-top: 0px;">
							<h2 style="color: white;">Nuestra Sucursal</h2>
							<div  id="contact_address">{{$company_main->address}}</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="box_contacts">
							<!--i class="ti-headphone-alt"></i-->
							<img src="/template_1/img/cel.png" width="55px" style="    padding-top: 0px;">
							<h2 style="color: white;">Celular</h2>
							<a href="#" style="color: white;" id="contact_cel">{{$company_main->cel}}</a> <br> <a href="#" style="color: white;"  id="contact_phone">{{$company_main->phone}}</a>
							<!--small>de 9 a 7 pm</small-->
						</div>
					</div>
				</div>
		</div>
		<!-- /bg_white -->
	</main>
	<!--/main-->

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_1/css/contact.css" rel="stylesheet">

@stop
@section('plugins-js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>
<script type="text/javascript" src="/template_2/js/contact.js"></script>

<script type="text/javascript">
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
			console.log(response.data.geolocalization);
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

	$(`select[name=place_id]`).on('change', function(){
		fill_place_information();
	});

</script>


@stop