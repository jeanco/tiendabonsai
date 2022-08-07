@extends('yekatex.layouts.index')
@section('content')
<div class="contact-area ptb-50 ptb-sm-60">
    <div class="container">
      <h3>Contactos</h3>
      <div class="row" style="padding: 20px 0px; margin-bottom: 50px; margin-top: 25px;">
          <div class="col-md-4 col-sm-12">
            <i class="ion-ios-location icon-contact"></i>&emsp;{{ $company_main->address }}
          </div>
          <div class="col-md-4 col-sm-12">
            <i class="ion-ios-telephone icon-contact"></i>&emsp;{{ $company_main->phone }}
          </div>
          <div class="col-md-4 col-sm-12">
            <i class="ion-email icon-contact"></i>&emsp;{{ $company_main->email }}
          </div>
      </div>
      <div class="row">
          <div class="col-md-6 col-sm-12">
            <form>
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-6 col-xs-12">
                          <strong>Nombres</strong>
                          <input type="text" class="form-control" id="contact_name" value="">
                          <div id="contact-error-name" class="mensaje-error text-danger"></div>
                      </div>
                      <div class="col-md-6 col-xs-12">
                          <strong>Email *</strong>
                          <input type="text" class="form-control" id="contact_email" value="">
                          <div id="contact-error-email" class="mensaje-error text-danger"></div>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-6 col-xs-12">
                          <strong>Celular</strong>
                          <input type="text" name="" class="form-control" id="contact_cellphone" value="">
                          <div id="contact-error-cellphone" class="mensaje-error text-danger"></div>
                      </div>
                      <div class="col-md-6 col-xs-12">
                          <strong>Asunto</strong>
                          <input type="text" class="form-control" id="contact_subject" value="">
                          <div id="contact-error-subject" class="mensaje-error text-danger"></div>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-12">
                          <strong>Mensaje</strong>
                          <textarea name="note" id="contact_msg" rows="3" tabindex="2" class="form-control"></textarea>
                          <div id="contact-error-msg" class="mensaje-error text-danger"></div>
                      </div>
                  </div>
              </div>
              <div class="footer-content mail-content clearfix">
                  <div class="send-email float-md-right">
                      <button type="submit" class="customer-btn" id="contact__send">Enviar  mensaje</button>
                  </div>
              </div>
            </form>
          </div>
          <input type="hidden" id="company_latitude" value={{$company_main->latitude}}>
          <input type="hidden" id="company_longitude" value={{$company_main->longitude}}>
          <div class="col-md-6 col-sm-12">
            <div class="goole-map">
                <div id="googlemap1" style="height:455px"></div>
            </div>
          </div>
      </div>
    </div>
</div>

@stop
@section('plugins-js')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>
<script type="text/javascript" src="website/js/contact.js"></script>
<script>

        let _latitude = getElement(`#company_latitude`).value, _longitude = getElement(`#company_longitude`).value;

        $('#googlemap1').locationpicker({
		enableAutocomplete: true,
		enableReverseGeocode: true,
		radius: 0,
		location: {
			latitude: _latitude,
			longitude: _longitude
		},
		inputBinding: {
			// latitudeInput: $('#product_latitude'),
			// longitudeInput: $('#product_longitude'),
			// locationNameInput: $('#product_address')
		}
	});

    </script>

@stop
