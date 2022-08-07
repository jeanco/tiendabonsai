
var id_category = 1;
$(document).on('ready', function() {

  $.get(`campaigns/${id_category}`, function(campaigns) {
    loadGridCampaigns(campaigns);
  });
});

$('#campaign_there-is-link-').on('change', function() {
  if ($(this).is(':checked') == true) {
    $('.there-is-link').show();
  } else {
    $('.there-is-link').hide();
  }
});

$('#category-select').on('change', function() {
  id_category =  $("#category-select").val();
  $.get(`campaigns/${id_category}`, function(campaigns) {
    loadGridCampaigns(campaigns);
  });
});

$('#campaign__add').on('click', function() {



  cleanCampaignModal();
  $('#campaign__update').hide();

  axios.get('/admin/campaign-categories')
    .then((response) => {
      _fillSelectWithOutFirstOption(getElement(`#campaign_category`), response.data, null);
    });
    addSummernoteEditor($('#campaign_title'));

     setTimeout(function() {
      //alert($("#category-select").val());
     // alert($("#campaign_category").val($("#category-select").val()));

    $("#campaign_category").val($("#category-select").val());

      }, 1000);

  //editor3($('#campaign_title'));
});

$('#campaign__close').on('click', function() {
  $('#campaign-modal').modal('hide');
});

$('#campaign__save').on('click', function() {
  let _route, _formData;
  _route = 'campaigns';
  _formData = new FormData($('#form_campaign')[0]);
  _formData.append('is_blank', $('#campaign_is-blank').is(':checked'));

  lockWindow();
  $.ajaxSetup({
    headers: {
      'csrftoken': $('input[name=_token]').val()
    }
  });
  $.ajax({
    url: _route,
    type: 'POST',
    data: _formData,
    contentType: false,
    processData: false,
    success: function(e) {
      unlockWindow();
      $.growl.notice({
        message: "Se ha creado correctamente la campaña."
      });
      $('#campaign-modal').modal('hide');
      $.get(`campaigns/${id_category}`, function(campaigns) {
        loadGridCampaigns(campaigns);
      });
    },
    error: function(jqXHR, textStatus, errorThrown) {
      unlockWindow();
      $.growl.error({
        message: "Ha ocurrido un error."
      });
    }
  });
});

$(document).on('click', '.campaign__edit', function() {
  let _campaignId;
  _campaignId = $(this).data('index');

  axios.get(`/admin/campaigns/edit/${_campaignId}`)
    .then((response) => {
      let campaign = response.data;

      cleanCampaignModal();
      $('#campaign__save').hide();
      addInputPut($('#form_campaign'), 'campaign_method');

      $('#campaign_id').val(campaign.id);
      $('#campaign_title').val(campaign.title);
            addSummernoteEditor($('#campaign_title'));

      //editor3($('#campaign_title'));
      $('#campaign_subtitle').val(campaign.subtitle);
      $('#campaign_content').val(campaign.content);

      if (campaign.link_text != '') {
        $('#campaign_there-is-link-').prop('checked', true);
        $('#campaign_link-text').val(campaign.link_text);
        $('#campaign_link').val(campaign.link);

        if (campaign.is_blank == true) {
          $('#campaign_is-blank').prop('checked', true);
        } else if (campaign.is_blank == false) {
          $('#campaign_is-blank').prop('checked', false);
        }

        $('.there-is-link').show();
      }

      if (campaign.image_thumb) {
        $('#campaign_image-preview').append('<img src="' + campaign.image_thumb + '" style="display: block;">');
        $('#campaign_preview-text-image').remove();
      }

      if (campaign.image) {
        $('#campaign_cover-preview').append('<img src="' + campaign.image + '" style="display: block;">');
        $('#campaign_preview-text-cover').remove();
      }
      $('#campaign-modal').modal('show');
      return campaign.category_id;


    })
    .then((category_id) => {
      axios.get('/admin/campaign-categories')
        .then((response) => {
          _fillSelectWithOutFirstOption(getElement(`#campaign_category`), response.data, category_id);
        });

    });

});

// $.get('campaigns/' + _campaignId, function(campaign) {
//   cleanCampaignModal();
//   $('#campaign__save').hide();
//   addInputPut($('#form_campaign'), 'campaign_method');

