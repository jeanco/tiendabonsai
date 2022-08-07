@extends('website.layouts.index')

@section('content')

<section class="about-us-page">
        <div class="container">
            <div class="heading-sub ver2">
                <h3 class="pull-left">Nosotros</h3>
                <div class="clearfix"></div>
            </div>
            <div class="widget-about-us">
              <div class="blog-slide-content">
                  <p>{{ $company['description_company'] }}</p>
                  <p>{{ $company['mission'] }}</p>
                  <p>{{ $company['vision'] }}</p>
              </div>
              <a href="about-us.html#"><img src="{{$campaign['image']}}" alt="Images" class="img-responsive"></a>
            </div>
        </div>
    </section>

@stop

@section('pulgins-js')

<script type="text/javascript">
  $(".windows8").hide();
</script>

@stop
