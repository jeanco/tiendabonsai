(() => {

    $(`#product__watch-video`).on(`click`, function(){
        let _code = $(this)[0].dataset.video_code;
        $(`#product-perfil_video`).attr('src', `https://www.youtube.com/embed/${_code}`);
    });

    $("#car-details").on('hide.bs.modal', function () {
        $(`#product-perfil_video`).attr('src', ``);
    });
})();