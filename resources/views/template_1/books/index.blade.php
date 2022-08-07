
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

				<div class="col-lg-12" id="">
					@include('template_1.books.list_books')
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
	{{--<script src="/template_1/js/blogs.js"></script>--}}

@stop