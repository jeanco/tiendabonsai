@extends('template_4.layouts.index')
@section('content')
<main class="">

  <div class="bg_white py-5">
    <div class="container">
      <div class="font-weight-bold  mb-4 " style="color: var(--main-bg-color-primario); font-size: 20px; ">{{ isset( $services[5]->name) ? $services[5]->name:  ''  }}</div>
      <div class="row justify-content-center">
        	@if($services[5]->image)
      	 <div class="col-md-7">
          <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
            {!! isset( $services[5]->description) ? $services[5]->description:  ''  !!}
          </div>
        </div>
        <div class="col-md-5 text-center">
          <img src="{{ isset( $services[5]->image) ? $services[5]->image:  ''  }}" style="max-width: 100%;">
        </div>
      	@else
      	<div class="col-md-12">
          <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
            {!! isset( $services[5]->description) ? $services[5]->description:  ''  !!}
          </div>
        </div>
       
      	@endif
      </div>
    </div>
  </div>

  <style type="text/css">
    body{
  background: #f9f9f9;
  color: #555e58;
}

.wrapper{
  position: relative;
  margin: 0 auto;
  /*width: 550px;*/
  width: 100%;
  padding-left: 90px;
}

.img-selection{
  position: absolute;
  left: 0;
  top: 0;
  /*width: 100px;*/
}

.img-thumbnail:first-of-type{
  margin-top: 0;
}

.img-thumbnail{
  margin-top: 10px;
  width: 100%;
 /* height: 140px;*/
  border: 1px solid #ddd;
  cursor: pointer;
  transition: .3s ease;
  opacity: .5;
}

.img-thumbnail:hover{
  opacity: 1;
}

.img-thumbnail.selected{
  opacity: 1;
}

.big-img{
  position: relative;
  /*width: 445px;
  height: 445px;*/
  width: 400px;
  border: 1px solid #ddd;
  cursor: zoom-in;
  overflow: hidden;
}

.big-img img.zoom{
  position: absolute;
  transition: width 0.2s ease-out, opacity 0.2s ease-out 0.2s; 
}

.display-img{
  width: 100%;
}
  </style>

  {{--<div class="wrapper">
  <div class="img-selection">
    <div class="img-thumbnail selected">
      <img src="http://vignette1.wikia.nocookie.net/overwatch/images/b/b7/CuteSprayAvatars-Tracer.png/revision/latest?cb=20160511194930" width="80px">
    </div>
    <div class="img-thumbnail">
      <img src="http://vignette2.wikia.nocookie.net/overwatch/images/8/85/CuteSprayAvatars-Mercy.png/revision/latest?cb=20160511194928" width="80px">
    </div>
    <div class="img-thumbnail">
      <img src="http://vignette2.wikia.nocookie.net/overwatch/images/e/e0/CuteSprayAvatars-Pharah.png/revision/latest?cb=20160511194928" width="80px">
    </div>
    <div class="img-thumbnail">
      <img src="http://vignette2.wikia.nocookie.net/overwatch/images/e/e0/CuteSprayAvatars-Pharah.png/revision/latest?cb=20160511194928" width="80px">
    </div>
  </div>
  <div class="big-img">
      <img src="http://vignette1.wikia.nocookie.net/overwatch/images/b/b7/CuteSprayAvatars-Tracer.png/revision/latest?cb=20160511194930" class="display-img">
  </div>
</div>--}}

 
</main>
@stop
@section('plugins-css')
@stop
@section('plugins-js')

<script  >
  
  var thumbs = $('.img-selection').find('img');

thumbs.click(function(){
  var src = $(this).attr('src');
  var dp = $('.display-img');
  var img = $('.zoom');
  dp.attr('src', src);
  img.attr('src', src);
});

$(".img-thumbnail").click(function(){
  $('.img-thumbnail').removeClass('selected');
  $(this).addClass('selected');
});

var zoom = $('.big-img').find('img').attr('src');
$('.big-img').append('<img class="zoom" src="'+zoom+'">');
$('.big-img').mouseenter(function(){
  $(this).mousemove(function(event){
    var offset = $(this).offset();
    var left = event.pageX - offset.left;
    var top = event.pageY - offset.top;
    
    $(this).find('.zoom').css({
      width: '200%',
      opacity: 1,
      left: -left,
      top: -top,
    });
  });
});

$('.big-img').mouseleave(function(){
  $(this).find('.zoom').css({
    width: '100%',
    opacity: 0,
    left: 0,
    top: 0,
  });
});
</script>
@stop
