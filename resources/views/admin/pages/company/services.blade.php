<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-12 u-mb4">
      <button type="button" class="btn btn-primary" id="service_add" data-target="#add-services" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Añadir Servicio
      </button>
    </div>

    {{-- Modificar la lista de cuentas --}}
    <ul class="col-md-12" id="services_grid">
      {{-- @for($i=0; $i < 8 ; $i++)
        <div class="col-lg-3 col-md-4 col-sm-6 u-px2">
          <li class="item-account">
            <figure class="item-image">
              <img src="http://vignette2.wikia.nocookie.net/logopedia/images/a/aa/Bbva.jpg/revision/latest?cb=20130710104037" alt="" />
            </figure>
            <div class="item__controls">
              <button type="button" class="btn bg-secondary" data-target="#add-account" data-toggle="modal" title="Editar">
                <i class="glyphicon glyphicon-pencil"></i>
              </button>
              <button type="button" class="btn btn-primary" title="Eliminar">
                <i class="glyphicon glyphicon-trash"></i>
              </button>
            </div>
          </li>
        </div>
      @endfor --}}
    </ul>
  </div>
</div>
