(() => {

    // getElement(`#profile_image`)
    //     .addEventListener(`change`, () => {
    //         get_base_64($(`#profile_image-base-64`));
    //     });

    getElement(`#profile__update`)
        .addEventListener(`click`, () => {

            if ($('#profile_image')[0].files[0]) {
                get_base_64($('#profile_image'));
            } else {
                $('#profile_image').attr('data-base64', '')
            }

            $(".preloader").fadeIn("slow");
            setTimeout(function(){
                axios.put(`/dive-perfil/${getElement(`#profile_id`).value}`, {
                    'image_base_64': $('#profile_image').attr('data-base64'),
                    'first_name': getElement(`#profile_first-name`).value,
                    'last_name': getElement(`#profile_last-name`).value,
                    'email': getElement(`#profile_email`).value,
                    'cel': getElement(`#profile_cel`).value,
                    'city_id': getElement(`#profile_city`).value,
                    'address': getElement(`#profile_address`).value,
                })
                .then((risposta) => {

                    $(".preloader").fadeOut("slow");
                    alert('Se ha actualizado los datos');

                });
            }, 1000);


        })
})();