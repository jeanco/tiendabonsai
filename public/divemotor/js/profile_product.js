(() => {
    $(document).on('click', '.see-youtube-video', function(){
        let _code = $(this)[0].dataset.youtube_code;
        $(`#catalog_youtube-video`).attr('src', `https://www.youtube.com/embed/${_code}`);
    });

    $("#video-modal").on('hide.bs.modal', function () {
        $(`#catalog_youtube-video`).attr('src', ``);
    });

})();