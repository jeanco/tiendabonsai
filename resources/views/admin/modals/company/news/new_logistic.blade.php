<div id="new-logistic" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="logistic_form" class="u-mb0">
        <div class="modal-header">
          	<div class="tilte_modal">
              <h4 class="modal-title"> <span id="label-news-title">Logistica</span> </h4>
              <button type="button" data-dismiss="modal">&times;</button>
            </div>
        </div>
        <div class="modal-body" style="padding: 20px 20px 0px 20px">
          <input type="hidden" name="logistic_id" id="">
          <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Empresa</label>
          <select class="form-control u-mb3" name="company_id">
            @foreach($companies as $i => $company)
            <option value="{{ $company['id'] }}">{{ $company['name_company']  }}</option>
            @endforeach
          </select>
          <div class="mensaje-error"></div>
        </div>
          <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona la sede de Origen:</label>
          <select class="form-control u-mb3" name="place_id">
            @foreach($places as $i => $place)
            <option value="{{ $place['id'] }}">{{ $place['name']  }}</option>
            @endforeach
          </select>
          <div class="mensaje-error"></div>
        </div>
        <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Nombre del costo de envío:</label>
            <input type="text" name="name" class="form-control" logisticholder="Escribe el nombre">
            <div class="mensaje-error text-error" id="logistic-name-error"></div>
          </div>

        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Calcula el costo de envío:</label>
          <button type="button" class="btn btn-primary" id="cost__add" data-target="#new-detail-costo" data-toggle="modal">
            <i class="glyphicon glyphicon-plus u-mr2"></i>Agregar Costo
          </button>
      		<div class="col-md-12">
      <div class="table-responsive box-body">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Descripción</th>
              <th>Costo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="setting-cost-tbody">

            <tr>
              <td>Norte de Lima - Flores</td>
              <td>20.00</td>
              <td>
                <button data-index="2" class="btn btn-success btn-sm" title="Editar" data-target="#new-company-category" data-toggle="modal">
                <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
                </button>
                <button data-index="2" class="btn btn-danger btn-sm" title="Eliminar">
                <i class="glyphicon glyphicon-trash notPointerEvent"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Sur de Lima - PAvill</td>
              <td>40.00</td>
              <td>
                <button data-index="2" class="btn btn-success btn-sm" title="Editar" data-target="#new-company-category" data-toggle="modal">
                <i class="glyphicon glyphicon-pencil notPointerEvent"></i>
                </button>
                <button data-index="2" class="btn btn-danger btn-sm" title="Eliminar">
                <i class="glyphicon glyphicon-trash notPointerEvent"></i>
                </button>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
        </div>

        <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Política de envíos:</label>
            <textarea  type="text" name="shipping_policies" class="form-control" logisticholder="Escribe el nombre"  rows="3"></textarea>
            <div class="mensaje-error text-error" id="logistic-policies-error"></div>
          </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Estado:</label>
          <select class="form-control u-mb3" name="status">
            <option value="1">Publicado</option>
            <option value="0">No Publicado</option>
          </select>
          <div class="mensaje-error"></div>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" id="logistic__save">Crear</button>
          <button type="button" class="btn btn-success" id="logistic__update">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>
