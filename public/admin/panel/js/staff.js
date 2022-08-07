$(document).on('ready', function(){

    $.get('/admin/staff', function(data){
        loadGridStaff(data);
    });
});

function loadGridStaff(staff)
{
    var content = '';
    var published = '';
    if (staff) {
        $.each(staff,function(k,t){
            published  = getSimbolPublished(t.published);
            content = content +  '<div class="col-lg-3 col-md-4 col-sm-6 phs">'+
                                  '<li class="item-account">'+
                                    '<figure class="item-image">'+
                                      '<img src="'+t.image+'" alt="" />'+
                                    '</figure>'+
                                    '<span style="display: block;text-align: center;">'+t.first_name+" "+t.last_name+'</span>'+
                                    '<div class="item__controls">'+
                                      '<button type="button" data-index="'+t.id+'" data-staff_name="'+t.first_name+" "+t.last_name+'" data-published="'+t.published+'" class="btn btn-warning staff__change-published" title="'+published.name+'">'+
                                        '<i class="'+published.simbol+'"></i>'+
                                        '</button>'+
                                     '<button type="button" data-index="'+t.id+'" class="btn btn-success staff__edit"  data-target="#add-staff" data-toggle="modal" title="Editar">'+
                                         '<i class="glyphicon glyphicon-pencil"></i>'+
                                    '</button>'+
                                      '<button type="button" data-index="'+t.id+'" class="btn btn-danger staff__delete"  title="Eliminar">'+
                                        '<i class="glyphicon glyphicon-trash"></i>'+
                                      '</button>'+
                                    '</div>'+
                                  '</li>'+
                                '</div>';
        });
        $('#staff-grid').empty();
        $('#staff-grid').append(content);
    }
}

$('#staff__add').on('click', function(){
    cleanModalStaff();
    $(`#staff__update`).hide();
});

$(document).on('click', '.staff__edit', function(){
    cleanModalStaff();
    $(`#staff__save`).hide();
    addInputPut($(`#form_staff`), `staff_method`);
    getStaffToEdit($(this).data('index'));
});

function getStaffToEdit(staff_id)
{
    $.get('/admin/staff/'+staff_id, function(data){
        $('#staff_id').val(data.id);
        $('input[name="first_name"]').val(data.first_name);
        $('input[name="last_name"]').val(data.last_name);
        $('input[name="cellphone"]').val(data.cellphone);
        $('input[name="whatsapp"]').val(data.whatsapp);
        $('input[name="email"]').val(data.email);

        $('input[name="role"]').val(data.role);
        $('textarea[name="description"]').val(data.description);
        $('input[name="facebook"]').val(data.facebook);
        $('input[name="twitter"]').val(data.twitter);
        $('input[name="linkedin"]').val(data.linkedin);
        $('select[name="place_id"]').val(data.place_id);

        $('select[name="type"]').val(data.type);

        if (data.image) {
            $('#staff_preview-image').append('<img src="'+data.image+'" style="display: block;">');
            $('#staff_preview-text').hide();
        }
    });
}

$(document).on('click', '.staff__change-published', function(){
    changePublishStaff($(this).data('index'));
});

function changePublishStaff(staff_id)
{
    var _text = "¿Cambiar el estado?";
    var _route = `/admin/staff/${staff_id}/publish`;
    
    swal({
      title: _text,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: 'Aceptar',
      cancelButtonText:'Cancelar',
      closeOnConfirm: true },
      function(){
        lockWindow();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
        });
        $.ajax({
            url: _route,
            data: {'staff_id':staff_id},
            type: 'PUT',
            success: function(result) {
                unlockWindow();
                if (result.success == true) {
                    $.growl.notice({ message: "Se ha cambiado el estado del Staff" });
                    $.get('/admin/staff', function(data){
                        loadGridStaff(data);
                    });
                }
                if (result.success == false) {
                    $.growl.error({ message: "Ha ocurrido un error al intentar cambiar el estado del Staff" });
                }
            }
        });
      });
}

$(document).on('click', '.staff__delete', function(){
    deleteStaff($(this).data('index'));
});

function deleteStaff(staff_id)
{
    swal({   title: 'Borrar el Staff',
      text: '¿Está usted seguro?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: 'Aceptar',
      cancelButtonText:'Cancelar',
      closeOnConfirm: true },
      function(){
        var _route = "/admin/staff/"+staff_id;
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
                $.growl.notice({ message: result.message });
                $.get('/admin/staff', function(data){
                    loadGridStaff(data);
                });
            },
            error:function(jqXHR, textStatus, errorThrown){
                unlockWindow();
                $.growl.error({ message: "Ha ocurrido un error al eliminar el testimonio" });
            }
        });
});
}

$('#staff__update').on('click', function(){
    cleanError();
    updateStaff();
});

function updateStaff()
{
    var _route  = '/admin/staff/'+$('#staff_id').val();
    var _formData = new FormData($('#form_staff')[0]);

    lockWindow();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
       url : _route,
       type: 'POST',
       data: _formData,
       contentType: false,
       processData: false,
       success: function(e){
         unlockWindow();
            $.growl.notice({ message: e.message });
            $('#add-staff').modal('hide');

            $.get('/admin/staff', function(data){
                loadGridStaff(data);
            });
     },
      error:function(jqXHR, textStatus, errorThrown)
        {
            unlockWindow();

            $.each(jqXHR.responseJSON, function( key, value ) {
                $.each(value, function( errores, eror ) {
                $(`#staff-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                });              
            });
       }
     });
}

$('#staff__save').on('click', function(){
    cleanError();
    saveStaff();
});

function saveStaff()
{

    var _route  = 'staff';
    var _formData = new FormData($('#form_staff')[0]);
    console.log("doawdkowadokaw");
    lockWindow();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
       url : _route,
       type: 'POST',
       data: _formData,
       contentType: false,
       processData: false,
       success: function(e){
         unlockWindow();
            $.growl.notice({ message: e.mesasge });
            $('#add-staff').modal('hide');

            $.get('/admin/staff', function(data){
                loadGridStaff(data);
            });
       },
      error:function(jqXHR, textStatus, errorThrown)
        {
            unlockWindow();
            $.each(jqXHR.responseJSON, function( key, value ) {
                $.each(value, function( errores, eror ) {
                $(`#staff-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                });              
            });
       }
    });
}

function cleanModalStaff(action){

    $('#staff_method').remove();
    $('#staff_preview-image').empty();
    $(`#form_staff`)[0].reset();
    let _previewText = '';

    _previewText = '<label id="staff_preview-text">'+
                            '<i class="glyphicon glyphicon-picture"></i>'+
                            '<span class="u-ml3">Añadir Foto</span>'+
                            '</label>';

    $('#staff_preview-text').remove();
    $('#staff_image-container').prepend(_previewText);
    $('#staff__save').show();
    $('#staff__update').show();
}
