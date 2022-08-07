
@extends('template_6.layouts.index')
@section('content')
<main>


	<div class="container margin_60_35">

			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="write_review">
						<h1>Escribe una reseña</h1>
						<form id="review_form">
							<div class="rating_submit">
								<div class="form-group">
								<label class="d-block">Calificación General</label>
								<span class="rating mb-0 group-rating">
									<input type="radio" class="rating-input" id="5_star" name="rating-input" value="5"><label for="5_star" class="rating-star"></label>
									<input type="radio" class="rating-input" id="4_star" name="rating-input" value="4"><label for="4_star" class="rating-star"></label>
									<input type="radio" class="rating-input" id="3_star" name="rating-input" value="3"><label for="3_star" class="rating-star"></label>
									<input type="radio" class="rating-input" id="2_star" name="rating-input" value="2"><label for="2_star" class="rating-star"></label>
									<input type="radio" class="rating-input" id="1_star" name="rating-input" value="1"><label for="1_star" class="rating-star"></label>
								</span>
								<div class="mensaje-error" id="review-point-error"></div>
								</div>
							</div>
							<!-- /rating_submit -->
							<div class="form-group">
								<label>El titulo de tu reseña</label>
								<input class="form-control" id="review_title" type="text" placeholder="Si pudieras decirlo en una oración, ¿qué dirías?">
								<div class="mensaje-error" id="review-title-error"></div>
							</div>
							<div class="form-group">
								<label>Tu reseña</label>
								<textarea class="form-control" id="review_message" style="height: 180px;" placeholder="Escriba su opinión para ayudar a otros a conocer este negocio en línea"></textarea>
								<div class="mensaje-error" id="review-message-error"></div>
							</div>
							<!-- <div class="form-group">
								<label>Agrega tu foto (opcional)</label>
								<div class="fileupload"><input type="file" name="fileupload" accept="image/*"></div>
							</div> -->
							<div class="form-group">
								<div class="checkboxes float-left add_bottom_15 add_top_15">
									<label class="container_check">Estas de acuerdo con enviar este comentario, el cual sera de uso para mostrarlo en nuestra lista o´piniones positivas y sugerencias para resaltar o mejorar nuestro Product y servicio brindado. Gracias por su colaboración.
										<input type="checkbox" name="terms">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</form>
						<a href="#" class="btn_1" id="send_review">Envíar</a>
					</div>
				</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
<!-- Content END-->
@stop
@section('plugins-css')

<!-- SPECIFIC CSS -->
    <link href="/template_6/css/leave_review.css" rel="stylesheet">

@stop
@section('plugins-js')

<script src="/template_6/js/review.js"></script>




@stop
