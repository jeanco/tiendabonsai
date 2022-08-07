function loadGridTestimonies(testimonies)
{
    var content = '';
    var published = '';
    if (testimonies) {
        $.each(testimonies,function(k,t){
            published  = getSimbolPublished(t.published);
            content = content +  '<div class="col-lg-3 col-md-4 col-sm-6 phs">'+
                                  '<li class="item-account">'+
                                    '<figure class="item-image">'+
                                      '<img src="'+t.image+'" alt="" />'+
                                    '</figure>'+
                                    '<span style="display: block;text-align: center;">'+t.full_name+'</span>'+
                                    '<div class="item__controls">'+
                                      '<button type="button" data-index="'+t.id+'" data-testimony_name="'+t.full_name+'" data-published="'+t.published+'" class="btn btn-warning testimony__change-published" title="'+published.name+'">'+
                                        '<i class="'+published.simbol+'"></i>'+
                                        '</button>'+
                                     '<button type="button" data-index="'+t.id+'" class="btn btn-success testimony__edit"  data-target="#add-testimony" data-toggle="modal" title="Editar">'+
                                         '<i class="glyphicon glyphicon-pencil"></i>'+
                                    '</button>'+
                                      '<button type="button" data-index="'+t.id+'" class="btn btn-danger testimony__delete"  title="Eliminar">'+
                                        '<i class="glyphicon glyphicon-trash"></i>'+
                                      '</button>'+
                                    '</div>'+
                                  '</li>'+
                                '</div>';
        });
        $('#testimonies-grid').empty();
        $('#testimonies-grid').append(content);
    }
}