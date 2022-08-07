
@extends('template_4.layouts.index')
@section('content')

<main class="bg_gray ">
	<div class="featured lazy" data-bg="url(https://dl.dropboxusercontent.com/s/o8n2d74ji2wtal9/img_contacto.jpg?dl=0)">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container margin_60">
					<div class="row justify-content-center">
						<div class="col-lg-6 text-center wow" data-wow-offset="150">
							<h3>CONTACTO</h3>
						</div>
					</div>
				</div>
			</div>
	</div>

	<div class="bg_white">
		<div class="container py-5">
			<div class="row">
				<div class="col-md-7">
					<div class="font-weight-bold" style="font-size: 1.5em;">Contacto</div>
					<hr class="my-3" style="border-style: dashed;">
					<div class="text-justify" style="font-size: 16px; line-height: 1.2;">
						Desde esta página puedes encontrar el número de teléfono de atención al cliente de kamasa en el que te atenderán para cualquier duda que tengas. También puedes ponernte en contacto con nosotros a través del formulario que ves a lado derecho si tienes algún problema en esta web. Porfavor ten en cuenta que desde este formulario no podemos atender consultas relativas al re-envío de facturas, presupuestos a minoristas, descuentos, altas como proveedores u ofertas laborales.
					</div>
					<table class="my-4">
						<tr>
							<td><i class="far fa-envelope fa-5x pr-3" style="color: #e98b3b;"></i></td>
							<td style="font-size: 16px; line-height: 1.2;">
								Información o contacto general : <b>{{$company_main->email}}</b><br>
								Servicio técnico o consultas de alguna compra : <b>atencionalcliente@kamasa.pe</b><br>
								Para solicitar cotizaciones u otros : <b>ventas@kamasa.pe</b><br>
								Área contable, envío de facturas electrónicas, otros : <b>contabilidad@kamasa.pe</b><br>
							</td>
						</tr>
					</table>
					<div class="text-justify" style="font-size: 16px; line-height: 1.2;">Mas Información:</div>
					<div class="row">
						<div class="col-md-6">
							<div class="box_contacts">
								<table>
									<tr>
										<td><i class="ti-map-alt pr-3" style="color: #e98b3b;"></i></td>
										<td class="text-left" style="font-size: 16px; line-height: 1.2;">
											Nuestra tienda : <br>
											<b>{{$company_main->address}}</b>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<div class="box_contacts">
								<table>
									<tr>
										<td><i class="ti-headphone-alt pr-3" style="color: #e98b3b;"></i></td>
										<td class="text-left" style="font-size: 16px; line-height: 1.2;">
											Nuestros Números : <br>
											<b>{{$company_main->cel}}<br>{{$company_main->phone}}</b>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card">
					  <div class="card-body">
							<div class="font-weight-bold mb-2" style="font-size: 1.5em;">Llenar el formulario</div>
					    <form>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Nombres *" id="contact_name">
									<div id="contact-error-name" class="mensaje-error text-danger"></div>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Apellidos *" id="">
									<div id="contact-error-name" class="mensaje-error text-danger"></div>
								</div>
								<div class="form-group">
									<input class="form-control" type="email" placeholder="Correo *" id="contact_email">
									<div id="contact-error-email" class="mensaje-error text-danger"></div>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Celular / Whatsapp *" id="contact_cellphone">
									<div id="contact-error-email" class="mensaje-error text-danger"></div>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Asunto *" id="contact_subject">
									<div id="contact-error-subject" class="mensaje-error text-danger"></div>
								</div>
								<div class="form-group">
									<textarea class="form-control" style="height: 150px;" placeholder="Tu consulta *" id="contact_msg"></textarea>
									<div id="contact-error-msg" class="mensaje-error text-danger"></div>
								</div>
								<div class="form-group">
									<button type="button" class="btn_1" id="contact__send"><b>Enviar Mensaje</b></button>
								</div>
					    </form>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="bg_white" id="ubicacion">
		<input type="hidden" id="company_latitude" name="latitude" value="{{ $company->latitude }}">
		<input type="hidden" id="company_longitude" name="longitude" value="{{ $company->longitude }}">
		<div >
			{{--<div id="location"></div>	--}}
			{{--<div id="home_company-map"></div>--}}
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3792.815670285208!2d-70.29920348540301!3d-18.08008608766709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915ac91bade1c071%3A0x6f39eaf49489191d!2sZOFRATACNA!5e0!3m2!1sen!2spe!4v1590622664932!5m2!1sen!2spe" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			{{--
			<iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d797.5343543044748!2d-70.25090623942164!3d-18.03753895703797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915acf519648ea1d%3A0x55cb8a5ff0e27392!2sPlaza%20Eduardo%20Perez%20Gamboa!5e0!3m2!1ses-419!2spe!4v1589401748513!5m2!1ses-419!2spe" style="border: 0" allowfullscreen>
			</iframe>
			--}}
		</div>
	</div>
</main>
	<!--/main-->

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_4/css/contact.css" rel="stylesheet">

@stop
@section('plugins-js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>
<script type="text/javascript" src="/template_4/js/contact.js"></script>

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
</script>


@stop
