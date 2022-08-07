@if(count($videos)>0)
<div class="container  add_bottom_30">
				<!--div class="mb-3 text-center" style="font-size: 2em; padding-bottom: 5px; padding-top: 30px; font-weight: bold; color: var(--main-bg-color-primario);">VIDEOTECA</div-->

				
				<div class="row justify-content-center align-items-center">
					@foreach ($videos as $video)
					<div class="col-lg-4 text-center d-lg-block">
					<iframe width="100%" height="380" src="https://www.youtube.com/embed/{{ isset($video) ? $video:  ''  }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 25px;"></iframe>						
							
					</div>
					@endforeach
					
				</div>

			</div>

@endif
