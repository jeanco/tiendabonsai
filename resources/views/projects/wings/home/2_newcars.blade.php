<!-- New Car -->
<div class="section-full bg-img-fix dlab-new-work overlay-white-dark " style="background-image: url(images/background/bg1.jpg);">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-4  p-a0 no-of-item">
        <div class="no-of-item-dtl">
          <h2>0KM</h2>
          <h3>NUEVOS MODELOS</h3>
        </div>
      </div>
      <div class="col-md-9 col-sm-8 p-a0">
        <div class="new-item owl-btn-style-1 owl-carousel">
          @foreach ($last_autos_array as $last_auto)

          <div class="item dlab-new-item">
            <div class="dlab-box">
              <div class="dlab-media">
              <a href="/productos/{{ $last_auto['slug'] }}"><img src="{{ $last_auto['photo'] }}" alt="" style="height: 224px; object-fit: cover;"></a>
              </div>
              <div class="dlab-info">
              <p class="event-date">{{ $last_auto['date_formatted'] }}</p>
              <h4 class="dlab-title"><a href="/productos/{{ $last_auto['slug'] }}">{{ $last_auto['name'] }} <i class="fa fa-angle-right pull-right"></i></a></h4>
              </div>
            </div>
          </div>
          @endforeach
          {{-- <div class="item dlab-new-item">
            <div class="dlab-box">
              <div class="dlab-media">
                <a href="/win-perfil-auto"><img src="/wings/img/bus2.png" alt="" style="height: 224px; object-fit: cover;"></a>
              </div>
              <div class="dlab-info">
                <p class="event-date">Enero 7, 2020</p>
                <h4 class="dlab-title"><a href="/win-perfil-auto">ASIASTAR CITY BUS <i class="fa fa-angle-right pull-right"></i></a></h4>
              </div>
            </div>
          </div>
          <div class="item dlab-new-item">
            <div class="dlab-box">
              <div class="dlab-media">
                <a href="/win-perfil-auto"><img src="/wings/img/bus3.png" alt="" style="height: 224px; object-fit: cover;"></a>
              </div>
              <div class="dlab-info">
                <p class="event-date">Enero 8, 2020</p>
                <h4 class="dlab-title"><a href="/win-perfil-auto">Joylong HKL6600 <i class="fa fa-angle-right pull-right"></i></a></h4>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- New Car New -->
