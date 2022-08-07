@extends('template_4.layouts.index')
@section('content')
<main class="bg_gray ">
  <div class="club_background" style="background-image: url('https://dl.dropboxusercontent.com/s/nfgeyx5qxugtqch/img_novios.jpg?dl=0');">
    <div style="background: #0002;">
      <div class="container py-5">
        <div class="text-center text-white py-5">
          <div class="mb-2 font-weight-bold" style="font-size: 3.5rem; line-height: 1.2;">¿Estás planeando<br>tu boda?</div>
          <div class="mb-4" style="font-size: 16px;">Entonces este programa es ideal para ti</div>
          <a href="#" class="btn_1"><b>REGISTRATE</b></a>
        </div>
      </div>
    </div>
  </div>
  <div class="bg_white py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8 text-center">
          <div class="mb-4 font-weight-bold" style="font-size: 2rem; line-height: 1.2;">Club de Novios</div>
          <div class="mb-4" style="font-size: 16px;">
            Tiendas Kamasa te da la Bienvenida a CLUB NOVIOS KAMASA, y te invita a formar parte de este programa que esta creado especialmente para parejas de novios próximos a casarse.<br><br>
            Con Club Novios Kamasa, tus regalos llegaran envueltos con una presentación acorde a esta fecha importante, y sobretodo el traslado hasta el lugar (dentro de Tacna Metropolitana) que nos indiques será completamente gratis, otras ciudades tendrán un recargo según la distancia.<br><br>
            Además según las compras acumuladas, los novios podrán disfrutar de diferentes beneficios y regalos, además ingresan al sorteo anual especial entre todas las parejas inscritas.
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="club_background2" style="background-image: url('https://dl.dropboxusercontent.com/s/beu3cgphot2i4wv/img_novios2.jpg?dl=0');">
    <div style="background: #0005;">
      <div class="container py-5">
        <div class="row justify-content-center mb-5">
          <div class="col-md-8 col-sm-10 py-5 mb-5">
            <div class="mb-5 text-center text-white font-weight-bold" style="font-size: 2.5rem; line-height: 1.2;">INSCRÍBETE EN<br>EL CLUB DE NOVIOS</div>
            <div class="mb-5 text-center text-white" style="font-size: 16px; line-height: 1.2;">
              Para Inscribirte, debes llenar los datos del siguiente formulario de registro, nos pondremos en contacto, podrás agregar todos los productos que desees que te regalen en esta fecha tan importante, además podrás descargar la invitación para enviar a tus invitados vía e-mail, y ellos podrán regalarte los electrodomésticos que han escogido acercándose a Tiendas Kamasa (Av. San Martin 331). Llena el formulario para participar
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg_white marrieage_form">
    <div class="container">
      <div style="position: relative; top: -160px;">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <h3 class="font-weight-bold">Llena el formulario para participar</h3>
                  <div class="row">
                    <div class="col-sm-6">
                    <form id="girlfriend_form">
                      <div class="mb-2" style="color: var(--main-bg-color-primario);">
                        <img src="/images/girlfriend.png" style="width: 15px; height: 22px;">
                        <span class="font-weight-bold" style="font-size: 1.15rem;">Datos de la novia</span>
                      </div>
                      <div class="mb-1 form-group">
                        <div>Nombres y apellidos</div>
                        <input type="text" class="form-control" name="full_name" value="" placeholder="Nombres y apellidos">
                          <div class="mensaje-error" id="girlfriend_full_name-error"></div>
                      </div>
                      <div class="mb-1 form-group">
                        <div>DNI</div>
                        <input type="text" class="form-control" name="identity_document" value="" placeholder="DNI">
                        <div class="mensaje-error" id="girlfriend_identity_document-error"></div>
                      </div>
                      <div class="mb-1 form-group">
                        <div>Celular</div>
                        <input type="text" class="form-control" name="cellphone" value="" placeholder="Celular">
                        <div class="mensaje-error" id="girlfriend_cellphone-error"></div>
                      </div>
                      <div class="mb-1 form-group">
                        <div>Correo</div>
                        <input type="text" class="form-control" name="email" value="" placeholder="Correo">
                        <div class="mensaje-error" id="girlfriend_email-error"></div>
                      </div>
                      <div class="mb-1 form-group">
                        <div>Fecha de nacimiento</div>
                        <input type="date" class="form-control" name="birthday" value="" placeholder="Fecha de nacimiento">
                        <div class="mensaje-error" id="girlfriend_birthday-error"></div>
                      </div>
                      <div class="mb-1 form-group">
                        <div>Dirección</div>
                        <input type="text" class="form-control" name="address" value="" placeholder="Dirección">
                        <div class="mensaje-error" id="girlfriend_address-error"></div>
                      </div>
                    </form>
                    </div>
                    <div class="col-sm-6">
                    <form id="boyfriend_form">
                      <div class="mb-2" style="color: var(--main-bg-color-primario);">
                        <img src="/images/boyfriend.png" style="width: 15px; height: 22px;">
                        <span class="font-weight-bold" style="font-size: 1.15rem;">Datos del novio</span>
                      </div>
                      <div class="mb-1 form-group">
                        <div>Nombres y apellidos</div>
                        <input type="text" class="form-control" name="full_name" value="" placeholder="Nombres y apellidos">
                        <div class="mensaje-error" id="boyfriend_full_name-error"></div>
                      </div>
                      <div class="mb-1 form-group">
                        <div>DNI</div>
                        <input type="text" class="form-control" name="identity_document" value="" placeholder="DNI">
                        <div class="mensaje-error" id="boyfriend_identity_document-error"></div>
                      </div>
                      <div class="mb-1 form-group">
                        <div>Celular</div>
                        <input type="text" class="form-control" name="cellphone" value="" placeholder="Celular">
                        <div class="mensaje-error" id="boyfriend_cellphone-error"></div>

                      </div>
                      <div class="mb-1 form-group">
                        <div>Correo</div>
                        <input type="text" class="form-control" name="email" value="" placeholder="Correo">
                        <div class="mensaje-error" id="boyfriend_email-error"></div>
                      </div>
                      <div class="mb-1 form-group">
                        <div>Fecha de nacimiento</div>
                        <input type="date" class="form-control" name="birthday" value="" placeholder="Fecha de nacimiento">
                        <div class="mensaje-error" id="boyfriend_birthday-error"></div>
                      </div>
                      <div class="mb-1 form-group">
                        <div>Dirección</div>
                        <input type="text" class="form-control" name="address" value="" placeholder="Dirección">
                        <div class="mensaje-error" id="boyfriend_address-error"></div>
                      </div>
                    </form>
                    </div>
                  </div>
                  <hr class="my-3">
                  <form id="club_form">
                  <div class="mb-1 form-group">
                    <div>Dirección del lugar de la boda</div>
                    <input type="text" class="form-control" name="wedding_address" value="" placeholder="Dirección">
                    <div class="mensaje-error" id="wedding_address-error"></div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-6">
                      <div class="mb-1 form-group">
                        <div>Hora de la boda</div>
                        <input type="time" class="form-control" name="wedding_hour" value="" placeholder="Hora">
                        <div class="mensaje-error" id="wedding_hour-error"></div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="mb-1 form-group">
                        <div>Fecha de la boda</div>
                        <input type="date" class="form-control" name="wedding_date" value="" placeholder="Fecha">
                        <div class="mensaje-error" id="wedding_date-error"></div>
                      </div>
                    </div>
                  </div>
                  </form>
                  <div class="text-center mb-3">
                    <a href="#" class="btn_1" id="register"><b>REGISTRARME</b></a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg_white py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8 text-center">
          <div class="mb-2 font-weight-bold" style="font-size: 2rem; line-height: 1.2;">ELLOS YA ESTÁN<br>PARTICIPANDO</div>
          <div class="mb-4" style="font-size: 16px;">
            Inspírate de otros novios y si te gustan contáctanos
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="club_images" class="owl-carousel owl-theme">
    <div class="item"><img src="https://dl.dropboxusercontent.com/s/rorgx9genk8hme1/galery_novio3.jpg?dl=0" alt=""></div>
    <div class="item"><img src="https://dl.dropboxusercontent.com/s/v5ujd2kun40swn0/galery_novio1.jpg?dl=0" alt=""></div>
    <div class="item"><img src="https://dl.dropboxusercontent.com/s/ryutps66xv9xtc7/galery_novio2.jpg?dl=0" alt=""></div>
  </div>
</main>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
<script type="text/javascript" src="/template_4/js/marriage_club.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#club_images').owlCarousel({
        rtl:true,
        loop:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
        }
    });
  });
</script>
@stop
