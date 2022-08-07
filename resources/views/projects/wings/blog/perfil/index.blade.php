@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url({{ isset( $gallery_company[6]->resource) ? $gallery_company[6]->resource:  ''  }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">{{ $blog->title }}</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/">Inicio</a></li>
                <li><a href="/blog">Blog</a></li>
                <li>{{ $blog->title }}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                <!-- Left part start -->
                <div class="col-md-9">
                    <!-- blog start -->
                    <div class="blog-post blog-single">

                        <div class="dlab-post-media dlab-img-effect zoom-slow"> <a href="javascript:void(0);"><img src="{{ ($blog['image'] != null) ? $blog['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt=""></a> </div>

                        <div class="dlab-post-title ">
                            <h3 class="post-title"><a href="javascript:void(0);">{{ $blog->title }}</a></h3>
                        </div>

                        <div class="dlab-post-meta m-b20">
                            <ul><li class="post-date"> <i class="fa fa-calendar"></i><strong>{{ $blog['created_at']->format('d') }} {{ substr(\Date::parse($blog['created_at'])->format('F'),0 ,3) }}</strong> <span> {{ $blog['created_at']->format('Y') }}</span> </li></ul>
                        </div>

                        <div class="dlab-post-text">
                            {!! $blog['content'] !!}
                        </div>
                        <div class="dlab-post-tags clear">
                        <div class="post-tags"> <a href="/blog?tag={{ $blog->tag->slug }}">{{ $blog->tag->name }} </a> </div>
                        </div>
                    </div>
                    <!-- blog END -->
                </div>
                <!-- Left part END -->
                <!-- Side bar start -->
                <div class="col-md-3 blog-sticky-right">
                    <aside  class="side-bar">
                        <!-- <div class="widget">
                            <h4 class="widget-title">Buscar</h4>
                            <div class="search-bx">
                                <form role="search" method="post">
                                    <div class="input-group">
                                        <input name="text" type="text" class="form-control" placeholder="Escriba el título">
                                        <span class="input-group-btn">
                                        <button type="submit" class="site-button"><i class="fa fa-search"></i></button>
                                        </span> </div>
                                </form>
                            </div>
                        </div> -->

                        <div class="widget widget_categories">
                            <h4 class="widget-title">Categoría</h4>
                            <ul>
                                @foreach($tags as $x => $tag)
                                    <li><a href="/blog?tag={{ $tag->slug }}" class="" data-tag_slug={{ $tag['slug'] }} data-tag_id={{ $tag['id'] }}>{{ $tag['name'] }}</a> ({{ count($tag['posts']) }})</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget recent-posts-entry">
                            <h4 class="widget-title">Nuevas Publicaciones</h4>
                            <div class="widget-post-bx">
                                @foreach ($recent_blogs as $recent_blog)
                                <div class="widget-post clearfix">
                                        <div class="dlab-post-media"> <img src="{{ ($recent_blog['image'] != null) ? $recent_blog['image']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" width="200" height="143" alt=""> </div>
                                        <div class="dlab-post-info">
                                            <div class="dlab-post-header">
                                            <h6 class="post-title">{{ $recent_blog->title }}</h6>
                                            </div>
                                            <div class="dlab-post-meta">
                                                <ul>
                                                <li class="post-author">{{ $recent_blog->created_at->format('d-m-Y') }}</li>
                                                <li class="post-comment">{{ $recent_blog->tag->name }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
                <!-- Side bar END -->
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
