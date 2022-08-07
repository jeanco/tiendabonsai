<div class="col-md-12 u-px0 u-bg-white u-shadow-bottom">
  <ul class="col-md-12 nav nav-tabs ul-edit u-pr0">
    <li class="active" ><a href="#tab-cover" data-toggle="tab">Portada y Vídeos</a></li>
    <li><a href="#tab-info" data-toggle="tab">Datos de la empresa</a></li>
    <li><a href="#tab-services" data-toggle="tab">Servicios</a></li>
    <li><a href="#tab-account" data-toggle="tab">Cuentas Bancarias</a></li>
  </ul>
</div>

<div class="tab-content u-px0">
  <div id="tab-cover" class="tab-pane fade in active">
    @include('admin.pages.company.cover')
  </div>

  <div id="tab-info" class="tab-pane fade">
    @include('admin.pages.company.info')
  </div>

  <div id="tab-services" class="tab-pane fade ">
    @include('admin.pages.company.services')
  </div>

  <div id="tab-account" class="tab-pane fade ">
    @include('admin.pages.company.account')
  </div>
</div>
