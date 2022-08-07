@extends('template_1.layouts.index')
@section('content')

<main class="bg_gray">

	
		<!--/top_banner-->
			<div class="container margin_60_35 add_bottom_30">
				
					
				
				<div class="row justify-content-center align-items-center">
					
					<div class="col-lg-12">
						<!--h2 style="font-weight: bold; padding-top: 20px">Apasionados por el arte bonsái y comprometidos con la naturaleza
¡Somos el Club Bonsái Tacna!</h2-->

						{!!$company_main->description_company!!}
					</div>
					
					
				</div>
				<div class="row">
					<div class="col-lg-3 pl-lg-5 text-center ">
					</div>

					<div class="col-lg-6 pl-lg-5 text-center " style="padding:40px;">

							<iframe width="100%" height="380" src="https://www.youtube.com/embed/{{ isset($videoyou[0]) ? $videoyou[0]:  ''  }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 25px;"></iframe>
					</div>
					<div class="col-lg-3 pl-lg-5 text-center ">
					</div>
					
				</div>
					
				</div>
		
			
				
			</div>
			<!-- /container -->

		
			
		

	<div class="container margin_60_35 add_bottom_30"  >
	<div class="row">
		<!--div class="col-md-3" >
			<div class="row">
				<div class="col-md-12">
					
				
									<a href="blog-post.html"><img src="template_1/img/blog-1.jpg" alt="" style="width:100%">
										
									</a>
							
								
				
				</div>

				
			</div>
			
						
				</div-->
		<div class="row">

			<div class="col-lg-3">

				<img src="{{ isset( $gallery_company[0]->resource) ? $gallery_company[0]->resource:  ''  }}" class="img-fluid" alt="">
				
			</div>
			<div class="col-lg-9 post_info">
									{!!$company_main->vision!!}
									
								</div>
		</div>

		
		
	</div>
</div>


		<!-- /container -->
	</main>
	<!--/main-->

<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_11/css/about.css" rel="stylesheet">


@stop
@section('plugins-js')



@stop