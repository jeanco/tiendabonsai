
@extends('template_10.layouts.index')
@section('content')

  <main class="bg_gray">
    <div class="container margin_30">
      <div class="page_header text-center">
        
        <h3 class="heading__title" style="font-weight: bold;">Nuestros Servicios</h3>
      </div>
      <!-- /page_header -->
      <div class="row" >

        <div class="col-lg-12" id="">
          

<div class="row">
    @foreach ($galleries as $key => $gallery)
    <div class="col-md-6">
        <article class="blog">
            <figure>
                <a href="servicios/{{ $gallery['slug'] }}"><img src="{{ $gallery['image'] }}" alt="">
                    <div class="preview"><span>Leer Más</span></div>
                </a>
            </figure>
            <div class="post_info">
               
                {{--<h2><a href="servicios/{{ $gallery['slug'] }}">{{ $blog['title'] }}</a></h2>--}}
                <p>{!! $gallery->description !!}</p>
                <ul>
                    <li>
                    {{--<div class="thumb"><img src="{{ ($blog['user']['user_image_thumb']) ? $blog['user']['user_image_thumb'] : '/template_10/img/avatar.jpg' }}" alt=""></div>--}} 
                    </li>
                    <li><!--i class="ti-comment"></i>20--></li>
                </ul>
            </div>
        </article>
        <!-- /article -->
    </div>
    @endforeach

  
    <!-- /col -->
</div>
<!-- /row -->


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
    <link href="/template_10/css/blog.css" rel="stylesheet">

@stop
@section('plugins-js')
  

@stop