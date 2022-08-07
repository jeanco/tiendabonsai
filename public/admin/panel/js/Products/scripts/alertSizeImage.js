 function alertSizeImage()
{
	setTimeout(function(){
		var imgElement = $('#product-promotion-preview-image img')[0];
		var imgWidth = imgElement.naturalWidth;
		var imgHeight = imgElement.naturalHeight;
		console.log(imgWidth, imgHeight);
		if (imgWidth == 1300 && imgHeight == 300 ) {
			//Nothing
		}
		else {
			swal('La imagen no posee las dimensiones indicadas 1300x300.');
			$('#product-promotion-preview-image').empty();

			$('#product-promotion-label-add-image').remove();

			var _labelAddImage =               '<label id="product-promotion-label-add-image">'+
																'<i class="glyphicon glyphicon-picture"></i>'+
																'<span class="u-ml3">Añadir Foto:</span>'+
														  '</label>';
			$('#product-promotion-image-area').prepend(_labelAddImage);

		}
	},300);
}
