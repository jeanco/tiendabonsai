
@extends('template_1.layouts.index')
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
				<div class="col-lg-12">
						<h4 style="font-size: 2.5rem !important; line-height: 1.3; font-weight: bold;">{{ $blog['title'] }}</h4>
						<p style="font-size: 1.4rem !important; line-height: 1.3;">{{ substr(strip_tags(isset( $blog->content) ? $blog->content:  '' ), 0, 200)}} ...</p>
						<br>
					<figure class=" text-center"><img alt="" class="img-fluid" src="{{ ($blog['image'] != null) ? $blog['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}"></figure>
					<div class="text-right">Foto: {{ $blog['user']['first_name'] }}</div>
					<hr style="border-top: 3px solid #dfa01b; margin: 5px 0 15px 0;">

				</div>
				<div class="col-lg-9">
					<div class="">
					
						<div class="postmeta">
							<ul>
							<li><a href="#"><i class="ti-facebook">
							</i></a>
							</li>

							<li><a href="#"><i class="ti-twitter">
							</i></a>
							</li>

							<li><a href="#"><i class="ti-whatsapp">
							</i></a>
							</li>


							</ul>
						</div>
						<!-- /post meta -->

						<div class="post-content" style="font-size: 1.4rem !important; line-height: 1.3;">
							{!! $blog['content']  !!}
						
						</div>
					
					</div>
				
					
					
				</div>
				<!-- /col -->

				<aside class="col-lg-3" style="border-left: 2px solid #dfa01b;">
					<div class="widget search_blog">
						<div class="form-group">
							<input type="text" name="search" id="search" class="form-control" placeholder="Buscar..">
							<button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
						</div>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4 style="border-bottom: 3px solid #dfa01b; padding-bottom: 7px;">LO MÁS VISTO</h4>
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
							<li class="text-center">
								
								<a href="/blog?tag=bonsai-para-todos"><img src="/template_1/img/proyecto_para_todos.jpg" width="140px">
										
									</a>

							</li>

							{{-- 
							<li>
								<div class="alignleft">
									<a href="blog-post.html#0"><img src="/template_1/img/blog-5.jpg" alt=""></a>
								</div>
								<small>Category - 11.08.2016</small>
								<h3><a href="blog-post.html#" title="">Verear qualisque ex minimum...</a></h3>
							</li>
							<li>
								<div class="alignleft">
									<a href="blog-post.html#0"><img src="/template_1/img/blog-6.jpg" alt=""></a>
								</div>
								<small>Category - 11.08.2016</small>
								<h3><a href="blog-post.html#" title="">Verear qualisque ex minimum...</a></h3>
							</li>
							<li>
								<div class="alignleft">
									<a href="blog-post.html#0"><img src="/template_1/img/blog-4.jpg" alt=""></a>
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
    <link href="/template_1/css/blog.css" rel="stylesheet">

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