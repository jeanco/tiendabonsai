<div class="top-bar">
  <div class="container-header">
    <div class="row">
      <div class="dlab-topbar-left">
        <ul>
        {{-- <li>{{ $company['address'] }} {{ $company['city']['name'] }} - {{ $company['country']['name'] }}</li> --}}
        </ul>
      </div>
      <div class="dlab-topbar-right topbar-social">
        <ul>
        <li> <i class="fas fa-phone"></i> Fono: {{ $company['phone'] }}</li>
        <li><a href="{{ $company['facebook'] }}" target="_blank" class="site-button-link facebook hover"><i class="fab fa-facebook"></i></a></li>
          <!-- <li><a href="/wings/plugins/imagegallery/img/loading.gif#" class="site-button-link google-plus hover"><i class="fab fa-google-plus"></i></a></li> -->
        <li><a href="{{ $company['twitter'] }}" target="_blank" class="site-button-link twitter hover"><i class="fab fa-twitter"></i></a></li>
          <!-- <li><a href="/wings/plugins/imagegallery/img/loading.gif#" class="site-button-link linkedin hover"><i class="fab fa-linkedin"></i></a></li> -->
          <li>
            <a href="/win-cotizador" class="site-button" style="font-size: 18px;
    font-weight: 700;
    display: flex;
    padding: 5px 15px;
    color: white; background-color: #f44336; border-radius: 6px;">
              Cotizar
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
