@extends('template_8.layouts.index')
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url( {{ isset( $gallery_company[4]->resource) ? $gallery_company[4]->resource:  ''  }});">
    <div class="auto-container">
        <h1>{{ $post['title'] }}</h1>
    </div>
</section>
<!--End Page Title-->
<!--Sidebar Page Container-->
<div class="sidebar-page-container">
  <div class="auto-container">
      <div class="row clearfix">
        <!--Content Side-->
        <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="blog-single">
            <!--News Block-->
            <div class="news-block-two">
                <div class="inner-box">
                    <div class="image">
                        <img src="{{ ($post['image']) ? $post['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="" />
                    </div>
                    <div class="lower-box">
                        <div class="content ml-0 mb-2" style="top: 0;">
                            <ul class="post-meta">
                                <li><span class="icon fa fa-calendar"></span>{{ \Date::parse($post['created_at'])->format('d \d\e F\, Y') }}</li>
                            </ul>
                            <h3>{{ $post['title'] }}</h3>
                            <div class="text">

                                {!! $post['content']  !!}
                                {{--
                                <p>Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system, and expound the actual teachings of the great explorer the truth, the master-builder of human happiness A lot of auto repair customerss questions the importance of wheel alignment. Is it really necessary yes, it is.</p>
                                --}}

                            </div>
                        </div>
                        <div class="post-share-options clearfix">
                            <div class="pull-left">
                                <ul class="social-icon-two">
                                    <li class="share">Compartir:</li>
                                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-whatsapp"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!--Sidebar Side-->
        <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <aside class="sidebar sidebar-padding with-border">
                <!--Blog Category Widget-->
                <div class="sidebar-widget sidebar-blog-category">
                    <div class="sidebar-title">
                        <h2>Categorías</h2>
                    </div>
                    <ul class="blog-cat">
                        @foreach($tags as $tag)
                        <li><a href="/blog?tag={{ $tag['slug'] }}">{{ $tag['name'] }}</a></li>
                        @endforeach
                        {{--
                        <li><a href="/blog">Eventos</a></li>
                        <li><a href="/blog">Novedades</a></li>
                        --}}
                    </ul>
                </div>
                <!-- Popular Posts -->
                <div class="sidebar-widget popular-posts">
                    <div class="sidebar-title"><h2>Publicaciones recientes</h2></div>

                    @foreach($last_posts as $post)
                    <article class="post">
                      <figure class="post-thumb">
                        <div style="    background-image: url({{ $post['image'] ? $post['image']['resource_thumb'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }});
    height: 70px;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;"></div>

                        <a class="overlay" href="/blog/{{ $post['slug'] }}">

                            <span class="icon flaticon-unlink"></span></a></figure>
                      
                        <div class="text"><a href="/blog/{{ $post['slug'] }}">{{ $post['title'] }}</a></div>
                        <ul class="post-meta">
                          <li><span class="icon fa fa-calendar"></span>{{ $post['created_at']->format('d') }} {{ substr(strtoupper(\Date::parse($post['created_at'])->format('F')),0,3) }} {{ $post['created_at']->format('Y') }}</li>
                        </ul>
                    </article>
                    @endforeach
                    {{--
                    <article class="post">
                      <figure class="post-thumb"><img src="/template_8/images/resource/post-thumb-2.jpg" alt=""><a class="overlay" href="/blog-perfil"><span class="icon flaticon-unlink"></span></a></figure>
                        <div class="text"><a href="/blog-perfil">Won best car dealer award of the year 2016.</a></div>
                        <ul class="post-meta">
                          <li><span class="icon fa fa-calendar"></span>19 NOV 2020</li>
                        </ul>
                    </article>

                    <article class="post">
                      <figure class="post-thumb"><img src="/template_8/images/resource/post-thumb-3.jpg" alt=""><a class="overlay" href="/blog-perfil"><span class="icon flaticon-unlink"></span></a></figure>
                        <div class="text"><a href="/blog-perfil">We selling only high quality cars to our customers.</a></div>
                        <ul class="post-meta">
                          <li><span class="icon fa fa-calendar"></span>20 NOV 202</li>
                        </ul>
                    </article>
                    --}}
                </div>
            </aside>
        </div>
      </div>
  </div>
</div>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
