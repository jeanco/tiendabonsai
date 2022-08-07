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
  </style>
  {{-- Estilos generales --}}
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/panel/css/custom-app.css') }}" /> @yield('styles')
  <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
</head>
<body style="background-color: #fff;">
  <br>
  <div style="margin: 0px 50px;">
    <table width="100%">
      <tr>
        <td width="40%">
          <center><img src="{{ $company['logotype_thumb'] }}" style="width: 100px;"></center>
          <span><b>{{ $company['name_company'] }}</b></span><br>
          <span>{{ $company['email'] }}</span><br>
          <span>{{ $company['cel'] }}</span>
        </td>
        <td width="20%"></td>
        <td width="40%" style="border: 3px solid #000;">
          <center>
            <span><b>PEDIDO</b></span><br>
            <span><b>{{ $company['ruc'] }}</b></span><br>
            @php
              $length_of_id = strlen($order['id']);
              $how_many_zeros_to_add = 8 - $length_of_id;
            @endphp
            <span><b>PE - {{ str_pad($order['id'], $how_many_zeros_to_add +1, "0", STR_PAD_LEFT) }}</b></span>
          </center>
        </td>
      </tr>
      <tr><td colspan="3"><div style="border-bottom: 1px solid black;"><br></div></td></tr>
    </table>
    <br>
    <table width="100%">
      <tr>
        <td>Fecha de emisión:</td>
        <td>{{ $order['created_at']->format('d/m/Y') }}</td>
        <td>Hora de emisión:</td>
        <td>{{ $order['created_at']->format('H:i:s') }}</td>
      </tr>
      <tr>
        <td>Señor(es):</td>
        <td>{{ $order['customer']['first_name'] }} {{ $order['customer']['last_name'] }}</td>
        <td>R.U.C.:</td>
        <td>{{ $order['customer']['legal_name'] }}</td>
      </tr>
      <tr>
        <td>Dirección Cliente:</td>
        <td>{{ $order['customer']['address'] }}</td>
        <td>Tipo Moneda:</td>
        <td>{{ $order['currency']['name'] }}</td>
      </tr>
      <tr><td colspan="4"><div style="border-bottom: 1px solid black;"><br></div></td></tr>
    </table>
    <br>
    <table class="table-striped" width="100%">
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

        @php
          $total_quantity = 0;
          $total_original = 0;
          $total_final = 0;
          $total_discount = 0;
        @endphp

      <tbody>

          @foreach($order->products as $u => $product)

            @php
              $total_quantity += $product->pivot->quantity;
              $total_original += $product->pivot->discount*$product->pivot->quantity;
              $total_final += $product->pivot->price*$product->pivot->quantity;
              $total_discount += $product->pivot->discount - $product->pivot->price;
            @endphp

            @if($u == 0)
            <tr style="border-bottom: 1px solid black;">
              <td rowspan="{{ count($order->products)+1 }}" style="padding: 5px 0px;">{{ $order->company->name_company }}</td>
              <td style="padding: 5px 0px;">{{ $product->name }}</td>
              <td class="text-right" style="padding: 5px 0px;">{{ $product->pivot->quantity }}</td>
              <td class="text-right" style="padding: 5px 0px;">{{ $product->pivot->discount }}</td>
              <td class="text-right" style="padding: 5px 0px;">{{ round($product->pivot->discount - $product->pivot->price, 2) }}</td>
              <td class="text-right" style="padding: 5px 0px;">{{ $product->pivot->price*$product->pivot->quantity }}</td>
            </tr>
            @else
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 5px 0px;">{{ $product->name }}</td>
              <td class="text-right" style="padding: 5px 0px;">{{ $product->pivot->quantity }}</td>
              <td class="text-right" style="padding: 5px 0px;">{{ $product->pivot->discount }}</td>
              <td class="text-right" style="padding: 5px 0px;">{{ $product->pivot->discount - $product->pivot->price }}</td>
              <td class="text-right" style="padding: 5px 0px;">{{ $product->pivot->price*$product->pivot->quantity }}</td>
            </tr>

            @endif
          @endforeach
        <tr style="border-bottom: 1px solid black;">
          <td class="text-right" colspan="4" style="padding: 5px 0px;"><b>Total:</b></td>
          <td class="text-right" style="padding: 5px 0px;">{{ $order->total }}</td>
        </tr>

        <!-- /////////////////////Totales/////////////////// -->
        <tr style="border-bottom: 1px solid black; border-top: 3px solid black;">
          <td class="text-right" colspan="3" style="padding: 5px 0px;"><b>CANTIDAD TOTAL:</b></td>
          <td class="text-right" style="padding: 5px 0px;">{{ $total_quantity }}</td>
          <td class="text-right" style="padding: 5px 0px;"><b>SUB TOTAL:</b></td>
          <td class="text-right" style="padding: 5px 0px;">{{ $total_original }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black;">
          <td class="text-right" colspan="5" style="padding: 5px 0px;"><b>DESCUENTO:</b></td>
          <td class="text-right" style="padding: 5px 0px;">{{ $total_discount }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black;">
          <td class="text-right" colspan="5" style="padding: 5px 0px;"><b>TOTAL:</b></td>
          <td class="text-right" style="padding: 5px 0px;">{{ $total_final }}</td>
        </tr>
      </tbody>
    </table>
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
