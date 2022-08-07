<!--<footer class="revealed">-->
<footer class="">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6" style="">
					<img src="{{ $company_main->logotype_white }}" alt=""  height="200" style="padding-bottom: 15px;">
					

					
				</div>
				<div class="col-lg-3 col-md-6" style="">
				
					<h3 data-target="#collapse_1">Enlaces</h3>

					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<li><a href="/nosotros">Sobre Nosotros</a></li>
							<li><a href="/catalogo">Nuestros Productos</a></li>
							<!--li><a href="/ingresar">Mi cuenta</a></li-->
							<li><a href="/blog">Publicaciones</a></li>
							<li><a href="/contacto">Contacto</a></li>
							<li><a href="#" class="info" data-toggle="modal" data-target="#payments_method">Términos y Condiciones</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6">
					<h3 data-target="#collapse_2">Servicios</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							{{--@foreach ($header_categories as $key => $category)
										<li><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=">{{ $category['name'] }}</a></li>
							@endforeach--}}

							@foreach ($services as $key => $service)
										<li><a href="/servicios/{{ $service->slug }}">{{ $service->name }}</a></li>
							@endforeach
						</ul>
						<hr>
						<ul>

							<!--li><a href="/cotizar" style="color: #fdd400">Cotizar</a></li>
							<li><a href="/contacto">Ubícanos</a></li-->
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6">
						<h3 data-target="#collapse_3">Ubícanos</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li style="padding-left: 0px;"><!--i class="ti-home"></i--><img src="/template_2/img/ubicacion.png" width="27px" style="padding:5px;" >{{ $company_main->address }}</li>
							<li style="padding-left: 0px;"><!--i class="ti-headphone-alt"></i--><img src="/template_2/img/cel.png" width="27px" style="padding:5px;" >{{ $company_main->cel }}</li>
							
							<li style="padding-left: 0px;"><!--i class="ti-email"></i--><img src="/template_2/img/mensajes.png" width="27px" style="padding:5px;" ><a href="#"> {{ $company_main->email }}</a></li>
							<li><a href="/contacto">Contacto</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_4">REDES SOCIALES</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<!--div id="newsletter">
						    <div class="form-group">
						        <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
						        <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
						    </div>
						</div-->
						<div class="follow_us">
							<!--h5>Redes Sociales</h5-->
							<ul>

								<li><a href="{{ $company_main->facebook }}" target="_blank"  style="color: #2bb0aa;" ><i class="ti-facebook"></i></a></li>
								<li><a href="{{ $company_main->instagram }}" target="_blank"  style="color: #2bb0aa;" ><i class="ti-instagram"></i></a></li>
								<li><a href="{{ $company_main->youtube }}" target="_blank"  style="color: #2bb0aa;" ><i class="ti-youtube"></i></li>
									<li><a href="{{ $company_main->twitter }}" target="_blank"  style="color: #2bb0aa;" ><i class="ti-twitter"></i></a></li>
								<li><a href="{{ $company_main->linkedin }}" target="_blank"  style="color: #2bb0aa;" ><i class="ti-linkedin"></i></a></li>


							</ul>
						</div>
					</div>
					{{--@if($company_main->online_payment)
					<span style="color: white">Pago Seguro con Culqi.com </span><br><br><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS35OBi-x43ZTOVhwkqYkqtW4JDDvL-WYarVQ&usqp=CAU" height="40">
					@endif --}}
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-lg-8">
					<ul class="footer-selector clearfix">
						<!--li>
							<div class="styled-select lang-selector">
								<select>
									<option value="English" selected>English</option>
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
							</div>
						</li>
						<li>
							<div class="styled-select currency-selector">
								<select>
									<option value="US Dollars" selected>US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
							</div>
						</li-->
						{{--@if($company_main->online_payment)
						<li><img  data-src="https://dl.dropboxusercontent.com/s/owf28h9tacn8yph/PAGOS.png?dl=0" alt="" width="" height="40" class="lazy"></li>
						@endif--}}
					</ul>
				</div>
				<div class="col-lg-4">
					<ul class="additional_links">
						<!--li><a href="index.html#0">Terms and conditions</a></li>
						<li><a href="index.html#0">Privacy</a></li-->
						<li>Desarrollado por <a href="https://noveltie.la/" target="_blank">Noveltie</a>  <span>©  <?php
              date_default_timezone_set('America/Lima');
                ?>
                 {{date('Y')}} {{ $company_main->business_name }}</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
