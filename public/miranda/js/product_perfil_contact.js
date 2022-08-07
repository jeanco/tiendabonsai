(() => {
    getElement(`#product-perfil-contact__send`)
    .addEventListener('click', () => {
        cleanError();
        $("#fakeLoader").show();
        axios.post('/api/miranda/orders', {
                'name': getElement(`#product-perfil-contact-name`).value,
                'cel': getElement(`#product-perfil-contact-cel`).value,
                'msg': getElement(`#product-perfil-contact-message`).value,
                'product_id': getElement(`#product-perfil_id`).value,
            })
            .then((risposta) => {
                // $(`#contactar`).modal('hide');
                $(`#contactar-cel-company`).modal(`show`);
                // alert(risposta.data.message);
                $("#fakeLoader").hide();
            })
            .catch((error) => {
                $.each(error.response.data, function(key, value) {
                    if (key == "name") {
                        $.each(value, function(errores, eror) {
                            $('#product-perfil-contact-name-error').append("<li class='error-block'>" + eror + "</li>");
                        });
                    } else if (key == "cel") {
                        $.each(value, function(errores, eror) {
                            $('#product-perfil-contact-cel-error').append("<li class='error-block'>" + eror + "</li>");
                        });
                    } else if (key == "msg") {
                        $.each(value, function(errores, eror) {
                            $('#product-perfil-contact-message-error').append("<li class='error-block'>" + eror + "</li>");
                        });
                    };
                });
            });

    });

})();