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
                            @foreach($covers_ as $cover)
                            <div class="slide-img">
                                <img src="{{ $cover['imageUrl'] }}"  alt="images" class="" style=" width: 100%; height: 250px; object-fit: cover; filter: brightness(70%);" >
                                <div class="slide-content">
                                    <h2 class="brand">{!! $company_name !!}</h2>
                                    <img src="{{ $company_logotype }}" style="width: 30%;
                                      position: absolute;
                                      background: #f7c544;
                                      z-index: 900000;
                                      padding: 15px;
                                      border-radius: 5px;
                                      top: 0px;
                                      left: 950px">
                                    <h3 style=""><span class="strong">{!! $cover['title'] !!}</span></h3>
                                    <p></p>
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
