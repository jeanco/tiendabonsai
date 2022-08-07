

@extends('template_10.layouts.index')
@section('content')

	<main class="bg_gray">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-7">
					<div id="confirm" style="padding: 60px 15px;">
					

				<div class="display-table text-center">
        <div class="display-table-cell">
          <div class="container pt-0 pb-0">
            <div class="row">
              <div class="col-md-12 col-md-offset-2">
                <h1 class="font-weight-600 text-theme-colored2 font-50 mb-0" style="color: #1d509d !important;">Buscar Certificado</h1>
                <form id="certificate_form" action="/resultado-certificados" method="POST" class="newsletter-form mt-0 mb-30 maxwidth500">
                	{{ csrf_field() }}
                  <label for="mce-EMAIL"></label>
                  <div class="input-group">
                    <input type="" name="identity_document" id="certificate_id" data-height="45px" class="form-control input-lg" placeholder="Digite su RUT" name="certificate" value="">
                    <br><br>
                    	<div class="btn_add_to_cartx"><a href="#" class="btn_1" id="certificate__search" style="width: 100%; margin: 10px 0 10px 0; display: inline;    padding: 10px 18px;">Buscar Certificado</a></div>
                  </div>
                </form>
                <br><br>

             

                <p class="font-14">Si no existe su certificado es posible que no este registrado en nuestro sistema.</p>
                <hr>

                <p style="font-style: italic;">*Si deseas solicitar tu certificado deja tus datos para actualizar en el sistema.</p>

                <a href="" style="text-decoration: underline; " data-toggle="modal" data-target="#new_client">Registrarme ahora</a>
              </div>
            </div>
          </div>
        </div>
      </div>


				
						

					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

	</main>
	<!--/main-->

	<div class="modal fade" id="new_client" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="payments_method_title">Actualizar mis datos</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
		  	<div class="row">
		  		<div class="col-md-6">

            <div class="form-group">
              <label class="control-label customer_type-1">Documento de identidad: </label>
              
              <input class="form-control" name="identity_document" id="customer_document" placeholder="Documento">
              <div class="mensaje-error text-error" id="customer-document-error"></div>
            </div>

        
            <div class="form-group customer_type-1">
              <label class="control-label">Nombres: </label>
              <input class="form-control" name="first_name" id="customer_firstname" placeholder="Nombres...">
              <div class="mensaje-error text-error" id="customer-firstname-error"></div>
            </div>

           
        

           
				
			</div>
			<div class="col-md-6">



            <div class="form-group customer_type-1">
              <label class="control-label">Apellidos: </label>
              <input class="form-control" name="last_name" id="customer_lastname" placeholder="Apellidos...">
              <div class="mensaje-error text-error" id="customer-lastname-error"></div>
            </div>

            <div class="form-group">
              <label class="control-label">Celular: </label>
              <input class="form-control" name="email" placeholder="Whatsapp..." id="customer_cel">
              <div class="mensaje-error text-error" id="customer-email-error"></div>
            </div>
         
           
				
			</div>
			<div class="col-md-12">

				<div class="form-group">
              <label class="control-label">Email: </label>
              <input class="form-control" name="email" placeholder="Email..." id="customer_email">
              <div class="mensaje-error text-error" id="customer-email-error"></div>
            </div>
          
            <div class="form-group ">
              <label class="control-label">Especialidad: </label>
              <input class="form-control" name="speciality" id="customer_speciality" placeholder="Ingrese su Especialidad">
              <div class="mensaje-error text-error" id="customer-speciality-error"></div>
            </div>

            <div class="form-group ">
              <label class="control-label">Mensaje: </label>
              <textarea class="form-control" name="message" id="customer_message" placeholder="">
              	
              </textarea>
              <div class="mensaje-error text-error" id="customer-message-error"></div>
            </div>

           
				
			</div>
		  	</div>
		  	
		  </div>
		  <div class="modal-footer text-center">

		  	<div class="btn_add_to_cartx text-center"><a href="#" class="btn_1" id="save_customer" style="width: 100%; margin: 10px 0 10px 0; display: inline;    padding: 10px 18px;">Registrarme</a></div>
		  	
		  </div>
		</div>
	  </div>
	</div>

@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_10/css/checkout.css" rel="stylesheet">


@stop
@section('plugins-js')
	<script type="text/javascript">
		document.querySelector(`#certificate__search`)
			.addEventListener(`click`, (E) => {
				E.preventDefault();

				if (document.querySelector(`#certificate_id`).value) {
					axios.get(`/api/template_10/search-certificates?indentity_document=${document.querySelector(`#certificate_id`).value}`)
						.then((response) => {
							$(`#certificate_form`).submit();
						})
						.catch((err) => {
							normalSwal(err.response.data.title, err.response.data.message, 'warning');
						});	
				}

	
			});

			$("#save_customer").click(function() {
			var dni = $('#customer_document').val();
			var first_name = $('#customer_firstname').val();
			var last_name =   $("#customer_lastname").val();
			var cel =   $("#customer_cel").val();
			var email =$("#customer_email").val();
			var speciality = $("#customer_speciality").val(); //configurar documento
			var message =  $("#customer_message").val();


		

			 axios.post(`/api/template_10/register_customer`, {
                'dni': dni,
                'first_name': first_name,
                'last_name': last_name,
                'email': email,
                'cel': cel,
                'speciality': speciality,
                'message': message,
            })
            .then((risposta) => {
            	$("#new_client").modal("hide");
            	//alert(risposta.data);
            	if (risposta.data == true) {
            		alert('Gracias por registrarte, tus datos ya fueron actualizados.');
            	}else{
            		alert('usted ya se encuentra registrado.');
            	}
                
                
                
            })
            .catch((error) => {
            	$("#new_client").modal("hide");
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



	</script>

@stop