//   $('#campaign_id').val(campaign.id);
//   $('#campaign_title').val(campaign.title);
//   //editor3($('#campaign_title'));
//   $('#campaign_subtitle').val(campaign.subtitle);
//   $('#campaign_content').val(campaign.content);



//   if (campaign.link_text != '') {
//     $('#campaign_there-is-link-').prop('checked', true);
//     $('#campaign_link-text').val(campaign.link_text);
//     $('#campaign_link').val(campaign.link);

//     if (campaign.is_blank == true) {
//       $('#campaign_is-blank').prop('checked', true);
//     } else if (campaign.is_blank == false) {
//       $('#campaign_is-blank').prop('checked', false);
//     }

//     $('.there-is-link').show();
//   }

//   if (campaign.image_thumb) {
//     $('#campaign_image-preview').append('<img src="' + campaign.image_thumb + '" style="display: block;">');
//     $('#campaign_preview-text-image').remove();
//   }

//   if (campaign.image) {
//     $('#campaign_cover-preview').append('<img src="' + campaign.image + '" style="display: block;">');
//     $('#campaign_preview-text-cover').remove();
//   }
// });

// });

$('#campaign__update').on('click', function() {

  let _route, _formData;
  _route = 'campaigns/' + $('#campaign_id').val();
  _formData = new FormData($('#form_campaign')[0]);
  _formData.append('is_blank', $('#campaign_is-blank').is(':checked'));

  lockWindow();
  $.ajaxSetup({
    headers: {
      'csrftoken': $('input[name=_token]').val()
    }
  });
  $.ajax({
    url: _route,
    type: 'POST',
    data: _formData,
    contentType: false,
    processData: false,
    success: function(e) {
      unlockWindow();
      $.growl.notice({
        message: "Se ha creado actualizado la campaña."
      });
      $('#campaign-modal').modal('hide');
      $.get(`campaigns/${id_category}`, function(campaigns) {
        loadGridCampaigns(campaigns);
      });
    },
    error: function(jqXHR, textStatus, errorThrown) {
      unlockWindow();
      $.growl.error({
        message: "Ha ocurrido un error."
      });
    }
  });
});

$(document).on('click', '.campaign__published', function() {

  let _text, _lastStatus, _name, _id;

  _id = $(this).data('index');
  _lastStatus = $(this).data('published');
  _name = jQuery($(this).data('campaign_title')).text();

  if (_lastStatus == 1) {
    _text = "¿Dejar de publicar " + _name + '?';
  } else if (_lastStatus == 0) {
    _text = "¿Publicar " + _name + '?';
  }

  swal({
      title: _text,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: 'Aceptar',
      cancelButtonText: 'Cancelar',
      closeOnConfirm: true
    },
    function() {

      let _route = "campaigns/" + _id + "/published";
      lockWindow();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
      });
      $.ajax({
        url: _route,
        data: {},
        type: 'PUT',
        success: function(result) {
          unlockWindow();
          $.growl.notice({
            message: "Se ha cambiado el estado de la campaña."
          });
          $.get(`campaigns/${id_category}`, function(campaigns) {
            loadGridCampaigns(campaigns)
          });
        },
        error: function(jqXHR, textStatus, errorThrown) {
          unlockWindow();
          $.growl.error({
            message: "Ha ocurrido un error."
          });
        }
      });
    });
});

$(document).on('click', '.campaign__delete', function() {
  let _id;

  _id = $(this).data('index');

  swal({
      title: "¿Borrar la campaña?",
      text: "¿Estás seguro?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Aceptar",
      cancelButtonText: "Cancelar",
      closeOnConfirm: true
    },
    function() {
      let _route = "campaigns/" + _id;
      lockWindow();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
      });
      $.ajax({
        url: _route,
        data: {},
        type: 'DELETE',
        success: function(result) {
          unlockWindow();
          $.growl.notice({
            message: "Se ha eliminado la campaña."
          });
          $.get(`campaigns/${id_category}`, function(campaigns) {
            loadGridCampaigns(campaigns)
          });
        },
        error: function(jqXHR, textStatus, errorThrown) {
          $.growl.error({
            message: "Ha ocurrido un error."
          });
        }
      });
    });
});


