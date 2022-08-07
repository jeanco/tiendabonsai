var notice = {
  inputTitle: getElement("#notice_title"),
  inputLink: getElement("#notice_link"),
  inputHiddenId: getElement("#notice_id"),
  inputImage: getElement('#notice_image'),
  
  btnAdd: getElement("#notice__add"),
  btnSave: getElement("#notice__save"),
  btnUpdate: getElement("#notice__update"),
  btnClose: getElement("#notice__close"),
  divGrid: getElement("#notices_grid"),

  form: getElement("#notice_form"),

  divPreviewImage: getElement('#notice_preview-image'),
  labelPreviewText: getElement('#notice_preview-text'),
};

function startNotices() {
  let _route = "notices";

  axios.get(_route)
    .then(({
      data
    }) => {
      loadGridNotices(data);
    });
}

//Notices == statements
function loadGridNotices(statements) {
  let _content = "";
  let _published = "";

  statements.forEach(statement => {
    _published = getSimbolPublished(statement.published);

    _content += `
        <div class="col-lg-3 col-md-4 col-sm-6 phs">
          <li class="item-account">
            <figure class="item-image"> 
              <img src="${statement.image_thumb}" alt="" /> 
            </figure> 
            <span style="display: block;text-align: center;">${statement.title}&nbsp;</span> 
            <div class="item__controls"> 
              <button type="button"
                value="${statement.id}"
                onClick="noticePublished(this)"              
                data-testimony_name="${statement.title}"
                data-published="${statement.published}"
                class="btn btn-warning" 
                title="${_published.name}"> 
                
                <i class="${_published.simbol}"></i> 
              </button> 
              
              <button type="button"
                value="${statement.id}"
                onClick="noticeEdit(this)"
                class="btn btn-success"
                data-target="#notice-modal"
                data-toggle="modal"
                title="Editar">

                <i class="glyphicon glyphicon-pencil"></i>
              </button>

              <button type="button" 
                value="${statement.id}"
                onClick="noticeDelete(this)"
                class="btn btn-danger"
                title="Eliminar">
                
                <i class="glyphicon glyphicon-trash"></i>
              </button> 
            </div>
          </li>
        </div>`;
  });

  notice.divGrid.innerHTML = "";
  notice.divGrid.innerHTML = _content;
}

notice.btnAdd.addEventListener("click", function () {
  cleanNoticeModal();
  notice.btnUpdate.style.display = "none";
});

notice.btnSave.addEventListener("click", (e) => {
  let _route = "notices",
    _formData = new FormData($("#notice_form")[0]);

  cleanError();

  ajaxFormData(
    _route,
    _formData,
    function (result) {
      $("#notice-modal").modal("hide");
      toastNotice(result.message);

      let _r = "notices";

      axios.get(_r)
        .then(({
          data
        }) => {
          loadGridNotices(data);
        });
    },
    function (jqXHR, textStatus, errorThrown) {
      $('#notice_error').append(msgError);

      $.each(jqXHR.responseJSON, function (key, value) {
        if (key == "title") {
          $.each(value, function (errores, eror) {
            $('#notice-title-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if(key == "image"){
          $.each(value, function (errores, eror) {
            $('#notice-image-error').append("<li class='error-block'>" + eror + "</li>");
          });          
        };
      });
    }
  );
})

function noticeEdit(btn) {
  let _route = `notices/${btn.value}`;

  axios.get(_route)
    .then(({
      data
    }) => {

      cleanNoticeModal();
      addInputPut($('#notice_form'), "notice_method");
      notice.btnSave.style.display = "none";
      
      notice.inputHiddenId.value = data.id;
      notice.inputTitle.value = data.title;
      notice.inputLink.value = data.link;

      if (data.image_thumb != null) {
        notice.divPreviewImage.innerHTML = `<img src="${data.image_thumb}" style="display: block;">`;
        //notice.labelPreviewText.style.display = "none";
        $('#notice_preview-text').remove();
      }
      
    });
}

notice.btnUpdate.addEventListener("click", function () {
  let _route = `notices/${notice.inputHiddenId.value}`,
    _formData = new FormData($("#notice_form")[0]);
  cleanError();

  ajaxFormData(
    _route,
    _formData,
    function (result) {
      $("#notice-modal").modal("hide");
      toastNotice(result.message);

      let _route = "notices";

      axios.get(_route)
        .then(({
          data
        }) => {
          loadGridNotices(data);
        });
    },
    function (jqXHR, textStatus, errorThrown) {

      $('#doc_error').append(msgError);

      $.each(jqXHR.responseJSON, function (key, value) {
        if (key == "title") {
          $.each(value, function (errores, eror) {
            $('#doc-title-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "category") {
          $.each(value, function (errores, eror) {
            $('#doc-category-error').append("<li class='error-block'>" + eror + "</li>");
          });
        } else if (key == "summary") {
          $.each(value, function (errores, eror) {
            $('#doc-summary-error').append("<li class='error-block'>" + eror + "</li>");
          });
        };
      });

    }
  );
});

function noticePublished(btn) {
  let _route = `notices/${btn.value}/published`;

  let _title = (btn.dataset.published == 1) ? "¿Desea no publicar este comunicado?" : "¿Desea publicar este comunicado?";

  updatePublishedAxios(_route, {}, _title, function (response) {
    toastNotice("Se ha cambiado el estado.");

    let _r = "notices";

    axios.get(_r).then(({
      data
    }) => {
      loadGridNotices(data);
    });
  }, function (error) {
    toastError();
  });

}

function noticeDelete(btn) {
  let _route = `notices/${btn.value}`;
  
  deleteObjectAxios(_route, {}, "¿Desea eliminar esta noticia?", (response) => {
    toastNotice("Se ha borrado la noticia.");

    let _r = "notices";
    
    axios.get(_r).then(({
      data
    }) => {
      loadGridNotices(data);
    });
  }, (error) => {
    toastError();
  })
}

function cleanNoticeModal() {

  $('#notice_method').remove();
  notice.inputTitle.value = "";
  notice.inputLink.value = "";
  notice.inputHiddenId.value = "";
  notice.divPreviewImage.innerHTML = '';
  notice.inputImage.value = "";

  $('#notice_preview-text').remove();

  $(`#notice_image-container`).prepend(`
          <label id="notice_preview-text" style="text-align: center;">
            <i class="glyphicon glyphicon-picture"></i>
            <span class="u-ml3">Añadir Imágen</span>
          </label>
    `);


  notice.btnSave.style.display = "inline-block";
  notice.btnUpdate.style.display = "inline-block";
  //notice.labelPreviewText.style.display = 'block';

  cleanError();
}
