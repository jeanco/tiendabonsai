<!-- Client logo Carousel -->

@if(count($covers_costumers)>0)
<div class="section-full bg-img-fix p-t30 p-b30 ">
  <div class="container">
    <div class="section-content">
      <div class="client-logo-carousel owl-carousel mfp-gallery gallery owl-btn-center-lr">
      @foreach ($covers_costumers as $key =>  $cover)
        <div class="item">
          <div class="ow-client-logo">
            <div class="client-logo"><a href="{{ $cover['image'] }}"><img src="{{ $cover['image'] }}" alt=""></a></div>
          </div>
        </div>
        @endforeach
        <!--div class="item">
          <div class="ow-client-logo">
            <div class="client-logo"> <a href="/wings/plugins/imagegallery/img/loading.gif#"><img src="/wings/images/client-logo/proveedor2.png" alt=""></a> </div>
          </div>
        </div>
        <div class="item">
          <div class="ow-client-logo">
            <div class="client-logo"> <a href="/wings/plugins/imagegallery/img/loading.gif#"><img src="/wings/images/client-logo/proveedor3.png" alt=""></a> </div>
          </div>
        </div>
        <div class="item">
          <div class="ow-client-logo">
            <div class="client-logo"> <a href="/wings/plugins/imagegallery/img/loading.gif#"><img src="/wings/images/client-logo/proveedor4.png" alt=""></a> </div>
          </div>
        </div-->
        
      </div>
    </div>
  </div>
</div>
@else
@endif


<!-- Client logo Carousel END -->
