(() => {

	getElement(`#quotation__save`)
		.addEventListener('click', function(e) {
            e.preventDefault();
            cleanError();
            // $(".preloader").fadeIn("slow");
                axios.post(`/api/wings/quotation`, {
                    'product_slug': getElement(`#quotation_vehicle`).value,
                    'identity_document': getElement(`#quotation_identity-document`).value,
                    'first_name': getElement(`#quotation_first-name`).value,
                    'last_name': getElement(`#quotation_last-name`).value,
                    'email': getElement(`#quotation_email`).value,
                    'cel_whatsapp': getElement(`#quotation_cel`).value,
                    'city_id': getElement(`#quotation_city`).value,
                    'observation': getElement(`#quotation_observation`).value,
                })
                .then((response) => {
                    // $(".preloader").fadeOut("slow");
                    console.log("Orden guardada!");
                    // $(`#confirm`).modal('show');
                    clean_view();

                    $(`#confirmation`).modal('show');
                    // getElement(`#checkout_number`).value = response.data.number;
                    // getElement(`#cart_tbody`).innerHTML = ``;
                    // $(`#a_confirm-order`).attr(`href`, `/ver-cotizacion/${response.data.order_id}`);

                })
                .catch((error) => {
                    // $(".preloader").fadeOut("slow");
                    let _content = ``;

                    if (!error.response.data.hasOwnProperty('simple_error')) {
                        $.each(error.response.data, function(key, value) {
                            if (key == "identity_document") {
                                $.each(value, function(errores, eror) {
                                    $('#quotation-identity-document-error').append("<li class='error-block'>" + eror + "</li>");
                                });
                            } else if (key == "first_name") {
                                $.each(value, function(errores, eror) {
                                    $('#quotation-fist-name-error').append("<li class='error-block'>" + eror + "</li>");
                                });
                            } else if (key == "last_name") {
                                $.each(value, function(errores, eror) {
                                    $('#quotation-last-name-error').append("<li class='error-block'>" + eror + "</li>");
                                });
                            } else if (key == "email") {
                                $.each(value, function(errores, eror) {
                                    $('#quotation-email-error').append("<li class='error-block'>" + eror + "</li>");
                                });
                            } else if (key == "cel_whatsapp") {
                                $.each(value, function(errores, eror) {
                                    $('#quotation-cel-whatsapp-error').append("<li class='error-block'>" + eror + "</li>");
                                });
                            };

                            // $.each(value, function(errores, eror) {
                            //     _content += `${eror} \n`;
                            // });
                        });
                    } else {
                        _content = error.response.data.message;
                        alert(_content);
                        // normalSwal(`${error.response.data.title}`, `${error.response.data.message}`, `error`);
                    }
                });

        });

    function clean_view(){
        getElement(`#quotation_identity-document`).value = ``;
        getElement(`#quotation_first-name`).value = ``;
        getElement(`#quotation_last-name`).value = ``;
        getElement(`#quotation_email`).value = ``;
        getElement(`#quotation_cel`).value = ``;
        getElement(`#quotation_observation`).value = ``;
    }
})();