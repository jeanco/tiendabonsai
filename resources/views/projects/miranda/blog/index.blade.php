@extends('miranda.layouts.index')
@section('content')
<!--Breadcrumbs start-->
<div class="breadcrumbs overlay-black">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumbs-title text-center">
                        <h1>Blog</h1>
                    </div>
                    <div class="breadcrumbs-menu sm-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumbs end-->

<!--Latest blog start-->
<div class="blog-pages pt-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12" id="table_data_blog">
                @include('miranda.blog.list_blog')
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-sidbar right-side">
                    <!-- <aside class="single-side-box search">
                        <div class="blog-search-inner">
                            <form action="blog-right-sidebar.html#">
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
                                <li><a href="article.html#" class="tag__change" data-tag_id=>Todos <span>{{ $quantity_of_blogs }}</span></a></li>
                                @foreach($tags as $x => $tag)
                                <li><a href="article.html#" class="tag__change" data-tag_id={{ $tag['id'] }}>{{ $tag['name'] }} <span>{{ count($tag['posts_published']) }}</span></a></li>
                                @endforeach
                            </ul>
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
<script src="/miranda/js/blogs.js"></script>
@stop
