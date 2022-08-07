function loadCompany() {
  var ruta = 'companies/first';
  ajaxAll_GET(ruta, successLoadCompany)
}

function successLoadCompany(data) {
  if (data.company) {
    $('#company_id').val(data.company.id);
    $('#company_name').val(data.company.name_company);
    $('#company_ruc').val(data.company.ruc);
    $('#company_description').val(data.company.description_company);
    addSummernoteEditor($('#company_description'));

    // editor2('company_description');
    document.querySelector(`#company_business-name`).value = data.company.business_name;

    $('#company_description_work').val(data.company.proposal_value);
    addSummernoteEditor($('#company_description_work'));
    // editor2('company_description_work');
    $('#company_proposal-value').val(data.company.proposal_value);
    // editor2('company_proposal-value');
    $('#company_cel').val(data.company.cel);
    $('#company_cel_optional').val(data.company.cel_optional);
    $('#company_phone').val(data.company.phone);
    $('#company_email').val(data.company.email);
    $('#company_facebook').val(data.company.facebook);
    $('#company_twitter').val(data.company.twitter);
    $('#company_google').val(data.company.google);
    $('#company_instagram').val(data.company.instagram);
    $('#company_youtube').val(data.company.youtube);
    $('#company_address').val(data.company.address);
    $('#company_city').val(data.company.city);
    $('#company_country').val(data.company.country);

    $('#company_linkedin').val(data.company.linkedin);
    $('#company_whatsapp').val(data.company.whatsapp);
    $('#company_facebook_id').val(data.company.facebook_id);
    $('#company_title_promotion').val(data.company.title_promotion);
    $('#company_facebook_pixel').val(data.company.facebook_pixel);
    $('#company_google_analytics').val(data.company.google_analytics);
        

      $('#company_type_header').val(data.company.type_header);


    if(data.company.status == 1){
       $('#form_production').prop('checked', true);
        }
    else{
        $('#form_developed').prop('checked', true);
    }  

        $('#form_developed_').prop('checked', true);
        if (data.company.show_suscription_modal) {
            $('#form_production_').prop('checked', true);
        }

    $('#company_color_primary').val(data.company.color_primary);

    var intro = document.getElementById('colorpicker-color_primary');
    intro.style.cssText = "color: "+data.company.color_primary+";display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;";
   /* document.getElementById("rate").dataset.color = data.company.color_primary;*/
   /* $('#company_color_primary').append('<div class="input-icon col-md-12 input-group colorpicker-color_primary "  data-color="'+data.company.color_primary+'" data-color-format="rgba">   <i class="glyphicon glyphicon-tint" style="color: '+data.company.color_primary+';display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;"></i>        <input type="text" readonly="true" value="'+data.company.color_primary+'" name="color_primary" class="form-control" style="padding-left: 40px !important; height: 50px;"> </div>')*/



    $('#company_color_secondary').val(data.company.color_secondary);

    var intro = document.getElementById('colorpicker-color_secondary');
    intro.style.cssText = "color: "+data.company.color_secondary+";display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;";


    $('#company_color_tertiary').val(data.company.color_tertiary);
    var intro = document.getElementById('colorpicker-color_tertiary');
    intro.style.cssText = "color: "+data.company.color_tertiary+";display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;";


    $('#company_color_font').val(data.company.color_font);
    var intro = document.getElementById('colorpicker-color_font');
    intro.style.cssText = "color: "+data.company.color_font+";display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;";


    $('#company_color_font_hover').val(data.company.color_font_hover);
    var intro = document.getElementById('colorpicker-color_font_hover');
    intro.style.cssText = "color: "+data.company.color_font_hover+";display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;";


    $('#company_color_header_promotion').val(data.company.color_header_promotion);
    var intro = document.getElementById('colorpicker-color_header_menu');
    intro.style.cssText = "color: "+data.company.color_header_promotion+";display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;";


    $('#company_color_header_menu').val(data.company.color_header_menu);
    var intro = document.getElementById('colorpicker-color_header_promotion');
    intro.style.cssText = "color: "+data.company.color_header_menu+";display: block;position: absolute;margin: 10px 2px 4px 10px; width: 16px;height: 16px;  font-size: 30px;text-align: center; z-index: 3;";


    $('textarea[name="script_chat"]').val(data.company.script_chat);

    $('#company_membership-date').val(data.company.membership_date_formatted);

    getElement('#company_mission').value = data.company.mission;
    getElement('#company_vision').value = data.company.vision;
    getElement('#company_mail_message').value = data.company.mail_message;

    addSummernoteEditor($('#company_mission'));
    addSummernoteEditor($('#company_vision'));

    addSummernoteEditor($('#company_mail_message'));



    $(`#company_terms-and-conditions`).val(data.company.terms_and_conditions)
    addSummernoteEditor($('#company_terms-and-conditions'));
    // getElement('#company_terms-and-conditions').value = data.company.terms_and_conditions;
    // getElement('#company_schedule').value = data.company.schedule;

    //Chargin google map
    $('#company_address').val(data.company.address);
    $('#company_latitude').val(data.company.latitude);
    $('#company_longitude').val(data.company.longitude);

    $('#location').locationpicker({
      enableAutocomplete: true,
      enableReverseGeocode: true,
      radius: 0,
      location: {
        latitude: $('#company_latitude').val(),
        longitude: $('#company_longitude').val()
      },
      inputBinding: {
        latitudeInput: $('#company_latitude'),
        longitudeInput: $('#company_longitude'),
        locationNameInput: $('#company_address_')
      }
    })


    if (data.company.logotype) {
      $('#company-preview-image-text').hide();
      $('#preview_logotype').append('<img src="' + data.company.logotype + '" alt="Image" style="display: inline;" />')
    }

    if (data.company.logotype_white) {
      $('#company-preview-image-white-text').hide();
      $('#preview_logotype_white').append('<img src="' + data.company.logotype_white + '" alt="Image" style="display: inline;" />')

    }

    $('#company_title_slogan').val(data.company.title_slogan);
    // editorTitle('company_title_slogan');
    $('#company_subtitle_slogan').val(data.company.subtitle_slogan);
    // editorTitle('company_subtitle_slogan');

    loadCompanyVideos(data.videos);
  } else {
    alert('No existe una compañía registrada')
  }
}
