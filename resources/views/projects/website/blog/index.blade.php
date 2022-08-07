@extends('website.layouts.index')

@section('content')

<section class="blog-page">
        <div class="container">
            <div class="widget-blog-collection">
                <div class="row top-row-blog-page" style="padding-left: 15px; padding-right: 15px;">
                    @if(count($last_blog))
                    <div class="col-md-12" style="margin-bottom: 0px; ">
                       @include('website.blog.1_banner')
                    </div>
                    @endif
                </div>
                @include('website.blog.2_more_post')
            </div>
        </div>
</section>

@stop

@section('pulgins-js')
<script type="text/javascript" src="website/js/blog.js"></script>
@stop
