<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
    <div class="single-item js-banner">
        @foreach($covers as $cover)
        <div class="slide-img">
            <img src="{{ $cover['image'] }}" alt="images" class="img-reponsive home-banner" style=" width: 100%; height: 250px; object-fit: cover; filter: brightness(70%);">
            <div class="slide-content">
                <!-- <h5 class="brand">Sony ALPHA</h5> -->
                <span class="strong">{!! $cover['title'] !!}</span>
                <!--p>Dolor sit amet, consecte, adipiscing.</p-->
            </div>
            <a href="{{ $cover['link'] }}" class="slide-button">Ver más</a>
        </div>
        @endforeach
    </div>
</div>