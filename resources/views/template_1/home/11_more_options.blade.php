

<div class="container margin_60_35 add_bottom_30"  style="border-top: 2px solid var(--main-bg-color-terciario);">
	<div class="row">
		<div class="col-md-6" style="border-right: 2px solid var(--main-bg-color-primario);">
			<div class="row">
				<div class="col-md-12">
					
									
					<a href="/blog/{{ isset( $posts_publicaciones[0]->slug) ? $posts_publicaciones[0]->slug:  ''  }}"><img src="{{ isset( $posts_publicaciones[0]->image->resource) ? $posts_publicaciones[0]->image->resource:  ''  }}" alt="" style="width:100%; padding-bottom: 20px;"></a>
							
								<div class="post_info">
									
									<h4 style="font-size: 1.6rem !important; line-height: 1.1;"><a href="/blog/{{ isset( $posts_publicaciones[0]->slug) ? $posts_publicaciones[0]->slug:  ''  }}">{{ isset( $posts_publicaciones[0]->title) ? $posts_publicaciones[0]->title:  ''  }}</a></h4>
									<p style="font-size: 1rem !important; line-height: 1.3; color: #4a4a4a;">{{ substr(strip_tags(isset( $posts_publicaciones[0]->content) ? $posts_publicaciones[0]->content:  '' ), 0, 350)}} ...</p>
									

								</div>
				
				</div>

				
			</div>
			
							<!-- /article -->
				</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6" style="border-right: 2px solid var(--main-bg-color-primario);">						
					<div class="post_info margin_line_bottom" >
									
						<h4 style="font-size: 1.6rem !important; line-height: 1.1;"><a href="/blog/{{ isset( $posts_publicaciones[1]->slug) ? $posts_publicaciones[1]->slug:  ''  }}">{{ isset( $posts_publicaciones[1]->title) ? $posts_publicaciones[1]->title:  ''  }}</a></h4>
									<p style="font-size: 1rem !important; line-height: 1.3; color: #4a4a4a;">{{ substr(strip_tags(isset( $posts_publicaciones[1]->content) ? $posts_publicaciones[1]->content:  '' ), 0, 120)}} ...</p>
									
					</div>

					<div class="post_info margin_line_bottom">
									
						<h4 style="font-size: 1.6rem !important; line-height: 1.1;"><a href="/blog/{{ isset( $posts_publicaciones[2]->slug) ? $posts_publicaciones[2]->slug:  ''  }}">{{ isset( $posts_publicaciones[2]->title) ? $posts_publicaciones[2]->title:  ''  }}</a></h4>
									<p style="font-size: 1rem !important; line-height: 1.3; color: #4a4a4a;">{{ substr(strip_tags(isset( $posts_publicaciones[2]->content) ? $posts_publicaciones[2]->content:  '' ), 0, 120)}} ...</p>
									
					</div>
				</div>

				<div class="col-md-6">							
					<div class="post_info margin_line_bottom">
									
						<h4 style="font-size: 1.6rem !important; line-height: 1.1;"><a href="/blog/{{ isset( $posts_publicaciones[3]->slug) ? $posts_publicaciones[3]->slug:  ''  }}">{{ isset( $posts_publicaciones[3]->title) ? $posts_publicaciones[3]->title:  ''  }}</a></h4>
									<p style="font-size: 1rem !important; line-height: 1.3; color: #4a4a4a;">{{ substr(strip_tags(isset( $posts_publicaciones[3]->content) ? $posts_publicaciones[3]->content:  '' ), 0, 120)}} ...</p>
									
					</div>

					<div class="post_info margin_line_bottom">
									
						<h4 style="font-size: 1.6rem !important; line-height: 1.1;"><a href="/blog/{{ isset( $posts_publicaciones[4]->slug) ? $posts_publicaciones[4]->slug:  ''  }}">{{ isset( $posts_publicaciones[4]->title) ? $posts_publicaciones[4]->title:  ''  }}</a></h4>
									<p style="font-size: 1rem !important; line-height: 1.3; color: #4a4a4a;">{{ substr(strip_tags(isset( $posts_publicaciones[4]->content) ? $posts_publicaciones[4]->content:  '' ), 0, 120)}} ...</p>
									
					</div>
				</div>

			</div>
		</div>

		<div class="col-md-12 text-center">
			<a class="phone_top"><strong><span><a href="/blog?tag=publicaciones" class="btn_1" style="margin-bottom: 20px; margin-top: 50px;">VER MÁS</a></span></strong></a>
		</div>
		
	</div>
	<div>
		
	</div>
	
</div>

		



<div class="container   text-center"  style="border-top: double var(--main-bg-color-terciario);">
	<div class="row">
		<div class="col-md-12">
					
				
								
								<div class="banner_info">
									
									<h4 style="margin-bottom: 0px;"><a href="{{ isset( $banners[0]->link) ? $banners[0]->link:  '' }}" style="font-family: 'fira_sans', sans-serif;">{!! isset( $banners[0]->title) ? $banners[0]->title:  ''  !!}</a></h4>
									
								</div>
				
				</div>
	
		
	</div>
</div>