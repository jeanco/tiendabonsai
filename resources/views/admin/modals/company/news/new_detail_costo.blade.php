<div id="new-detail-costo" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="cost_form" class="u-mb0">
        <div class="modal-header">
          	<div class="tilte_modal">
              <h4 class="modal-title"><span id="label-news-title">Detalle de costos</span></h4>
              <button type="button" data-dismiss="modal">&times;</button>
            </div>
        </div>
        <div class="modal-body" style="padding: 20px 20px 0px 20px">

          <input type="hidden" name="cost_id" id="">

          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Descripción:</label>
            <input type="text" name="name" class="form-control" costholder="Escribe el nombre">
            <div class="text-error mensaje-error" id="cost-name-error"></div>
          </div>
          <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona el Pais:</label>
           <label class="control-label">Todos</label>
          <select class="form-control u-mb3" name="country_id" id="">
            @foreach($countries as $country)
              <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
            @endforeach
          </select>
            <div class="text-error mensaje-error" id="cost-country-error"></div>
        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona el La Ciudad:</label>
           <input type="checkbox" name="" id="cost-all-cities">
            <label class="control-label">Todos</label>
          <select class="form-control u-mb3 select2" name="city_id" multiple="multiple" style="width: 100%">
          </select>
            <div class="text-error mensaje-error" id="cost-cities-error"></div>
        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona la Provincia:</label>
           <input type="checkbox" name="" id="cost-all-provinces">
          <label class="control-label">Todos</label>
          <select class="form-control u-mb3 select2" multiple="multiple" name="province_id" style="width: 100%">
          </select>
            <div class="text-error mensaje-error" id="cost-provinces-error"></div>
        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona los Distritos:</label>
           <input type="checkbox" id="cost-all-districts">
           <label class="control-label">Todos</label>
          <select class="form-control u-mb3 select2" multiple="multiple" name="district_id" style="width: 100%">
          </select>
            <div class="text-error mensaje-error" id="cost-districts-error"></div>
        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona las subcategorías:</label>
          <select class="form-control u-mb3 select2" multiple="multiple" name="subcategory_id" style="width: 100%">
            @foreach($subcategories as $subcategory)
              <option value="{{ $subcategory['id'] }}">{{ $subcategory['name'] }}</option>
            @endforeach
          </select>
            <!-- <div class="text-error mensaje-error" id="cost-districts-error"></div> -->
        </div>
        <div class="form-group">
          <label class="control-label"><i class="glyphicon glyphicon-file"></i>Selecciona un Proveedor de transporte:</label>
          <select class="form-control u-mb3" name="transport_company_id">
            @foreach($transport_companies as $transport)
              <option value="{{ $transport['id'] }}">{{ $transport['name'] }}</option>
            @endforeach
          </select>
            <div class="text-error mensaje-error" id="cost-transport-error"></div>
        </div>
         <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Costo:</label>
            <input type="text" name="cost" class="form-control" costholder="Escriba el costo">
            <div class="mensaje-error" id="cost-cost-error"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" id="cost__save">Guardar</button>
          <button type="button" class="btn btn-success" id="cost__update">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
