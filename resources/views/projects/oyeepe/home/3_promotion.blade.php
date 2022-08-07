<br>
<h3 style="color: white">Más Promociones</h3><br>
<div class="row">

    @foreach($promotions as $key => $promotion)
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="sub-banner promotion-border">
            <a href="{{ $promotion->link }}">
                <img src="{{ $promotion->image }}" alt="images" class="img-reponsive" style=" border-radius: 20px;width: 100%; height: 200px; object-fit: cover; filter: brightness(70%);"></a>
            <div class="sub-banner-title">
                <h3 style="color: white; font-size: 20px">{{ $promotion->title }}</h3>
                <p class="text-uppercase">{{ $promotion->subtitle }}</p>
            </div>
            <div class="sub-banner-btn">
                <a href="{{ $promotion->link }}" class="btn-getit">Ver promoción <i class="ion-ios-arrow-forward icon-sub-banner orange"></i></a>
            </div>
        </div>
    </div>
    @endforeach
<!--     <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="sub-banner promotion-border">
            <a href="home-2.html#"><img src="website/img/banner/subbanner-2.jpg" alt="images" class="img-reponsive" style="    border-radius: 20px;"></a>
            <div class="sub-banner-title">
                <h3>BEAST SOLO</h3>
                <p class="text-uppercase">VARIEDAD DE COLORES</p>
            </div>
            <div class="sub-banner-btn">
                <a href="home-2.html#" class="btn-getit">Consíguelo <i class="ion-ios-arrow-forward icon-sub-banner orange"></i></a>
            </div>
        </div>
    </div> -->
</div>
<br>
