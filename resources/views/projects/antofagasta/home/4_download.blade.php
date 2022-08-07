<!--Download apps section start-->
<div class="download-apps overlay-antofagasta" style="padding-top: 23px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="download-apps-desc wow fadeInDown" data-wow-delay="0.1s">
                    <div class="download-apps-title" style="color: #fff; font-size: 18px; font-weight: 500;">
                        <span class="font-weight-bold">ENCUENTRA MÁS</span><br>
                        <span style="color: #000;">6,000</span> inmuebles
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                @foreach($promotions as $i => $promotion)
                <div class="download-apps-caption-img f-right wow fadeUp" data-wow-duration="1.2s" data-wow-delay="0.2s">
                    <img src="{{ $promotion['image'] }}" alt="">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--Download apps section end-->
