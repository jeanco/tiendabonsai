@extends('template_2.layouts.index')
@section('content')
<main class="font-template">
  <div class="top_banner general" style="height: 230px;">
			<div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.46)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-6 text-center">
							<div class="text-white font-weight-bold mb-4" style="font-size: 3.5rem; line-height: 1;">Normativa</div>
							<div class="text-white" style="font-size: 16px; line-height: 1.2;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="{{ isset( $gallery_company[2]->resource) ? $gallery_company[2]->resource:  ''  }}" class="img-fluid" alt="" style="height: 100%;">
	</div>
  <div class="bg_white" >
    <div class="container py-5">
      <!-- Servicio 1 -->
      <div class="row">
      	<div class="col-md-12">
         
          
        </div>
      	
      </div>
      <div class="row justify-content-between">
    <div class="col-md-4 text-center">
          <a href="#"><img src="https://dl.dropboxusercontent.com/s/jxef96nnbrat1ag/LEY%20DE%20PROTECCION%20ANIMAL%2030407.jpg?dl=0" alt="" style="  width: 100%;  padding: 15px;"></a>
          
          
        </div>
        <div class="col-md-8" style="text-align: justify;">
          <h3 class="font-weight-bold  " style="color: #9658a5; !important"> LEY Nº30407</h3>
         	<h6>“Ley de protección y bienestar animal; entro en vigencia 9 de Enero 2016” <br>Ley tiene por finalidad </h6>
          <p style="text-align: justify;">- Garantizar el bienestar y proteger la vida de todas las especies de animales vertebrados domésticos o silvestres mantenidos en cautiverio.<br>- Impedir el maltrato y la crueldad causado por el ser humano que pueda ocasionarles sufrimiento innecesario, lesión o muerte.<br>
Para este efecto establece diversas disposiciones, prohibiciones y obligaciones. </p>
          
          <span>Descárgalo:</span>
          <a href="https://busquedas.elperuano.pe/normaslegales/ley-de-proteccion-y-bienestar-animal-ley-n-30407-1331474-1/" target="_blank">Descargar</a>
        </div>
              </div>


    </div>


     <div class="container py-5">
      <!-- Servicio 1 -->
      <div class="row">
        <div class="col-md-12 text-center">
         
          
        </div>
        
      </div>
      <div class="row justify-content-between">
    <div class="col-md-4 text-center">
          <a href="#"><img src="https://dl.dropboxusercontent.com/s/zizncqb1lh3mosu/COLEGIO%20MEDICO%20VETERINARIO.png?dl=0" alt="" style="  width: 70%;      padding: 15px;"></a>
          
          
        </div>
        <div class="col-md-8">
          <h3 class="font-weight-bold" style="color: #9658a5  !important; text-align: justify;">Colegio Médico Veterinario</h3>
          <p style="text-align: justify;">Colegio médico de veterinarios Perú es la institución encargada de otorgar la colegiatura y habilitación del médico veterinario con título expedido o revalidado conforme a lo dispuesto por las leyes vigentes que norman el ejercicio de la Medicina Veterinaria en el país, la cual nos permite ejercer a nivel nacional, así también es la única institución que emite los certificados oficiales  de Salud y vacunación. <br>
Dentro de las funciones y obligaciones del médico veterinario y el CMVP están la promoción y protección de la salud, salud pública  y bienestar animal, la mejora de y conservación de los recursos naturales, flora, fauna, producción animal y medio ambiente.<br>
Los clientes pueden encontrar un respaldo por medio del colegio médico veterinario y otras instituciones, frente a personas que ejerzan la profesión (suplantando al médico veterinario)  </p>
          
          <span>Descárgalo:</span>
          <a href="https://cmvl.pe/wp-content/uploads/2020/07/09-CODIGO-DEONTOLOGICO.pdf" target="_blank">Descargar</a>
        </div>
              </div>


    </div>



     <div class="container py-5">
      <!-- Servicio 1 -->
      <div class="row">
        <div class="col-md-12 text-center">
        
          
        </div>
        
      </div>
      <div class="row justify-content-between">
    <div class="col-md-4 text-center">
          <a href="#"><img src="data:image/png;base64,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" alt="" style="  width: 100%;    padding: 15px;"></a>
          
          
        </div>
        <div class="col-md-8">
           <h3 class="font-weight-bold " style="color: #9658a5 !important; ">SENASA</h3>
          <p style="text-align: justify;">El Servicio Nacional de Sanidad Agraria, es la institución encargada de velar por la calidad agroalimentario e inocuidad, entre sus funciones esta otorgar el permiso de salida de los animales así como también verificar si los animales que ingresan cumplen con los requisitos (evitar proliferación de plagas y enfermedades) <br>
Los requisitos para Tramitar la salida de las mascotas, dependerán del país de destino, ya que cada uno tiene normas y protocolos diferentes, los cuales deberán ser tramitados con meses de anticipación. <br>
Los certificados que emite el Médico Veterinario para la salida de las mascotas son los:
<br><br>
    - Certificados de Salud <br>
    - Certificado de vacunación ( Emitido mínimo con 1 mes de anticipación ) </p>
          
          <span>Descárgalo:</span>
          <a href="http://www.senasa.gob.pe/senasacontigo/ /" target="_blank">Descargar</a>
        </div>
              </div>


    </div>
  </div>
</main>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
