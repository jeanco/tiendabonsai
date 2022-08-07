@extends('divemotor.layouts.index')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-4 align-items-center justify-content-between">
                  <div class="col-10 font-bold" style="font-size: 24px;">Mi Cotización</div>
                  <div class="col-2 text-right"> <a href="{{ URL::to('/catalogo') }}"><i class="fas fa-angle-left"></i>&nbsp;Volver a Catálogo</a> </div>
                </div>
                <form>
                    <div class="row align-items-center justify-content-end mb-3">
                        <div class="col-md-1">Numero:</div>
                    <div class="col-md-3"><input type="text" class="form-control" id="checkout_number" value="{{ $number }}"></div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-1">*RUC/DNI:</div>
                        <div class="col-md-5 input-group">
                            <input type="text" class="form-control" id="checkout_identity-document" placeholder="Buscar por DNI o RUC del cliente">
                            <div class="input-group-append">
                                <button class="btn btn-info" id="checkout_search-customer" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-md-1">*Cliente:</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="checkout_first-name" placeholder="Nombre del cliente" aria-label="" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-1">*Dirección:</div>
                        <div class="col-md-5"><input type="text" class="form-control" id="checkout_address" placeholder="ingrese la Dirección"></div>
                        <div class="col-md-1">*Celular:</div>
                        <div class="col-md-5"><input type="text" class="form-control" id="checkout_cel-whatsapp_" placeholder="ingrese el número de contacto"></div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-1">*Correo:</div>
                        <div class="col-md-5"><input type="text" class="form-control" id="checkout_email_" placeholder="ingrese el Correo Electrónico"></div>
                        <div class="col-md-1">*Contacto:</div>
                    <div class="col-md-5"><input type="text" value="" class="form-control" id="checkout_contact" placeholder="ingrese el contacto" ></div>
                    </div>
                    <div class="row align-items-center mb-3">

                        <div class="col-md-1">Ejecutivo de venta:</div>
                    <div class="col-md-5"><input type="text" value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}" class="form-control" placeholder="ingrese el contacto" disabled=disabled></div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                  <table class="table-bordered table-hover" cellpadding="10" width="100%">
                      <thead>
                          <tr>
                              <th>Imagen</th>
                              <th>Nombre</th>
                              <th>Precio Unitario</th>
                              <th width="12%">Cantidad</th>
                              <th>Total</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody id="cart_tbody">
                          <tr>
                              <td style="vertical-align: middle;">
                                  <a href="javascript:void(0)"><img src="/images/item1.jpg" alt="user" width="50"/></a>
                              </td>
                              <td style="vertical-align: middle;">Xiaomi Redmi Note 7 4GB/64GB</td>
                              <td style="vertical-align: middle;">S/. 670</td>
                              <td style="vertical-align: middle;">
                                  <div class="form-group mb-0">
                                      <input type="text" value="1" name="tch3_22" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                  </div>
                              </td>
                              <td style="vertical-align: middle;">S/. 670</td>
                              <td style="vertical-align: middle;">
                                  <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                              </td>
                          </tr>
                          <tr>
                              <td style="vertical-align: middle;">
                                  <a href="javascript:void(0)"><img src="/images/item2.jpg" alt="user" width="50"/></a>
                              </td>
                              <td style="vertical-align: middle;">ASUS Gaming Laptop i7 ROG 17.5"</td>
                              <td style="vertical-align: middle;">S/. 3500</td>
                              <td style="vertical-align: middle;">
                                  <div class="form-group mb-0">
                                      <input type="text" value="1" name="tch3_22" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                  </div>
                              </td>
                              <td style="vertical-align: middle;">S/. 3500</td>
                              <td style="vertical-align: middle;">
                                  <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                              </td>
                          </tr>
                      </tbody>
                  </table>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group mt-3">
                      <label for="">Nota:</label>
                      <textarea class="form-control" id="checkout_description" rows="4" placeholder="Ingrese la nota"></textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row mt-3 align-items-center pr-2">
                      <div class="col-md-5 text-right">SUBTOTAL:</div>
                      <div class="col-md-7 text-right p-2 font-bold" id="cart_subtotal" style="border: 1px solid #dee2e6;">S/. 4170</div>
                    </div>
                    <div class="row mt-2 align-items-center pr-2">
                      <div class="col-md-5 text-right">IGV 18%:</div>
                      <div class="col-md-7 text-right p-2 font-bold" id="cart_igv-total" style="border: 1px solid #dee2e6;">S/. 30</div>
                    </div>
                    <div class="row mt-2 align-items-center pr-2">
                      <div class="col-md-5 text-right">TOTAL:</div>
                      <div class="col-md-7 text-right p-2 font-bold" id="cart_total" style="border: 1px solid #dee2e6;">S/. 4200</div>
                    </div>
                  </div>
                </div>

                <div class="row align-items-center pr-2">
                  <div class="col-md-10 text-right"></div>
                  <div class="col-md-2 p-0">
                    <a href="javascript:void(0)" type="button" class="btn btn-success btn-block" id="checkout__save"><i class="fas fa-download"></i>&nbsp;Generar Cotización</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@include('divemotor.checkout.modal_order')
@stop

@section('plugins-css')
@stop
@section('plugins-js')
<script src="/divemotor/js/order.js"></script>
@stop
