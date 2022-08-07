	
<div class="container margin_60_35 add_bottom_30">
				{{--<div class="main_title">
					<h2>Síguenos en  {{$company_main->business_name}}</h2>

				</div>--}}

				<div class="row justify-content-center">
					<div class="col-md-4 col-sm-12 col-12" style="padding-bottom: 15px">
						<div class="box_contacts_" >

							<div class="content_info">
								<i ></i>
								<div class=" text-center" style="font-size: 1.5em; "><b>Síguenos </b>en nuestra Redes Sociales</div>
							</div>
							
							
						</div>
					</div>
					@if($company_main->twitter)
					<div class="col-md-2 col-sm-3 col-4">
						<a href="{{ $company_main->twitter }}" target="blank_">
							<div class="box_contacts_home">
								<div class="content_info">
								<i class="ti-twitter" style="color:white;" ></i>
								<!--h4>twitter</h4-->
							</div>
						
						
							
							
							<!--h2>Allaia Showroom</h2>
							<div>6th Forrest Ray, London - 10001 UK</div>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small-->
						</div>
						</a>
					</div>
					@endif
					
					@if($company_main->youtube)
					<div class="col-md-2 col-sm-3 col-4">
						<a href="{{ $company_main->youtube }}" target="blank_">
							<div class="box_contacts_home">
								<div class="content_info">
								
								<i style="color: white" class="fab fa-youtube fa-2x"></i>
								<!--h4>instagram</h4-->
							</div>
						
							
							
							<!--h2>Allaia Showroom</h2>
							<div>6th Forrest Ray, London - 10001 UK</div>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small-->
						</div>
						</a>
					</div>
					@endif
					
					@if($company_main->facebook)
					<div class="col-md-2 col-sm-3 col-4">
						<a href="{{ $company_main->facebook }}" target="blank_"><div class="box_contacts_home">
								<div class="content_info">
								<i class="ti-facebook" style="color:white;" ></i>
								<!--h4>facebook</h4-->
							</div>
						
							
							
							<!--h2>Allaia Showroom</h2>
							<div>6th Forrest Ray, London - 10001 UK</div>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small-->
						</div>
						</a>
					</div>
					@endif

					@if($company_main->instagram)
					<div class="col-md-2 col-sm-3 col-4">
						<a href="{{ $company_main->instagram }}" target="blank_"><div class="box_contacts_home">
								<div class="content_info">
								<i class="ti-instagram" style="color:white;" ></i>
								<!--h4>facebook</h4-->
							</div>
						
							
							
							<!--h2>Allaia Showroom</h2>
							<div>6th Forrest Ray, London - 10001 UK</div>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small-->
						</div>
						</a>
					</div>
					@endif
				</div>


			

			</div>
