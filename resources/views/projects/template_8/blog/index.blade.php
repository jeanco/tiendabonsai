@extends('template_8.layouts.index')
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url( {{ isset( $gallery_company[4]->resource) ? $gallery_company[4]->resource:  ''  }});">
    <div class="auto-container">
        <h1>Noticias</h1>
    </div>
</section>
<!--End Page Title-->
<!--News Page Section-->
<section class="news-page-section">
  <div class="auto-container" id="table_data_blog">
      @include('template_8.blog.list_blogs')
  </div>
</section>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
	<script src="/template_8/js/blogs.js"></script>
@stop