function loadGridCampaigns(campaigns) {
  let _content, _published;

  _content = '';
  $('#campaigns_grid').empty();

  $.each(campaigns, function(k, campaign) {
    _published = getSimbolPublished(campaign.published);
    _content = _content +
      // '<div class="col-lg-3 col-md-4 col-sm-6 phs">' +
      // '<li class="item-account">' +
      // '<figure class="item-image">' +
      // '<img src="' + campaign.image + '" alt="" />' +
      // '</figure>' +
      // '<span style="display: block;text-align: center;">' + campaign.title + '</span>' +
      // '<div class="item__controls">' +((getElement(`#campaign_publish`).value) ? '<button type="button" data-index="' + campaign.id + '" data-campaign_title="' + campaign.title + '" data-published="' + campaign.published + '" class="btn btn-warning campaign__published" title="' + _published.name + '">' +
      // '<i class="' + _published.simbol + '"></i>' + '</button>' : '')+
      // ((getElement(`#campaign_edit`).value) ? '<button type="button" data-index="' + campaign.id + '" class="btn btn-success campaign__edit"  data-target="" data-toggle="modal" title="Editar">' +
      // '<i class="glyphicon glyphicon-pencil"></i>' +
      // '</button>' : '' ) +
      // ((getElement(`#campaign_delete`).value) ? '<button type="button" data-index="' + campaign.id + '" class="btn btn-danger campaign__delete"  title="Eliminar">' +
      // '<i class="glyphicon glyphicon-trash"></i>' +
      // '</button>' : '') +
      // '</div>' +
      // '</li>' +
      // '</div>';
      '<div class="col-md-4 col-sm-6 u-mb4">' +
        '<div class="item_portada">' +
            '<div class="img_portada">' +
              '<img src="' + campaign.image + '" alt="" style="width: 100%">' +
            '</div>' +
            '<div class="info_portada">' +
              '<h3 class="title_portada" title="' + campaign.title + '">' + campaign.title + '</h3>' +
              '<div class="option_row">' +
                '<div class="col-md-2 u-px0" style="color: #32b032;">Publicado</div>' +
                '<div class="col-md-10 u-px0 text-right">' +
                  ((getElement(`#campaign_publish`).value) ? '<a href="#" class="option_portada text-warning campaign__published" data-index="' + campaign.id + '" data-campaign_title="' + campaign.title + '" data-published="' + campaign.published + '" title="' + _published.name + '">' +
                    '<i class="' + _published.simbol + '"></i>' +
                  '</a>' : '') +
                  ((getElement(`#campaign_edit`).value) ? '<a href="#" class="option_portada text-success campaign__edit" data-index="' + campaign.id + '" data-target="" data-toggle="modal" title="Editar">' +
                    '<i class="glyphicon glyphicon-pencil"></i>' +
                  '</a>' : '') +
                  ((getElement(`#campaign_delete`).value) ? '<a href="#" class="option_portada text-danger campaign__delete" data-index="' + campaign.id + '" title="Eliminar">' +
                    '<i class="glyphicon glyphicon-trash"></i>' +
                  '</a>' : '') +
                '</div>' +
              '</div>' +
            '</div>' +
        '</div>' +
      '</div>';
  });

  $('#campaigns_grid').append(_content);
}

function cleanCampaignModal() {
  $('.there-is-link').hide();
  $('#campaign_there-is-link-').prop('checked', false);

  $('#campaign__save').show();
  $('#campaign__update').show();

  $('#campaign_method').remove();

  $('#campaign_title').summernote('destroy');
  $('#campaign_title').val('');
  $('#campaign_subtitle').val('');
  $('#campaign_content').val('');
  $('#campaign_link-text').val('');
  $('#campaign_link').val('');
  $('#campaign_is-blank').prop('checked', false);

  let _previewTextImage, _previewTextCover;

  _previewTextImage = '<label id="campaign_preview-text-image">' +
    '<i class="glyphicon glyphicon-picture"></i>' +
    '<span class="u-ml3">Añadir Imágen</span>' +
    '</label>';

  _previewTextCover = '<label id="campaign_preview-text-cover">' +
    '<i class="glyphicon glyphicon-info-sign"></i>' +
    '<span class="u-ml3">Añadir Portada</span>' +
    '</label>';

  $('#campaign_preview-text-image').remove();
  $('#campaign_preview-text-cover').remove();

  $('#campaign_image-preview').empty();
  $('#campaign_cover-preview').empty();

  $('#campaign_image').val('');
  $('#campaign_cover').val('');

  $('#campaign_image-container').prepend(_previewTextImage);
  $('#campaign_cover-container').prepend(_previewTextCover);

}
