
@extends('template_13.layouts.index')
@section('content')
<main class="bg_gray">
		<div class="container margin_30">
			<div class="page_header">
				<div class="breadcrumbs">
					<ul>
						<li><a href="/">Inicio</a></li>
						
						<li>Blog</li>
					</ul>
				</div>
			</div>
			<!-- /page_header -->
			<div class="row">
				<div class="col-lg-9">
					<div class="singlepost">
						<figure><img alt="" class="img-fluid" src="{{ ($blog['image'] != null) ? $blog['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}"></figure>
						<h1>{{ $blog['title'] }}</h1>
						<div class="postmeta">
							<ul>
							<li><a href="#"><i class="ti-folder"></i> {{ $blog['tag']['name'] }}</a></li>
								<li><i class="ti-calendar"></i> {{ $blog['created_at']->format('d/m/Y') }}</li>
								<li><a href="#"><i class="ti-user"></i> {{ $blog['user']['first_name'] }}</a></li>
								<!--li><a href="blog-post.html#"><i class="ti-comment"></i> (14) Comments</a></li-->
							</ul>
						</div>
						<!-- /post meta -->
						<div class="post-content">
							{!! $blog['content']  !!}
							{{-- 
							<div class="dropcaps">
								<p>Aorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
							--}}
						</div>
						<!-- /post -->
					</div>
					<!-- /single-post -->

					<!--div id="comments">
						<h5>Comments</h5>
						<ul>
							<li>
								<div class="avatar">
									<a href="blog-post.html#"><img src="/template_13/img/avatar1.jpg" alt="">
									</a>
								</div>
								<div class="comment_right clearfix">
									<div class="comment_info">
										By <a href="blog-post.html#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="blog-post.html#"><i class="icon-reply"></i></a>
									</div>
									<p>
										Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
									</p>
								</div>
								<ul class="replied-to">
									<li>
										<div class="avatar">
											<a href="blog-post.html#"><img src="/template_13/img/avatar2.jpg" alt="">
											</a>
										</div>
										<div class="comment_right clearfix">
											<div class="comment_info">
												By <a href="blog-post.html#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="blog-post.html#"><i class="icon-reply"></i></a>
											</div>
											<p>
												Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
											</p>
											<p>
												Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
											</p>
										</div>
										<ul class="replied-to">
											<li>
												<div class="avatar">
													<a href="blog-post.html#"><img src="/template_13/img/avatar2.jpg" alt="">
													</a>
												</div>
												<div class="comment_right clearfix">
													<div class="comment_info">
														By <a href="blog-post.html#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="blog-post.html#"><i class="icon-reply"></i></a>
													</div>
													<p>
														Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
													</p>
													<p>
														Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
													</p>
												</div>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<div class="avatar">
									<a href="blog-post.html#"><img src="/template_13/img/avatar3.jpg" alt="">
									</a>
								</div>

								<div class="comment_right clearfix">
									<div class="comment_info">
										By <a href="blog-post.html#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="blog-post.html#"><i class="icon-reply"></i></a>
									</div>
									<p>
										Cursus tellus quis magna porta adipiscin
									</p>
								</div>
							</li>
						</ul>
					</div>

					<hr>

					<h5>Leave a comment</h5>
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<input type="text" name="name" id="name2" class="form-control" placeholder="Name">
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<input type="text" name="email" id="email2" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<input type="text" name="email" id="website3" class="form-control" placeholder="Website">
							</div>
						</div>
					</div>
					<div class="form-group">
						<textarea class="form-control" name="comments" id="comments2" rows="6" placeholder="Comment"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" id="submit2" class="btn_1 add_bottom_15">Submit</button>
					</div-->

					<div>
						<div id="fb-root"></div>
						<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0&appId=302703559837888&autoLogAppEvents=1"></script>

						<div class="fb-comments" data-href="https://www.facebook.com/LadrillosMaxx/" width="100%" data-numposts="10" data-width=""></div>
					</div>
					
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<div class="widget search_blog">
						<div class="form-group">
							<input type="text" name="search" id="search" class="form-control" placeholder="Buscar..">
							<button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
						</div>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Últimas publicaciones</h4>
						</div>
						<ul class="comments-list">
							@foreach ($last_blogs as $blog)
							<li>
								<div class="alignleft">
								<a href="/blog/{{ $blog['slug'] }}"><img src="{{ ($blog['image'] != null) ? $blog['image']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt=""></a>
								</div>
								<small>{{ $blog['tag']['name'] }} - {{ \Carbon\Carbon::parse($blog['created_at'])->format('d.m.Y') }}</small>
								<h3><a href="/blog/{{ $blog['slug'] }}" title="">{{ substr(strip_tags($blog['title']), 0, 50) }}...</a></h3>
							</li>	
							@endforeach
							{{-- 
							<li>
								<div class="alignleft">
									<a href="blog-post.html#0"><img src="/template_13/img/blog-5.jpg" alt=""></a>
								</div>
								<small>Category - 11.08.2016</small>
								<h3><a href="blog-post.html#" title="">Verear qualisque ex minimum...</a></h3>
							</li>
							<li>
								<div class="alignleft">
									<a href="blog-post.html#0"><img src="/template_13/img/blog-6.jpg" alt=""></a>
								</div>
								<small>Category - 11.08.2016</small>
								<h3><a href="blog-post.html#" title="">Verear qualisque ex minimum...</a></h3>
							</li>
							<li>
								<div class="alignleft">
									<a href="blog-post.html#0"><img src="/template_13/img/blog-4.jpg" alt=""></a>
								</div>
								<small>Category - 11.08.2016</small>
								<h3><a href="blog-post.html#" title="">Verear qualisque ex minimum...</a></h3>
							</li>
							--}}
						</ul>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Categorías</h4>
						</div>
						<ul class="cats">
							@foreach ($tags as $tag)
							<li><a href="/blog?tag={{ $tag->slug }}">{{ $tag->name }} <span>({{ $tag->count }})</span></a></li>
							
							@endforeach
							{{-- 
							<li><a href="blog-post.html#">Places to visit <span>(21)</span></a></li>
							<li><a href="blog-post.html#">New Places <span>(44)</span></a></li>
							<li><a href="blog-post.html#">Suggestions and guides <span>(31)</span></a></li>
							--}}
						</ul>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Tags</h4>
						</div>
						<div class="tags">
							@foreach ($tags as $tag)
								<a href="/blog?tag={{ $tag->slug }}">{{ $tag->name }}</a>
								
							@endforeach
							{{-- 
							<a href="blog-post.html#">Bars</a>
							<a href="blog-post.html#">Cooktails</a>
							<a href="blog-post.html#">Shops</a>
							<a href="blog-post.html#">Best Offers</a>
							<a href="blog-post.html#">Transports</a>
							<a href="blog-post.html#">Restaurants</a>
							--}}
						</div>
					</div>
					<!-- /widget -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_13/css/blog.css" rel="stylesheet">

@stop
@section('plugins-js')

<script>
	document.querySelector(`#search`)
		.addEventListener('keyup', (e) => {
			if (e.keyCode == 13) {
				window.location.replace(`/blog?search=${e.target.value}`);
			}
		});
</script>

@stop