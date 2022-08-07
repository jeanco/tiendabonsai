
@extends('template_1.layouts.index')
@section('content')

	<main class="bg_gray">
		<div class="container margin_30">
			<!--div class="page_header">
				<div class="breadcrumbs">
					<ul>
						<li><a href="blog.html#">Home</a></li>
						<li><a href="blog.html#">Category</a></li>
						<li>Page active</li>
					</ul>
				</div>
				<h1>Allaia Blog &amp; News</h1>
			</div-->
			<!-- /page_header -->
			<div class="row" >
				<aside class="col-lg-9">
					<div class="widget search_blog d-none d-sm-none d-md-none d-lg-block">
						<div class="form-group">
							<input type="text" name="search" id="search_blog" class="form-control" placeholder="Buscar..">
							<button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
						</div>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Publicaciones recientes</h4>
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
							
						
						</ul>
					</div>
					<!-- /widget -->
					
					
				</aside>

				<aside class="col-lg-3">

					<div class="widget">
						<div class="widget-title">
							<h4>Categorías</h4>
						</div>
						<ul class="cats">
							@foreach ($tags as $tag)
								<li><a href="#" class="tag__change" data-slug="{{ $tag->slug }}">{{ $tag->name }} <span>{{ $tag->count }}</span></a></li>
							@endforeach

							{{-- 
							<li><a href="blog.html#">Places to visit <span>(21)</span></a></li>
							<li><a href="blog.html#">New Places <span>(44)</span></a></li>
							<li><a href="blog.html#">Suggestions and guides <span>(31)</span></a></li>
							--}}

							<li class="text-center">
								
								<a href="/blog?tag=bonsai-para-todos"><img src="/template_1/img/proyecto_para_todos.jpg" width="140px">
										
									</a>

							</li>
						</ul>
					</div>
				</aside>
				<!-- /aside -->
				<div class="col-lg-12" id="table_data_blog">
					@include('template_1.blog.list_blogs')
					<!-- /pagination -->
				</div>
				<!-- /col -->

				
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
	<script src="/template_1/js/blogs.js"></script>

@stop