<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <ul class="nav nav-pills mb-3" role="tablist" style="border-bottom: 1px solid #ddd;">
      @if(in_array('ver-tab-de-categoria', $permissions_array))
      <li class="nav-item active"><a class="nav-link" data-toggle="pill" href="#category" role="tab">Categorías</a></li>
      @endif

      @if(in_array('ver-tab-de-atributos', $permissions_array))
      <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#attribute" role="tab">Atributos</a></li>
      @endif

      @if(in_array('ver-tab-de-categoria-de-empresa', $permissions_array))
      <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#company-category" role="tab">Categorías de Empresa</a></li>
      @endif


      <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#company-places" role="tab">Sedes</a></li>
      <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#company-logistics" role="tab">Logística</a></li>
      <li class="nav-item"><a class="nav-link" style="display:none;" data-toggle="pill" href="#company-etiquettes" role="tab">Etiquetas</a></li>

    </ul>
    <div class="tab-content">
      @if(in_array('ver-tab-de-categoria', $permissions_array))
      <div class="tab-pane fade active in" id="category" role="tabpanel">@include('admin.routers.company.category')</div>
      @endif

      @if(in_array('ver-tab-de-atributos', $permissions_array))
      <div class="tab-pane fade" id="attribute" role="tabpanel">@include('admin.routers.company.attribute')</div>
      @endif

      @if(in_array('ver-tab-de-categoria-de-empresa', $permissions_array))
      <div class="tab-pane fade" id="company-category" role="tabpanel">@include('admin.routers.company.company_category')</div>
      @endif

      <div class="tab-pane fade" id="company-places" role="tabpanel">@include('admin.routers.company.company_places')</div>
      <div class="tab-pane fade" id="company-logistics" role="tabpanel">@include('admin.routers.company.company_logistics')</div>

      <div class="tab-pane fade" id="company-etiquettes" role="tabpanel">@include('admin.routers.company.etiquette')</div>
    </div>
  </div>
</div>
