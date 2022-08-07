<div id="prices-config" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade modal_admin" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        	<div class="tilte_modal">
            <h4 class="modal-title">Edición de precios por sede</h4>
            <button type="button" data-dismiss="modal">&times;</button>
          </div>
      </div>
      <div class="modal-body row">

        <div class="form-group col-md-5">
          <select id="product_place" class="form-control">
            @foreach($places as $place)
              <option value="{{ $place['id'] }}">{{ $place['name'] }}</option>
            @endforeach
          </select>
        </div>

        <input type="hidden" id="product-price_product-id">
        <h3 class="col-md-12 u-center u-primary u-mb5">
          <b id="product-prices_name">Nombre del Producto</b>
        </h3>
        <div class="col-md-12 u-px4">
          <div class="table-responsive col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th id="product-prices_th-size">Nombre del Precio</th>
                  <th id="product-prices_th-color">Valor S/</th>
                  <th>Condicion (Und.)</th>
                  <th width="30%"><i class="glyphicon glyphicon-file"></i> Fecha Límite</th>
                  <th width="15%"><i class="glyphicon glyphicon-picture"></i>
                  <span class="u-ml3">Foto Etiqueta </span></th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="product-prices_tbody">
                {{-- <tr>
                  <td><input class="form-control" type="text" name="" value="Precio x Docena"></td>
                  <td><input class="form-control" type="number" name="" value="10.00"></td>
                  <td><input class="form-control" type="number" name="" value="10.00"></td>
                  <td>
                    <select class="form-control" name="" style="width:auto">
                      <option value="1">Activo</option>
                      <option value="2">incativo</option>
                    </select>
                  </td>
                  <td>
                    <div class="u-flex">
                      <button type="button" class="btn btn-success">Guardar</button>
                      <button type="button" class="btn btn-danger u-mx3">Eliminar</button>
                      <!--button type="button" class="btn btn-primary">Editar</button-->
                    </div>
                  </td>
              </tr> --}}
              </tbody>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>

                  </td>
                  <td>
                    <div class="u-flex">
                      <button type="button" class="btn btn-success" id="product-price__add">+ Agregar</button>
                    </div>
                  </td>
              </tr>
              </tbody>

            </table>
          </div>
        </div>

        {{-- <div class="col-md-12 u-mb4 text-center">
          <button type="button" class="btn btn-primary btn-modal" id="subcategory_save">CREAR SUBCATEGORIA</button>
          <button type="button" class="btn btn-primary btn-modal" id="subcategory_update">EDITAR SUBCATEGORIA</button>
        </div> --}}
      </div>
    </div>
  </div>
</div>
