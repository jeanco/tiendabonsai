@extends('miranda.layouts.index')
@section('content')
<!--Breadcrumbs start-->
<div class="breadcrumbs overlay-black">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumbs-title text-center">
                        <h1>Perfil de Blog</h1>
                    </div>
                    <div class="breadcrumbs-menu sm-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumbs end-->

<!--Latest blog start-->
<div class="blog-pages pt-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 col-12">
                <article class="blog-details">
                    <div class="blog-thubmnail">
                        <a href="#">
                            <img src="{{ ($blog['image'] != null) ? $blog['image']['resource'] : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png' }}" alt="">
                        </a>
                    </div>
                    <div class="article-desc bg-1">
                        <div class="post-title"><h4>{{ $blog['title'] }}</h4></div>
                        <div class="mb-3" style="font-size: 13px;">
                          <span>{{ $blog['created_at']->format('d') }}</span> de
                          <span>{{ ucfirst(\Date::parse($blog['created_at'])->format('F')) }}</span>
                        </div>
                        <div class="post-content">
                            {!! $blog['content']  !!}
                        </div>
                        <div class="article-action">
                            <div class="article-tag">
                                <p> <span>Categoría :</span> {{ $blog['tag']['name'] }}</p>
                            </div>
                            <div class="article-share">
                                <div class="share-title">
                                    <h6>Compartir : </h6>
                                </div>
                                <div class="share-social">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fab fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </article>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-sidbar right-side">
                    <!-- <aside class="single-side-box search">
                        <div class="blog-search-inner">
                            <form action="article.html#">
                                <input type="text" placeholder="Search..">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </aside> -->
                    <aside class="single-side-box categories">
                        <div class="aside_title">
                            <h5>Categorías</h5>
                        </div>
                        <div class="categories-list">
                            <ul>
                                <li><a href="/blog?tag_id=">Todos <span>{{ $quantity_of_blogs }}</span></a></li>
                                @foreach($tags as $x => $tag)
                                <li><a href="/blog?tag_id={{ $tag['id'] }}">{{ $tag['name'] }} <span>{{ count($tag['posts_published']) }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                    <aside class="single-side-box recent-post">
                        <div class="aside_title">
                            <h5>Más Publicaciones</h5>
                        </div>
                        <div class="recent-post-inner">
                            @foreach($recent_blogs as $f => $recent_blog)
                            <div class="single-recent-post fix">
                                <div class="recent-post-thumbnail">
                                    <a href="article.html"><img src="{{ $recent_blog['image']['resource_thumb'] }}" alt=""></a>
                                </div>
                                <div class="recent-post-desc">
                                    <div class="post-title">
                                        <h6><a href="article.html">{{ $recent_blog['title'] }}</a></h6>
                                    </div>
                                    <div class="post-publish">
                                        <p>Ronchi / {{ $recent_blog['created_at']->format('d') }} {{ ucfirst(\Date::parse($recent_blog['created_at'])->format('F')) }}, {{ $recent_blog['created_at']->format('Y') }}</p>
                                    </div>
                                    {{-- <div class="post-content">
                                        {!! substr(strip_tags($recent_blog['content']), 0, 100) !!}...
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Latest blog end-->
@stop
@section('plugins-js')
<script></script>
@stop
