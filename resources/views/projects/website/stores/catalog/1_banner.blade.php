{{--<div class="heading-sub">
    <h3 class="pull-left">shop list</h3>
    <ul class="other-link-sub pull-right">
        <li><a href="shop-list-v2.html#home">Home</a></li>
        <li><a class="active" href="shop-list-v2.html#shop">Shop</a></li>
    </ul>
    <div class="clearfix"></div>
</div>--}}
<section class="slide" style="padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="row top-row">
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
                        <div class="single-item js-banner">
                            @foreach($covers as $cover)
                            <div class="slide-img">
                                <img src="{{ $cover['imageUrl'] }}" alt="images" class="img-reponsive">
                                <div class="slide-content">
                                    <!-- <h5 class="brand">Sony ALPHA</h5> -->
                                    <h3><span class="strong">{{ $cover['title'] }}</span></h3>
                                    <p>Dolor sit amet, consecte, adipiscing.</p>
                                </div>
                                <a href="{{ $cover['linkUrl'] }}" class="slide-button">Ver más</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>