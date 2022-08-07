<div class="col-md-12">
    <div class="tab-wrapper row container_portada">

      <div class="row filtro_portada">
        <div class="form-group col-md-3 col-sm-6">
          <label for="">Categorias:</label>&nbsp;
          <select class="form-control" id="category-select">
            <option value="1">Banner Principal</option>
            <option value="2">Banner Promocionales</option>
            <option value="3">Banner Galería Doctora</option>
            <option value="4">Banner Tienda</option>
          </select>
        </div>
      </div>

      <div class="row">

        @if(in_array('nueva-portada', $permissions_array))
          <div class="col-md-4 col-sm-6 u-mb4">
            <a href="javascript:void(0);" class="new_btn" id="campaign__add" data-target="#campaign-modal" data-toggle="modal">
              <div class="btn_portada">
                <div class="text-center">
                  <i class="fas fa-plus"></i><br>
                  <span>Nueva Portada</span>
                </div>
              </div>
            </a>
          </div>
        @endif

        <input type="hidden" id="campaign_publish" value={{ in_array('publicar-portada', $permissions_array) }}>
        <input type="hidden" id="campaign_edit" value={{ in_array('editar-portada', $permissions_array) }}>
        <input type="hidden" id="campaign_delete" value={{ in_array('eliminar-portada', $permissions_array) }}>

        <panel id="campaigns_grid"></panel>

        {{-- <div class="col-md-4 col-sm-6 u-mb4">
          <div class="item_portada">
              <div class="img_portada">
                <img src="/template_11/img/banner_oferta_2.jpg" alt="" style="width: 100%">
              </div>
              <div class="info_portada">
                <h3 class="title_portada" title="Primera Portada">Primera Portada</h3>
                <div class="option_row">
                  <div class="col-md-2 u-px0" style="color: #32b032;">Publicado</div>
                  <div class="col-md-10  u-px0 text-right">
                    <a href="#" class="option_portada text-warning" title="Publicar"><i class="glyphicon glyphicon-eye-close"></i></a>
                    <a href="#" class="option_portada text-success" title="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="#" class="option_portada text-danger" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 u-mb4">
          <div class="item_portada">
              <div class="img_portada">
                <img src="/template_11/img/construccion.png" alt="" style="width: 100%">
              </div>
              <div class="info_portada">
                <h3 class="title_portada" title="Segunda Portada">Segunda Portada</h3>
                <div class="option_row">
                  <div class="col-md-2 u-px0" style="color: #32b032;">Publicado</div>
                  <div class="col-md-10 u-px0 text-right">
                    <a href="#" class="option_portada text-warning" title="Publicar"><i class="glyphicon glyphicon-eye-close"></i></a>
                    <a href="#" class="option_portada text-success" title="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="#" class="option_portada text-danger" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 u-mb4">
          <div class="item_portada">
              <div class="img_portada">
                <img src="/template_11/img/banner_oferta_1.jpg" alt="" style="width: 100%">
              </div>
              <div class="info_portada">
                <h3 class="title_portada" title="Tercera Portada">Tercera Portada</h3>
                <div class="option_row">
                  <div class="col-md-2 u-px0" style="color: #32b032;">Publicado</div>
                  <div class="col-md-10 u-px0 text-right">
                    <a href="#" class="option_portada text-warning" title="Publicar"><i class="glyphicon glyphicon-eye-close"></i></a>
                    <a href="#" class="option_portada text-success" title="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="#" class="option_portada text-danger" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>
                  </div>
                </div>
              </div>
          </div>
        </div>
        --}}

      </div>


    </div>
</div>
