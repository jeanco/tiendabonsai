(() => {
        $(document).ready(function(){

            getMessages();
            //variable = contador_x();
            // setInterval(function(){ getMessages();
            //     console.log('ok');
            //  }, 10000);
        });

        function getMessages (){

            // URLactual = window.location.pathname;
            // userInfo = {
            //     URLactual: URLactual,
            //     enemy: 'Moriarty'
            // }
            axios.get(`/api/template_14/messages-data/${$(`#post_id`).val()}`)
            .then((risposta) => {
                loadMessages(risposta.data);
            })
        }
    

     (function(global) {
        global.id_respondiendo = 0;
        }(this)
    );

     const getElement = (element) => {
        return document.querySelector(element);
      };

    function loadMessages(messages){
        var _content  = '';
        var _subContent = '';
        $('#comments_section').empty();

        $.each(messages,function(i,data){

            _subContent = "";

            data.replies.forEach((value) => {
                _subContent += `
                                <li>
                                    <div class="avatar"><a href="javascript:void(0)"><img src="/template_14/img/avatar2.jpg" alt=""></a></div>
                                    <div class="comment_right clearfix">
                                        <div class="comment_info">
                                            <a href="blog-post.html#">${value.user.customer.first_name} ${value.user.customer.last_name}</a><span>|</span>${moment(value.created_at, 'YYYY-MM-DD').format('DD/MM/YYYY')}<span>|</span>
                                        </div>
                                        <p>
                                            ${value.message}
                                        </p>
                                        <div class="text-right mb-2" style="display:none;">
                                            <button type="button" name="" class="btn"><i class="fas fa-reply"></i> Responder</button>
                                        </div>
                                    </div>
                                </li>`;
            });

            _content += `
                            <li>
                                    <div class="avatar"><a href="javascript:void(0);"><img src="/template_14/img/avatar1.jpg" alt=""></a></div>
                                    <div class="comment_right clearfix">
                                        <div class="comment_info">
                                            <a href="javascript:void(0);">${data.user.customer.first_name} ${data.user.customer.last_name}</a><span>|</span>${moment(data.created_at, 'YYYY-MM-DD').format('DD/MM/YYYY')}<span>|</span>
                                        </div>
                                        <p>
                                            ${data.message}
                                        </p>
                                        <div class="text-right mb-2">
                                            <button type="button" data-index=${data.id} name="" class="btn reply_to"><i class="fas fa-reply"></i> Responder</button>
                                        </div>
                                    </div>
                                    <ul class="replied-to">
                                        ${_subContent}
                                    </ul>
                            </li>`;


        });

        $('#comments_section').append(_content);
    }


    $(document).on('click', '.reply_to', function(){
        $(`#replying_to`).val($(this)[0].dataset.index);
    });



    getElement(`#message_send`)
        .addEventListener(`click`, (e) => {

            if (!$(`#comments2`).val()) {
                $.growl.warning({ title: 'Advertencia' , message: 'Debe escribir un mensaje!' });
                return;
            }

            //console.log("dadqwa");
            axios.post(`/api/template_14/register-blog-message`, {
                    'categories_id': getElement(`#post_id`).value,
                    'message': $('#comments2').val(),
                    'root': $(`#replying_to`).val(),
                })
                .then((response) => {
                    $.growl.notice({ title: response.data.title , message: response.data.message });
                    getMessages();
                    $('#comments2').val('');
                })
                .catch((error) => {              

                });
        });

        /*getElement(`.response_user`)
        .addEventListener(`click`, (e) => {
            e.preventDefault();
            
        });*/

         // $(document).on('click', '.response_user', function(){

         //    id_respondiendo= $(this).data("id");
         //    //alert(id);
         //    posicion_boton = $("#top_").offset().top;
         //    $("html, body").animate({scrollTop:posicion_boton+"px"});
         //    $.growl.warning({ title:'Comentarios' , message: "Responda su comentario Aquí. Gracias!" })
         // });


         //  $(document).on('click', '#reload', function(){
         //    getMessages();
         // });
})();

