@extends('template_12.layouts.index')
@section('content')
<main class="font-template">
  <div class="top_banner general">
			<div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-6 text-center">
							<div class="text-white font-weight-bold mb-4" style="font-size: 3.5rem; line-height: 1;">{{ $company_main->business_name }}<br>está a tu servicio</div>
							<div class="text-white" style="font-size: 16px; line-height: 1.2;">
                {{--Brindando gran variedad de productos de las mejores marcas a los mejores precios, como son: LG, Daewo, Indurama, Electrolux, Samsung, Sony, Philips, entre otros.--}}
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="/template_12/img/servicio_tecnico.jpg" class="img-fluid" alt="" style="">
	</div>
  <div class="bg_white">
    <div class="container py-5">
      <!-- Servicio 1 -->
      {{--@foreach($services as $service)--}}

      <div class="row justify-content-between">
        <div class="col-md-5">
          <div class="font-weight-bold mb-2" style="color: var(--main-bg-color-primario); font-size: 25px; line-height: 1.2;">
            {{ isset( $services[0]->name) ? $services[0]->name:  ''  }}
          </div>
          <img src="{{ isset( $services[0]->image) ? $services[0]->image:  ''  }}" alt="" style="max-height: 200px;">
        </div>
        <div class="col-md-6">
          <div style="font-size: 16px; line-height: 1.2;">
            {!! isset( $services[0]->description) ? $services[0]->description:  ''  !!}
          </div>
        </div>
      </div>
      <hr class="my-4" style="color: #cdcdcd;">

      {{--@endforeach--}}
      

      <!-- Servicio 2 -->
      {{--<div class="row justify-content-between">
        <div class="col-md-5">
          <div class="font-weight-bold mb-2" style="color: var(--main-bg-color-primario); font-size: 25px; line-height: 1.2;">
            INSTALACIÓN DE PRODUCTOS
          </div>
          <img src="https://dl.dropboxusercontent.com/s/k2qwebyo89of6x9/1527176883-1527176883.png?dl=0" alt="" style="max-height: 200px;">
        </div>
        <div class="col-md-6">
          <div style="font-size: 16px; line-height: 1.2;">
            Realizamos la instalación de tus productos adquiridos:<br><br>
            <ul>
              <li>Cocinas y hornos empotrables</li>
              <li>Campanas extractoras</li>
              <li>Lavadoras</li>
              <li>Secadoras</li>
              <li>Lavasecas</li>
              <li>Refrigeradoras Side by Side</li>
              <li>Aire acondicionado</li>
              <li>Televisores</li>
            </ul>
            <span style="color: #dc3545;">*Consulta por el servicio de instalación gratuito por la compra de productos seleccionados.</span><br><br>
            <span class="font-weight-bold" style="font-size: 16px;">BENEFICIOS DE LA INSTALACIÓN DE PRODUCTOS:</span><br><br>
            <ul>
              <li>ECONOMICO, GARANTIZADO Y SIN SORPRESAS: Hasta 3 veces más eficiente que otras empresas.</li>
            </ul>
          </div>
        </div>
      </div>
      <hr class="my-4" style="color: #cdcdcd;">
      <!-- Servicio 3 -->
      <div class="row justify-content-between">
        <div class="col-md-5">
          <div class="font-weight-bold mb-2" style="color: var(--main-bg-color-primario); font-size: 25px; line-height: 1.2;">
            ATENCIÓN DE LICITACIONES (COTIZACIONES)
          </div>
          <img src="https://dl.dropboxusercontent.com/s/7np3lh3fr11p2ta/1527177012-1527177012.png?dl=0" alt="" style="max-height: 200px;">
        </div>
        <div class="col-md-6">
          <div style="font-size: 16px; line-height: 1.2;">
            Atendemos tus solicitudes de cotización con las especificaciones técnicas que requieren, tenemos una amplia cartera de productos.<br><br>
            Contamos con experiencia y capacidad para desarrollar un servicio completo de internamiento de ...
          </div>
          <div class="mt-3"><a href="/contacto" class="btn_1">Contáctanos</a></div>
        </div>
      </div>
      <hr class="my-4" style="color: #cdcdcd;">
      <!-- Servicio 4 -->
      <div class="row justify-content-between">
        <div class="col-md-5">
          <div class="font-weight-bold mb-2" style="color: var(--main-bg-color-primario); font-size: 25px; line-height: 1.2;">
            KAMASA EMPRESAS
          </div>
          <img src="https://dl.dropboxusercontent.com/s/7np3lh3fr11p2ta/1527177012-1527177012.png?dl=0" alt="" style="max-height: 200px;">
        </div>
        <div class="col-md-6">
          <div style="font-size: 16px; line-height: 1.2;">
            Kamasa Empresas es exclusivo para el mercado empresarial, para atender a empresas como hoteles, restaurantes, oficinas, clínicas, colegios, instituciones que organizan rifas y sorteos, empresas que premian y brindan incentivos a sus trabajadores.<br><br>
            Kamasa Empresas ofrece, además de las mejores condiciones comerciales, un conjunto de servicios de soporte, complementarios y exclusivos para sus clientes:<br><br>
            <ul>
              <li>Te asesoramos</li>
              <li>Atención personalizada.</li>
              <li>Contamos con productos de uso comercial y semi industrial</li>
              <li>Condiciones comerciales exclusivas.</li>
              <li>Transporte y entregas en el almacén del cliente</li>
              <li>Incluimos la puesta en marcha de tus electrodomésticos, extensiones de garantía, mantenimiento de los mismos.</li>
              <li>Crédito a 7 y 15 días para</li>
              <li>Si necesita solicitar un presupuesto o ampliar información sobre el servicio no dude en contactar con nosotros.</li>
              <li>Un gestor comercial diseñará su presupuesto y atenderá sus pedidos.</li>
            </ul>
          </div>
        </div>
      </div>--}}

    </div>
  </div>
</main>
@stop
@section('plugins-css')
@stop
@section('plugins-js')
@stop
