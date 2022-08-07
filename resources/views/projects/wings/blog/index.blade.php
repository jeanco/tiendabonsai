@extends('wings.layouts.index')
@section('content')
<!-- Content -->
<div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-origin: content-box;background-image:url( {{ isset( $gallery_company[6]->resource) ? $gallery_company[6]->resource:  ''  }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Blog</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/win-inicio">Inicio</a></li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                <!-- left part start -->
                <div class="col-md-9 col-sm-8" id="table_data_blog">
                    @include('wings.blog.1_list')
                </div>

                <!-- Side bar start -->
                @include('wings.blog.2_filters')
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
@stop
@section('plugins-css')
@stop
@section('plugins-js')
    <script src="/wings/js/blogs.js"></script>
@stop
