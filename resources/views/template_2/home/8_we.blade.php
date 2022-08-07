<div class="container margin_60_35 add_bottom_30">
				<div class="main_title">

				</div>

				<div>
					
				</div>
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-5">
						<h2 style="font-weight: bold; padding-top: 20px">Sobre  {{$company_main->business_name}}</h2>

						{!!$company_main->description_company!!}
						<br>
						<a class="btn_1" href="/nosotros"  role="button" style="margin-top: 20px;">Ver más</a>
					</div>
					<div class="col-lg-5 pl-lg-5 text-center  d-lg-block">
<br>
							<div id="carousel-home" >
			<div class="owl-carousel owl-theme" >
				@foreach ($secction_gallery_doctor as $key => $banner)
				<div class="owl-slide cover" style="background-image: url({{ $banner['image'] }});" style="height:400px;">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-end">
								<div class="col-lg-12 static">
									<div class="slide-text text-left white">
									<h2 class="owl-slide-animated owl-slide-title">{!! $banner['title'] !!}</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											{{ $banner['subtitle'] }}
										</p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			
			<div id="icon_drag_mobile"></div>
</div>
					</div>
				</div>
		
				
				<!--div class="row justify-content-center align-items-center">
					<div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
							<img src="/template_2/img/about_2.svg" alt="" class="img-fluid" width="350" height="268">
					</div>
					<div class="col-lg-5">
						<div class="box_about">
							<h2>Top Brands</h2>
							<p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
							<p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
							<img src="/template_2/img/arrow_about.png" alt="" class="arrow_2">
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
							<img src="/template_2/img/about_3.svg" alt="" class="img-fluid" width="350" height="316">
					</div>
				</div-->
				
			</div>