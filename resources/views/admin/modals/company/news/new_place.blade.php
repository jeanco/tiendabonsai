<div id="new-place" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="place_form" class="u-mb0">
        <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title"><span id="label-news-title">Sede</span> </h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
        </div>
        <div class="modal-body" style="padding: 20px 20px 0px 20px">
          <input type="hidden" name="place_id" id="">
          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Nombre:</label>
            <input type="text" name="name" class="form-control" placeholder="Escribe el nombre">
            <div class="mensaje-error" id="place-name-error"></div>
          </div>
          
          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>País:</label>
            <select class="form-control u-mb3" name="country_id">
              @foreach($countries as $country)
                <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
              @endforeach
            </select>
            <div class="mensaje-error" id="place-country_id-error"></div>
          </div>

          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Tipo:</label>
            <select class="form-control u-mb3" name="type">
              @foreach($place_types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
            </select>
            <div class="mensaje-error" id="place-type-error"></div>
          </div>

          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Dirección:</label>
            <textarea class="form-control" id="address_content"  name="address" type="text" rows="4" placeholder="Dirección"></textarea>
          </div>
          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Celular:</label>
            <textarea type="text" name="cel" id="cel_content" rows="4" class="form-control" placeholder="Celular"></textarea>
          </div>
          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Teléfono:</label>
            <input type="text" name="phone" class="form-control" placeholder="Teléfono">
          </div>
          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Email:</label>
            <input type="text" name="email" class="form-control" placeholder="Correo electrónico">
          </div>
          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Geolocalización:</label>
            <textarea type="text" name="geolocalization" rows="4" class="form-control" placeholder="Google maps"></textarea>
          </div>
          <div class="form-group">
            <label class="control-label"><i class="glyphicon glyphicon-file"></i>Horario:</label>
            <textarea class="form-control" id="schedule_content" name="schedule" type="text" rows="4" placeholder="Horario"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" id="place__save">Crear</button>
          <button type="button" class="btn btn-success" id="place__update">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>
