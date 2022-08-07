@extends('template_14.layouts.index')
@section('content')
<main class="">
  {{--<div class="featured lazy" data-bg="url(https://dl.dropboxusercontent.com/s/mkpd6vpgvy8eusd/img_soporte.jpg?dl=0)">
      <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
          <div class="row justify-content-center justify-content-md-start">
            <div class="col-lg-6 wow" data-wow-offset="150">
              <h3>Soporte</h3>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="bg_white py-5">
    <div class="container">
      <div class="font-weight-bold text-uppercase mb-4" style="color: var(--main-bg-color-secundario); font-size: 18px;">SOPORTE TÉCNICO {{$company_main->name_company}}</div>
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
            En Tiendas Kamasa nuestros productos cuentan con garantía y soporte técnico por 1 año el cual es otorgado por el fabricante según sus condiciones, después de transcurrido este tiempo, nosotros te asesoramos sobre la reparación de tu producto y te brindamos los costos. El periodo de garantía puede varias según el producto y sus características.<br><br>
            <b>Beneficios del Soporte Técnico:</b>
            <ul>
              <li>Sin costo</li>
              <li>Atención en menos de 48 horas</li>
              <li>Te asesoramos en todo</li>
            </ul>
            La atención de servicio técnico se realiza en el domicilio del cliente, a excepción de pequeños electrodomésticos como licuadoras, extractoras, planchas, etc; y de televisores.<br><br>
            El técnico realiza la atención en el domicilio u oficina de los siguientes productos: Lavadoras, Lavasecas, Secadoras, Refrigeradoras, Exhibidoras, Congeladoras, Cocinas, Campanas extractoras, termas.<br><br>
            Solicita atención para servicio técnico comunicándote con nosotros o si lo prefieres, puedes gestionar la garantía directamente con la marca. En ambos casos es gratuito por el periodo de 1 año.
          </div>
        </div>
        <div class="col-md-5 text-center">
          <img src="https://dl.dropboxusercontent.com/s/pbfhlhp8ndv4oq2/img_soporte_man.png?dl=0" style="max-width: 100%;">
        </div>
      </div>
    </div>
  </div>
  <div class="bg_white py-5" id="preguntas">
    <div class="container">
      <div class="font-weight-bold text-center mb-4" style="color: var(--main-bg-color-secundario); font-size: 18px;">COMUNÍCATE CON LA MARCA DE TU PRODUCTO</div>
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-4" style="font-size: 16px; line-height: 1.2;">
          Comunícate al Call center de la marca para solicitar servicio técnico y la reparación de tu producto. Siempre con tu comprobante de pago a la mano y datos como teléfono y dirección donde se encuentra tu electrodoméstico.
        </div>
      </div>
      <div class="row mb-2 justify-content-center">
        <div class="col-lg-11 mb-5 text-center" >
          <div class="row align-items-center justify-content-center">
            <div class="col-md-auto p-3"><a href="javascript:void(0);"><img src="https://dl.dropboxusercontent.com/s/e5nc9jq2a36mff1/LG.png?dl=0" title="LG" height="50px" class="client"></a></div>
            <div class="col-md-auto p-3"><a href="javascript:void(0);"><img src="https://dl.dropboxusercontent.com/s/zvg8897hx81izyq/ELECTROLUX.png?dl=0" title="Electrolux" height="50px" class="client"></a></div>
            <div class="col-md-auto p-3"><a href="javascript:void(0);"><img src="https://dl.dropboxusercontent.com/s/71m0lfxuehbc4qb/DAEWOO.png?dl=0" title="Daewo" height="50px" class="client"></a></div>
            <div class="col-md-auto p-3"><a href="javascript:void(0);"><img src="https://dl.dropboxusercontent.com/s/eo0e09axgz9pbdj/SOLE.png?dl=0" title="Sole" height="50px" class="client"></a></div>
            <div class="col-md-auto p-3"><a href="javascript:void(0);"><img src="https://dl.dropboxusercontent.com/s/z5rniaxvptys83r/INDURAMA.png?dl=0" title="Indurama" height="50px" class="client"></a></div>
            <div class="col-md-auto p-3"><a href="javascript:void(0);"><img src="https://dl.dropboxusercontent.com/s/rlgxv24abmh2d63/logo_mabe.jpg?dl=0" title="Mabe" height="50px" class="client"></a></div>
            <div class="col-md-auto p-3"><a href="javascript:void(0);"><img src="https://dl.dropboxusercontent.com/s/n3f4zcj67w4dmea/Oster.jpg?dl=0" title="Oster" height="50px" class="client"></a></div>
            <div class="col-md-auto p-3"><a href="javascript:void(0);"><img src="https://dl.dropboxusercontent.com/s/f5mw7xqs85na6h8/Ilumi.png?dl=0" title="Ilumi" height="50px" class="client"></a></div>
            <div class="col-md-auto p-3"><a href="javascript:void(0);"><img src="https://dl.dropboxusercontent.com/s/3dns7x9qvfh8n86/IKA.png?dl=0" title="Ika" height="50px" class="client"></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row m-0">
    <div class="col-md-6 text-white p-5" style="background: var(--main-bg-color-cuarto);">
      <div class="font-weight-bold mb-4" style="font-size: 2.5rem;">COMUNÍCATE CON NOSOTROS</div>
      <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
        <ul>
          <li>Llámanos con confianza al teléfono 052-427894 en el horario de lunes a viernes de 10 am a 1pm y de 4 pm a 7pm.</li>
          <li>Puedes enviarnos un correo a <u>atencionalcliente@kamasa.pe</u></li>
          <li>Acércate a nuestro módulo de atención en: Av. San Martín 331 - Tacna</li>
        </ul>
      </div>
    </div>
    <div class="col-md-6 text-white p-5" style="background: var(--main-bg-color-secundario);">
      <div class="font-weight-bold mb-4" style="font-size: 2.5rem;">SERVICIO TÉCNICO EXCLUSIVO</div>
      <div class="text-justify" style="font-size: 16px; line-height: 1.2;">
        Si tu producto requiere atención de servicio técnico, nosotros te brindamos un electrodoméstico temporal para que no tengas inconvenientes en tu rutina diaria mientras solucionan el problema con tu producto.
        Incluye la entrega y retiro de producto.
        Se debe adquirir al comprar tu electrodoméstico, y tiene una vigencia de 1 año. El costo es de S/ 49.90
      </div>
    </div>
  </div>--}}
  <div class="bg_white py-5">
    <div class="container">
      <div class="text-center mb-3" style="font-size: 2rem; color: var(--main-bg-color-secundario);">En {{$company_main->name_company}} respondemos a todas tus preguntas.</div>
      <div class="accordion" id="quest_area">
        <div class="p-3" style="border-bottom: 1px solid #000;">
          <a href="javascript:void(0);" class="font-weight-bold" data-toggle="collapse" data-target="#quest_1" style="font-size: 16px;">1. ¿Cómo compras en {{$company_main->name_company}}?</a>
          <div id="quest_1" class="collapse pt-3" aria-labelledby="headingTwo" data-parent="#quest_area">
            Ingresar al catálogo de productos, debes agregar al carrito, llenar el formulario con tus datos para realizar tu pedido.
          </div>
        </div>
        <div class="p-3" style="border-bottom: 1px solid #000;">
          <a href="javascript:void(0);" class="font-weight-bold" data-toggle="collapse" data-target="#quest_2" style="font-size: 16px;">2. ¿Qué productos encontrarás en {{$company_main->name_company}}?</a>
          <div id="quest_2" class="collapse pt-3" aria-labelledby="headingTwo" data-parent="#quest_area">
            {{$company_main->name_company}}, es una empresa dedicada a la comercialización y venta directa de electrodomésticos y artículos para el hogar , tales como refrigeradoras, lavadoras, cocinas, televisores , colchones , camas , juegos de salas , juegos de comedor , dormitorios y más .
          </div>
        </div>
        <div class="p-3" style="border-bottom: 1px solid #000;">
          <a href="javascript:void(0);" class="font-weight-bold" data-toggle="collapse" data-target="#quest_3" style="font-size: 16px;">3. ¿A qué lugares se hace envios?</a>
          <div id="quest_3" class="collapse pt-3" aria-labelledby="headingTwo" data-parent="#quest_area">
            En todo Puno . (Sujeto a coberturas de Zonas. )
          </div>
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
