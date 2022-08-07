@extends('website.layouts.index')

@section('content')

<section class="blog-single-page">
        <div class="container">
            <div class="heading-sub"><div class="clearfix"></div></div>
            <div class="row">
                <div class="col-md-4 pull-right col-xs-12">
                	@include('website.blog.perfil.2_right_post')

                </div>
                <div class="main-content col-sm-12 col-lg-8 col-md-8">
                	@include('website.blog.perfil.1_left_post')

                </div>
            </div>
        </div>
    </section>



@stop

@section('pulgins-js')
<script type="text/javascript">
  $(".windows8").hide();
</script>

@stop
