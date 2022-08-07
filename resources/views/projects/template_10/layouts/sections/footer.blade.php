<!--<footer class="revealed">-->
<footer class="">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6" style="">
					<h3 data-target="#collapse_1">{{ $company_main->business_name }}</h3>
					<img src="{{ $company_main->logotype_white }}" alt=""  height="60" style="padding-bottom: 15px;">
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<li><a href="/nosotros">Sobre Nosotros</a></li>
							<li><a href="/catalogo">Productos</a></li>
							<li><a href="/servicios">Servicios</a></li>
							<!--li><a href="/ingresar">Mi cuenta</a></li-->
							<li><a href="/blog">Blog</a></li>
							<li><a href="/contacto">Contacto</a></li>
							<li><a href="/formas-de-pago">Formas de Pago</a></li>
							<li><a href="/metodos-de-entrega">Métodos de Entrega</a></li>
							<li><a href="/cambios-y-devoluciones">Cambios y Devoluciones</a></li>
							<li><a href="/terminos-y-condiciones">Términos y Condiciones</a></li>
							<li><a href="/consultar-certificados">Consultar Certificados</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_2">Categorías</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							@foreach ($header_categories as $key => $category)											
										<li><a href="/catalogo?categoria={{ $category['slug'] }}&subcategoria=">{{ $category['name'] }}</a></li>
							@endforeach
						</ul>
						<hr>
						<ul>
							
							<li><a href="/suscripcion" style="color: var(--main-bg-color-secundario);">Suscríbete</a></li>
							<li><a href="/contacto">Ubícanos</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_3">Ubícanos</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li ><i  style="color: var(--main-bg-color-secundario);" class="ti-home"></i>{{ $company_main->address }}</li>
							<li ><i  style="color: var(--main-bg-color-secundario);" class="ti-headphone-alt"></i>{{ $company_main->cel }}</li>
							<li ><i  style="color: var(--main-bg-color-secundario);" class="ti-headphone-alt"></i>{{ $company_main->phone }}</li>
							<li ><i  style="color: var(--main-bg-color-secundario);" class="ti-email"></i><a href="#"> {{ $company_main->email }}</a></li>
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
								
								<li><a href="{{ $company_main->facebook }}" target="_blank"  style="color: var(--main-bg-color-secundario);" ><i class="ti-facebook"></i></a></li>
								<li><a href="{{ $company_main->instagram }}" target="_blank"  style="color: var(--main-bg-color-secundario);" ><i class="ti-instagram"></i></a></li>
								<li><a href="{{ $company_main->youtube }}" target="_blank"  style="color: var(--main-bg-color-secundario);" ><i class="ti-youtube"></i></li>
									<li><a href="{{ $company_main->twitter }}" target="_blank"  style="color: var(--main-bg-color-secundario);" ><i class="ti-twitter"></i></a></li>
								<li><a href="{{ $company_main->linkedin }}" target="_blank"  style="color: var(--main-bg-color-secundario);" ><i class="ti-linkedin"></i></a></li>


							</ul>
						</div>
					</div>
					<!--span style="color: white">Pago Seguro con Culqi.com </span><br><br><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS35OBi-x43ZTOVhwkqYkqtW4JDDvL-WYarVQ&usqp=CAU" height="40"-->
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
						<li><img data-src="https://dl.dropboxusercontent.com/s/owf28h9tacn8yph/PAGOS.png?dl=0" alt="" width="" height="40" class="lazy"></li>
						
					</ul>
				</div>
				<div class="col-lg-4">
					<ul class="additional_links">
						<!--li><a href="index.html#0">Terms and conditions</a></li>
						<li><a href="index.html#0">Privacy</a></li-->
						<li>Desarrolado por Noveltie <span>© 2021 {{ $company_main->business_name }}</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->

