<div class="col-md-12">
  <div class="tab-wrapper row u-px4 u-py5">
    <div id="divPhotos"></div>
    <div id="divContents"></div>
    <div id="divExtensions"></div>
    <div class="col-md-12 text-center u-mb4">
      <div id="company-error" class="col-md-10 titulo-error"></div>
    </div>
    {!! Form::open(array('id' => 'form_company', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
    <input type="hidden" id="company_method" name="_method" value="PUT" />
    <input type="hidden" id="company_id" name="company_id" value="">
    <div class="col-md-4">
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Nombre de la Empresa:
        </label>
        <input type="text" class="form-control" id="company_name" name="name_company" placeholder="Escribe el nombre de la empresa">
        <div id="company-error-name" class="mensaje-error"></div>
      </div>
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Razón social:
        </label>
        <input type="text" class="form-control" id="company_business-name" name="business_name" placeholder="Escribe la razón social">
        <div id="company-error-business-name" class="mensaje-error"></div>
      </div>
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Ruc de la Empresa:
        </label>
        <input type="text" class="form-control" id="company_ruc" name="ruc" placeholder="Escribe el RUC de la empresa">
        <div id="company-error-ruc" class="mensaje-error"></div>
      </div>
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-camera"></i>Logo color:
        </label>
        <div id="dropzone_company" class="dropzone">
          <label id="company-preview-image-text">
            <i class="glyphicon glyphicon-picture"></i>
            <span class="u-ml3">Añadir Foto</span>
          </label>
          <div class="dropzone_image" id="preview_logotype">
          </div>
          <input id="company_logo" name="company_logo" type="file" accept="image/gif, image/jpeg, image/png">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-camera"></i>Logo blanco:
        </label>
        <div id="dropzone_company" class="dropzone">
          <label id="company-preview-image-white-text">
            <i class="glyphicon glyphicon-picture"></i>
            <span class="u-ml3">Añadir Foto</span>
          </label>
          <div class="dropzone_image" id="preview_logotype_white" style="background-color: #3e3e3e;">
          </div>
          <input id="company_logo_white" name="company_logo_white" type="file" accept="image/gif, image/jpeg, image/png">
        </div>
        <label class="control-label">
          <i class="glyphicon glyphicon-send"></i>Configuración de facebook Y Google:
        </label>

       <input type="text" class="form-control u-mb3" id="company_facebook_id" name="facebook_id" placeholder="Id de facebook">
       {{--  <input type="text" class="form-control u-mb3" id="facebook_id_live" name="facebook_id_live" placeholder="Id de facebook Live">
         <textarea rows="6" cols="30" class="form-control"  id="company_facebook_id_live" name="facebook_id_live" placeholder="Id Live o Iframe de youtube o facebook"></textarea>--}}
         <div class="form-group">
          <label class="control-label">
            <i class="glyphicon glyphicon-file"></i>Pixel de Facebook:
          </label>
          <textarea rows="6" cols="30" class="form-control"  id="company_facebook_pixel" name="facebook_pixel" placeholder="Pixel de facebook"></textarea>
        </div>



        <div class="form-group">
          <label class="control-label">
            <i class="glyphicon glyphicon-file"></i>Google Analytics:
          </label>
          <textarea rows="6" cols="40" class="form-control" name="google_analytics" id="company_google_analytics"></textarea>
        </div>



         <div class="form-group" style="display:none;">
          <label class="control-label">
            <i class="glyphicon glyphicon-file"></i>Texto de Mensaje Email:
          </label>
          <textarea rows="9" cols="40" class="form-control" name="mail_message" id="company_mail_message"></textarea>
        </div>


      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Descripción de la Empresa:
        </label>
        {{--<textarea rows="9" cols="40" class="form-control" id="company_description" name="description_company" ></textarea>--}}
        <textarea rows="6" class="form-control" id="company_description" name="description_company" placeholder="Escribe una breve descripción de la empresa..."></textarea>

      </div>
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Sobre el Fundador:
        </label>
        <textarea rows="7" cols="40" class="form-control" id="company_vision" name="vision" placeholder="Escribe la visión"></textarea>
      </div>
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Afiliate:
        </label>
        <textarea rows="7" cols="40" class="form-control" id="company_mission" name="mission" placeholder="Escribe la misión"></textarea>
      </div>
      @if(in_array('activar-trabaja-con-nosotros', $permissions_array))
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Título del pie de página de afiliate:
        </label>
        <textarea rows="9" cols="40" class="form-control" name="proposal_value" id="company_description_work"></textarea>
      </div>
      @endif


      <div class="form-group" style="display:none;">
        <label class="control-label">
          <i class="glyphicon glyphicon-file"></i>Texto del Título de promociones</label>

        <input class="form-control" type="" name="title_promotion" id="company_title_promotion">
      </div>
    </div>
    <div class="col-md-4">
      @if(in_array('activar-fecha-de-membresia', $permissions_array))
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-send"></i>Fecha de membresía:
        </label>
        <input type="text" class="form-control u-mb3" id="company_membership-date" name="" placeholder="" disabled="true">
      </div>
      @endif
      <div class="form-group">
        <label class="control-label">
          <i class="glyphicon glyphicon-send"></i>Contacto de la Empresa:
        </label>
        <input type="text" class="form-control u-mb3" id="company_cel" name="cel" placeholder="Celular">
        <div id="company-error-cel" class="mensaje-error"></div>
        <input type="text" class="form-control u-mb3" id="company_cel_optional" name="cel_optional" placeholder="Celular opcional">
        <div id="company-error-cel-optional" class="mensaje-error"></div>
        <input type="text" class="form-control u-mb3" id="company_phone" name="phone" placeholder="Teléfono">
        <input type="email" class="form-control u-mb3" id="company_email" name="email" placeholder="Correo">
        <div id="company-error-email" class="mensaje-error"></div>
         <label class="control-label">
          <i class="glyphicon glyphicon-send"></i>Redes Sociales:
        </label>
        <input type="text" class="form-control u-mb3" id="company_facebook" name="facebook" placeholder="Url fan page facebook">
        <input type="text" class="form-control u-mb3" id="company_twitter" name="twitter" placeholder="Url Twitter">
        <input type="text" class="form-control u-mb3" id="company_google" name="google" placeholder="Url Google">
        <input type="text" class="form-control u-mb3" id="company_instagram" name="instagram" placeholder="Url Instagram">
        <input type="text" class="form-control u-mb3" id="company_youtube" name="youtube" placeholder="Url Youtube">

        <input type="text" class="form-control u-mb3" id="company_linkedin" name="linkedin" placeholder="Url Linkedin">
        <input type="text" class="form-control u-mb3" id="company_whatsapp" name="whatsapp" placeholder="Url Whatsapp">

        <label class="control-label">
          <i class="glyphicon glyphicon-send"></i>Ubicación:
        </label>
        <input type="text" id="company_address" name="address" class="form-control u-mb3" placeholder="Dirección" />
        <textarea name="schedule" placeholder="Horario de atención" class="form-control u-mb3" id="company_schedule" cols="10" rows="2"></textarea>
        <input type="text" class="form-control u-mb3" id="company_city" name="city" placeholder="Ciudad">
        <input type="text" class="form-control u-mb3" id="company_country" name="country" placeholder="País">

        <input style="display:none" type="text" id="company_address_" name="" class="form-control u-mb3" placeholder="Google Maps" />
        <input type="hidden" id="company_latitude" name="latitude" value="">
        <input type="hidden" id="company_longitude" name="longitude" value="">
        <div id="location" style="width: 100%; height: 200px; display:none;" class="u-mb3"></div>

        <label class="control-label">
          <i class="glyphicon glyphicon-send"></i>Configuración de la Tienda:
        </label>
        <div class="form-group">

          <div class="radio">
            <input type="radio"  style="position: initial; margin-left: 0px;"  name="status"  id="form_production" value="1">
            <label style="padding-right: 30px; padding-left: 0px;" for="form_production">Publicado</label>

            <input type="radio"  style="position: initial; margin-left: 0px;" name="status"  id="form_developed" value="0">
            <label style="padding-right: 30px; padding-left: 0px;" for="form_developed">No Publicado</label>

          </div>

        </div>

        <label class="control-label" style="display:none;">
          <i class="glyphicon glyphicon-send"></i>Configuración del modal suscripción:
        </label>
        <div class="form-group" style="display:none;">

          <div class="radio">

            <input type="radio"  style="position: initial; margin-left: 0px;"  name="show_suscription_modal"  id="form_production_" value="1">
            <label style="padding-right: 30px; padding-left: 0px;" for="form_production_">Mostrar</label>

            <input type="radio"  style="position: initial; margin-left: 0px;" name="show_suscription_modal"  id="form_developed_" value="0">
            <label style="padding-right: 30px; padding-left: 0px;" for="form_developed_">No Mostrar</label>

          </div>

        </div>

        @if(in_array('activar-termnos-y-condiciones', $permissions_array))
        <div class="form-group">
          <label class="control-label">
            <i class="glyphicon glyphicon-file"></i>Términos y condiciones (Se visualiza en el pie de Pàgina del correo, pie de pàgina de la Orden y en la ventana antes de aceptar la compra):
          </label>
          <textarea rows="9" cols="40" class="form-control" name="terms_and_conditions" id="company_terms-and-conditions"></textarea>
        </div>
        @endif

        <div class="form-group" style="display:none;">
             <label class="control-label">Tipo de Header: </label>
              <select class="form-control" name="type_header" id="company_type_header">
                <option value="1">header Multiple</option>
                <option value="2">Header Mono</option>
              </select>
        </div>

        <div class="form-group">
        <label class="control-label">Color Primario</label>
        <div class="input-icon col-md-12 input-group colorpicker-color_primary " id="rate"  data-color="" data-color-format="rgba">
        <i class="glyphicon glyphicon-tint" id="colorpicker-color_primary"  style="color: #999999;display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;"></i>
        <input type="text"  id="company_color_primary" value="" name="color_primary" class="form-control" style="padding-left: 40px !important; height: 50px;">
        </div>
        <label class="control-label">Color Secundario</label>
        <div class="input-icon col-md-12 input-group colorpicker-color_secondary " data-color="" data-color-format="rgba">
        <i class="glyphicon glyphicon-tint" id="colorpicker-color_secondary" style="color: #999999;display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;"></i>
        <input type="text"  id="company_color_secondary"  value="" name="color_secondary" class="form-control" style="padding-left: 40px !important; height: 50px;">
        </div>

        <label class="control-label">Color Terciario</label>
        <div class="input-icon col-md-12 input-group colorpicker-color_tertiary " data-color="" data-color-format="rgba">
        <i class="glyphicon glyphicon-tint" id="colorpicker-color_tertiary" style="color: #999999;display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;"></i>
        <input type="text"  id="company_color_tertiary"  value="" name="color_tertiary" class="form-control" style="padding-left: 40px !important; height: 50px;">
        </div>
        <label class="control-label">Color Fuente</label>
        <div class="input-icon col-md-12 input-group colorpicker-color_font " data-color="" data-color-format="rgba">
        <i class="glyphicon glyphicon-tint" id="colorpicker-color_font" style="color: #999999;display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;"></i>
        <input type="text"  id="company_color_font"  value="" name="color_font" class="form-control" style="padding-left: 40px !important; height: 50px;">
        </div>
        <label class="control-label">Color Fuente Hover</label>
        <div class="input-icon col-md-12 input-group colorpicker-color_font_hover " data-color="" data-color-format="rgba">
        <i class="glyphicon glyphicon-tint" id="colorpicker-color_font_hover" style="color: #999999;display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;"></i>
        <input type="text"  id="company_color_font_hover"  value="" name="color_font_hover" class="form-control" style="padding-left: 40px !important; height: 50px;">
        </div>
        <label class="control-label">Color Header</label>
        <div class="input-icon col-md-12 input-group colorpicker-color_header_menu " data-color="" data-color-format="rgba">
        <i class="glyphicon glyphicon-tint" id="colorpicker-color_header_menu" style="color: #999999;display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;"></i>
        <input type="text"  id="company_color_header_menu"  value="" name="color_header_menu" class="form-control" style="padding-left: 40px !important; height: 50px;">
        </div>
        <label class="control-label">Color Header Promoción</label>
        <div class="input-icon col-md-12 input-group colorpicker-color_header_promotion " data-color="" data-color-format="rgba">
        <i class="glyphicon glyphicon-tint" id="colorpicker-color_header_promotion" style="color: #999999;display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;"></i>
        <input type="text"  id="company_color_header_promotion"  value="" name="color_header_promotion" class="form-control" style="padding-left: 40px !important; height: 50px;">
        </div>

        <div class="form-group">
             <label class="control-label">Script Chat: </label>
             <textarea rows="9" cols="40" class="form-control" name="script_chat"></textarea>
        </div>

        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <button type="button" class="btn btn-success" id="company-info-save">
      <i class="glyphicon glyphicon-floppy-disk u-mr2"></i>Guardar
      </button>
    </div>
    {!! Form::close() !!}
  </div>
</div>
