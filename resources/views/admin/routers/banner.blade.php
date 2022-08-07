<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Plataforma | {{ App\Company::first()->name_company }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> {{-- Select2 --}}
  <link href="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet"> {{-- Dropzone --}}
  <link href="{{ URL::asset('admin/plugins/dropzone/dropzone.css') }}" rel="stylesheet"> {{-- Sweet Alert --}}
  <link href="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet"> {{-- growl alert --}}
  <link href="{{ URL::asset('admin/plugins/growl/jquery.growl.css') }}" rel="stylesheet"> {{-- Owl Carousel --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/assets/owl.carousel.min.css" rel="stylesheet"> {{-- Swiper --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css"> {{-- Slick carousel --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" /> {{-- Bootstrap --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet"> {{-- Bootstrap Toggle --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> {{-- Datatables style --}}
  <link href="http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet"> {{-- Estilos del carousel --}}
  {{-- Summernote Style --}}
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote.css') }}">
  {{-- Select2 --}}
  <link href="{{ URL::asset('admin/plugins/select2/select2-last.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.0/css/all.css">
  <style>
    .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
      }
      .text-white{color: #fff;}
      .banner-title{color: #fff; text-align: center; font-size: 22px; font-weight: bold;}
      .title-content{text-align: center; font-size: 19px; font-weight: bold;}
  </style>
  {{-- Estilos generales --}}
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/panel/css/custom-app.css') }}" /> @yield('styles')
  <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
</head>
<body style="background-color: #fff;">

  <br>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="background-color: #c9c9c9; padding: 0px;">
      <!-- Encabezado -->
      <div style="background-color: #339e89; padding: 20px 0px;">
        <table width="100%">
          <tr>
            <td class="text-center" width="40%"><img src="images/logonoveltie.png" style="width: 200px;"></td>
            <td class="banner-title">Gracias por Confiar en<br>nuestro servicio</td>
          </tr>
        </table>
      </div>
      <!-- Contenido -->
      <div style="padding: 15px;">
        <div class="title-content">Informe de Pedido</div><br>
        <div class="text-center">Su pedido se ha registrado como pendiente,<br>la fecha de entrega es el 2019-11-20 (año/mes/dia).</div><br>
        <div class="text-center"><a href="/documento" class="btn btn-primary btn-lg">Ver detalle del pedido</a></div><br>
        <div class="title-content">La orden:</div><br>
        <table width="100%">
          <thead>
            <tr style="border-bottom: 1px solid black;">
              <th style="padding: 0px 0px 9px 0px;">Compañía</th>
              <th style="padding: 0px 0px 9px 0px;">Producto</th>
              <th class="text-right" style="padding: 0px 0px 9px 0px;">Cantidad</th>
              <th class="text-right" style="padding: 0px 0px 9px 0px;">P. Unitario</th>
              <th class="text-right" style="padding: 0px 0px 9px 0px;">Descuento</th>
              <th class="text-right" style="padding: 0px 0px 9px 0px;">P. Total</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid black;">
              <td rowspan="3" style="padding: 5px 0px;">Toyota Peru</td>
              <td style="padding: 5px 0px;">Filtro de aire de Cabina</td>
              <td class="text-right" style="padding: 5px 0px;">1</td>
              <td class="text-right" style="padding: 5px 0px;">165.00</td>
              <td class="text-right" style="padding: 5px 0px;">0.00</td>
              <td class="text-right" style="padding: 5px 0px;">165.00</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 5px 0px;">Filtro de aceite del Motor</td>
              <td class="text-right" style="padding: 5px 0px;">3</td>
              <td class="text-right" style="padding: 5px 0px;">17.00</td>
              <td class="text-right" style="padding: 5px 0px;">0.00</td>
              <td class="text-right" style="padding: 5px 0px;">51.00</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
              <td class="text-right" colspan="4" style="padding: 5px 0px;"><b>Total:</b></td>
              <td class="text-right" style="padding: 5px 0px;">216.00</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
              <td rowspan="4" style="padding: 5px 0px;">ASUS Tek Peru</td>
              <td style="padding: 5px 0px;">LICUADORA BOSCH</td>
              <td class="text-right" style="padding: 5px 0px;">2</td>
              <td class="text-right" style="padding: 5px 0px;">50.00</td>
              <td class="text-right" style="padding: 5px 0px;">0.00</td>
              <td class="text-right" style="padding: 5px 0px;">100.00</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 5px 0px;">PLANCHA A VAPOR IMACO </td>
              <td class="text-right" style="padding: 5px 0px;">1</td>
              <td class="text-right" style="padding: 5px 0px;">50.00</td>
              <td class="text-right" style="padding: 5px 0px;">0.00</td>
              <td class="text-right" style="padding: 5px 0px;">50.00</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 5px 0px;">EXTRACTOR PHILIPS</td>
              <td class="text-right" style="padding: 5px 0px;">1</td>
              <td class="text-right" style="padding: 5px 0px;">110.00</td>
              <td class="text-right" style="padding: 5px 0px;">0.00</td>
              <td class="text-right" style="padding: 5px 0px;">110.00</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
              <td class="text-right" colspan="4" style="padding: 5px 0px;"><b>Total:</b></td>
              <td class="text-right" style="padding: 5px 0px;">260.00</td>
            </tr>
            <!-- /////////////////////Totales/////////////////// -->
            <tr style="border-bottom: 1px solid black; border-top: 3px solid black;">
              <td class="text-right" colspan="3" style="padding: 5px 0px;"><b>CANTIDAD TOTAL:</b></td>
              <td class="text-right" style="padding: 5px 0px;">8</td>
              <td class="text-right" style="padding: 5px 0px;"><b>SUB TOTAL:</b></td>
              <td class="text-right" style="padding: 5px 0px;">476.00</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
              <td class="text-right" colspan="5" style="padding: 5px 0px;"><b>DESCUENTO:</b></td>
              <td class="text-right" style="padding: 5px 0px;">00.00</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
              <td class="text-right" colspan="5" style="padding: 5px 0px;"><b>TOTAL:</b></td>
              <td class="text-right" style="padding: 5px 0px;">476.00</td>
            </tr>
          </tbody>
        </table>
        <div class="text-center" style="font-size: 11px; padding: 40px 0px;">Gracias por confiar en nuestra empresa.</div>
        <div class="text-center">
          <a href="#" class="btn btn-primary"><i class="fab fa-facebook fa-2x"></i></a>
          <a href="#" class="btn btn-primary"><i class="fab fa-twitter-square fa-2x"></i></a>
        </div>
      </div>
      <!-- Pie de banner -->
      <div class="text-center text-white" style="background-color: #339e89; padding: 20px 0px;">
        Tu plataforma web - Todos los derechos reservados - Tacna - Perú
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.responsive-tabs/1.6.0/jquery.responsiveTabs.min.js">
  </script>
  {{-- Sweet alert --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/sweet-alert/sweetalert.min.js') }}"></script>
  {{-- Bootstrap --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  {{-- Owl Carousel --}} {{--
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/owl.carousel.min.js"></script> --}} {{-- Bootstrap Toggle --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  {{--Datatable js--}}
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
  {{-- growl alert --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/growl/jquery.growl.js') }}"></script>
  {{-- Select2 --}}
  {{-- <script type="text/javascript" src="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script> --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/select2/select2-last.min.js') }}"></script>
  {{-- Swiper --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
  {{-- Slick carousel --}}
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  {{-- Dropzone --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/dropzone/dropzone.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Dropzone/my-dropzone.js') }}"></script>
  {{-- Jquery BlockUI --}}
  <script type="text/javascript" src="https://malsup.github.io/jquery.blockUI.js"></script>
  {{-- Users --}}
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/actions.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/userProfileEdit.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Users/scripts/userProfileSave.js') }}"></script>
  {{-- Summernote js --}}
  <script src="{{asset('admin/plugins/summernote/summernote.js')}}"></script>
  <script src="{{asset('admin/plugins/summernote/summernote-es-ES.min.js')}}"></script>
  {{-- Moment.js --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/moment/moment.js') }}"></script>
  {{-- Axios --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/axios/axios.js') }}"></script>
  {{-- Custom functions --}}
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/base.js') }}"></script>
  {{-- Scripts to delete --}}
  {{-- Funciones generales --}}
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/custom-app.js') }}"></script>
  {{-- new general functions --}}
  {{-- <script type="text/javascript" src="{{ URL::asset('admin/panel/js/Base/index.js') }}"></script> --}}
  {{-- Ajax --}}
  <script type="text/javascript" src="{{ URL::asset('admin/panel/js/ajax.js') }}"></script>
  @yield('scripts')
  <script src="{{asset('admin/js/owl.carousel.js')}}"></script>
  <script src="{{asset('admin/js/main.js')}}"></script>
</body>
</html>
