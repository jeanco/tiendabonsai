/*Usuarios*/
$(document).on('ready', function () {
  $.get('users', function (data) {
    loadGridUsers(data.users);
  });

  $('#customers_only').on('change', function(){

    var value = $("#customers_only").val();
    var parametros = {
      //datos de la empresa
      'type' : value,
      //'_token':$('#_token').val()

      };

    $.get('users',parametros, function (data) {
    loadGridUsers(data.users);
  });


 
    
});
});

$('#user_add').on('click', function () {
  cleanError();
  cleanModalModuleUser();
  $('#user_save').show();
});

$(document).on('click', '.user_edit', function () {
  cleanError();
  cleanModalModuleUser();
  addInputPut($('#form_users'), 'user_method');
  $('#user_password-area').hide();
  $('#user_update').show();
  getUserToEdit($(this).data('index'));
});

$(document).on('click', '.user_suspend', function () {
  suspendUser($(this).data('index'));
});

$(document).on('click', '.user_activate', function () {
  activateUser($(this).data('index'));
});

$(document).on('click', '.user_change-password', function () {
  $('#password_user-id').val('');
  $('#form_password')[0].reset();
  $('#password_user-id').val($(this).data('index'));
});

$('#user_save').on('click', function () {
  saveUser();
});

$('#user_update').on('click', function () {
  updateUser();
});


function cleanModalModuleUser() {
  var _previewText = '';

  $('#user_preview-text').remove();
  $('#user_preview-image').empty();

  _previewText = '<label id="user_preview-text">' +
    '<i class="glyphicon glyphicon-picture"></i>' +
    '<span class="u-ml3">Añadir Foto</span>' +
    '</label>';

  $('#user_image-container').prepend(_previewText);
  $('#user_method').remove();
  $('#user_save').hide();
  $('#user_update').hide();

  $('#user_password-area').show();
  $('#user_username').val('');
  $('#user_firstname').val('');
  $('#user_lastname').val('');
  $('#user_email').val('');
  $('#user_cel').val('');
  $('#user_address').val('');
  $('#user_image').val('');
}

/*--------------------------------------------------*/
/*Perfil de usuario*/

$('#user_editar_perfil').on('click', function () {
  cleanModalUser();
  $('#modalProfile').modal('show');
  userProfileEdit();
});

$('#save-profile').on('click', function () {
  cleanError();
  userProfileSave();
});

function cleanModalUser() {
  $('#user_preview-profile-image').empty();
  $('#user_preview_text').show();
  $('#user_profile-image').val('');
	
  $('#user_preview-profile-text').show();

}
