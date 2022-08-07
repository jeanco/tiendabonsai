<div class="col-md-12">
  <div class="tab-wrapper row u-px3 u-py5">
    <div class="col-md-12 u-mb4">
      <button type="button" class="btn btn-primary" id="etiquette__add" data-target="#new-etiquette" data-toggle="modal">
        <i class="glyphicon glyphicon-plus u-mr2"></i>Nueva Etiqueta
      </button>
    </div>

    <div class="col-md-12">
      <div class="table-responsive box-body">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="etiquettes_tbody">
            <tr>
              <td>Marca</td>
              <td><span style="color: #009400;"><b>Publicado</b></sapn></td>
              <td>
                <form action="/admin/configurar-etiquetas" method="POST" target="_blank">
                  <input type="hidden" name="etiquette_id" value="1">
                  <button type="submit" data-index="2" class="btn btn-success btn-sm" title="Configurar">
                    <i class="glyphicon glyphicon-cog notPointerEvent"></i>
                  </button>
                </form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


  </div>
</div>
