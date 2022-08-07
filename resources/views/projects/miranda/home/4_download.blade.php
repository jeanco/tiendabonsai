<!--Download apps section start-->
<div class="download-apps overlay-blue" style="padding-top: 23px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="download-apps-desc wow fadeInDown" data-wow-delay="0.1s">
                    <div class="download-apps-title" style="color: #fff; font-size: 18px; font-weight: 500;">
                        <span class="font-weight-bold">ENCUENTRA MÁS INMUEBLES EN  <span style="font-size: 26px; color: #383838; font-weight: 700;">PORTALMIRANDA.COM</span> 
                        <!--span style="color: #55d400; font-weight: 700;">6,000</span--> 
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                @foreach($promotions as $i => $promotion)
                <div class="download-apps-caption-img f-right wow fadeUp" data-wow-duration="1.2s" data-wow-delay="0.2s">
                    <a href="{{ $promotion['link'] }}"  target="_blank"><img src="{{ $promotion['image'] }}" alt=""></a> 
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--Download apps section end-->
