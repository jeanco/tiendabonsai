<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/miranda/img/apple-touch-icon.png">
    <title>Divemotor</title>
    <!-- Popup CSS -->
    <link href="/divemotor/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/divemotor/dist/css/style.min.css" rel="stylesheet">
    <!-- Other css -->
    <link rel="stylesheet" href="/divemotor/dist/css/newstyles.css">
    <!-- Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Css -->
    <style type="text/css">
    .table-bordered, .table-bordered td {
        border: solid #000;
        border-width: 0px 1px 0px 1px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
     .table-bordered th {
        border: solid #000;
        border-width: 1px;
        text-align: center;
     }
     @media print {
       .hidden-print {
         display: none !important; } }
    </style>
</head>

<body style="background-color: #fff;">
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div class="mt-3">
      <div class="container">
          <div class="row align-items-center" style="border-bottom: solid 3px #000;">
              <div class="col-9 mb-3">
                  <img src="/divemotor/assets/images/logo.png" class="img-reponsive" alt="images" width="300">
                  <div class="companyinfo">
                      {{ $company_main->name_company }}<br>
                      {{ $company_main->address }}<br>
                      {{ $company_main->phone }}
                      <!-- <div>{{ $company_main->email }}</div> -->
                  </div>
              </div>
              <div class="col-3 text-center p-2 mb-3" style="border: solid 3px #000; color: #000; border-radius: 20px; height: 100px;">
                  <div class="font-bold" style="font-size: 20px; padding-top: 13px;">COTIZACION</div>
                  <div class="font-bold">Nº {{ $order->number }}</div>
              </div>
          </div>
          <div class="row align-items-center mt-3" style="font-size: 16px; color: #000;">
              <div class="col-2 text-right">DNI/RUC:</div>
              <div class="col-5">{{ $order->customer->identity_document }}</div>
              <div class="col-2 text-right">FECHA:</div>
              <div class="col-3">{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</div>
              <div class="col-2 text-right">CLIENTE:</div>
              <div class="col-5">{{ $order->customer->first_name }} {{ $order->customer->last_name }} </div>
          </div>
          <div class="row align-items-center" style="font-size: 16px; color: #000;">
              <div class="col-2 text-right">DIRECCION:</div>
              <div class="col-5">{{ $order->customer->address }}</div>
          </div>
          <div class="row align-items-center" style="font-size: 16px; color: #000;">
              <div class="col-2 text-right">TELEFONO:</div>
              <div class="col-3">{{ $order->customer->cel_whatsapp }}</div>
          </div>
          <div class="row align-items-center mb-4" style="font-size: 16px; color: #000;">
              <div class="col-2 text-right">VENDEDOR:</div>
              <div class="col-5">{{ $order->user->first_name }} {{ $order->user->last_name }}</div>
          </div>
          <table class="table-bordered" width="100%">
            <thead>
              <tr>
                <th class="pdf-table" style="font-weight: 700; padding: 5px 10px 5px 10px;">ITEM</th>
                <th class="pdf-table" style="font-weight: 700; padding: 5px 10px 5px 10px;">DESCRIPCIÓN DEL PRODUCTO</th>
                <th class="pdf-table" style="font-weight: 700; padding: 5px 10px 5px 10px;">GARANTÍA</th>
                <th class="pdf-table" style="font-weight: 700; padding: 5px 10px 5px 10px;">CANT</th>
                <th class="pdf-table" style="font-weight: 700; padding: 5px 10px 5px 10px;">UNID.</th>
                <th class="pdf-table" style="font-weight: 700; padding: 5px 10px 5px 10px;">P.UNIT</th>
                <th class="pdf-table" style="font-weight: 700; padding: 5px 10px 5px 10px;">TOTAL</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order->products as $product)
              <tr>
                  <td class="pdf-table text-center">1</td>
                  <td class="pdf-table text-center">{{ $product->name }}</td>
              <td class="pdf-table text-center">{{ $product->warranty }}</td>
                  <td class="pdf-table text-center">{{ $product->pivot->quantity }}</td>
                  <td class="pdf-table text-center">UND</td>
                  <td class="pdf-table text-center">{{ $product->pivot->price }}</td>
                  <td class="pdf-table text-center">{{ $product->pivot->quantity*$product->pivot->price }}</td>
              </tr>
              @endforeach
              {{-- <tr>
                <td class="pdf-table">2</td>

                <td class="pdf-table"> XVR5104HS-X1 - LITE - GRABADOR HDCVI, 4M-N/1080P non-realtime, 720P realtimE, H.265+/H.265/H.264+/H.264 video compression. 1 HDMI/1 VGA, 4ch Video in, 1 Audio in/1 Audio out, 1 RJ45(100M), 2 U</td>

                <td class="pdf-table">36 MESES</td>
                <td class="pdf-table text-right">1</td>
                <td class="pdf-table">UND</td>
                <td class="pdf-table text-right">51.3589</td>
                <td class="pdf-table text-right">50.85</td>
              </tr> --}}
            </tbody>
            <tfoot>
              <tr>
              <th class="pdf-foot-table" colspan="3" style="border-right: none;">NOTA: {{ $order->description }}</th>
                <th class="pdf-foot-table text-right" colspan="2" style="border-left: none; border-right: none; padding-right: 3px;">
                    SUBTOTAL<br>IGV 18%<br>TOTAL
                </th>
                <th class="pdf-foot-table text-right" style="border-left: none; border-right: none; padding-right: 3px;">
                    $<br>$<br>$
                </th>
                <th class="pdf-foot-table text-right" colspan="2" style="border-left: none; padding-right: 3px;">
                {{ $order->subtotal }}<br>{{ $order->total_igv }}<br>{{ $order->total }}
                </th>
              </tr>
            </tfoot>
          </table>

          <div style="font-size: 16px; padding-top: 15px; color: #000;">CONDICIONES COMERCIALES:</div>
          <div class="pl-4 mb-3" style="font-size: 16px; color: #000;">
            1.&emsp;Precios están expresados en Dólares Americanos e incluyen el 18% del I.G.V.<br>
            2.&emsp;Disponibilidad: Confirmar stock disponible a la fecha antes de realizar el abono.<br>
            3.&emsp;Los precios están sujetos a cambios posterior a la fecha de validez del documento.<br>
            4.&emsp;Las descripciones son referenciales, recomendamos ingresar a la web del fabricante para validar información.<br>
            5.&emsp;Para pagos en soles, consultar el T/C. a la fecha.<br>
            6.&emsp;No se realizan cambios o devoluciones por equipos solicitados por el cliente que no sean compatibles en tecnología.<br>
            7.&emsp;Los precios cotizados no incluyen el pago con VISA, si requiere ese medio de pago se aplicara un recargo de 4% adicional.
          </div>
          {{--
            <div style="font-size: 16px; color: #000;">CONDICIONES COMERCIALES:</div>
          <div style="font-size: 16px; color: #000;">PAGOS EN LIMA:</div>
          <div class="pl-1 mb-3" style="font-size: 16px; color: #000;">
            1.&nbsp;BCP dólares 194-2123979-1-41<br>
            2.&nbsp;SCOTIABANK dólares 000-4456257<br>
            3.&nbsp;BBVA dólares 0011-0356-01-00027700<br>
          </div>
          <div style="font-size: 16px; color: #000;">PAGOS EN PROVINCIA: solo BCP:</div>
          <div class="pl-1 mb-3" style="font-size: 16px; color: #000;">
            1.&nbsp;Ventanilla Cuenta Recaudadora (Sujeto a comisión): Dólares 193-2423728-1-09 / Soles 193-2425120-0-61<br>
            2.&nbsp;Agente BCP (Sujeto a comisión): Código de agente 14885 / RUC: Digital Corporación Peruana SAC - 20557285424<br>
            3.&nbsp;Banca por Internet (Libre de comisión): PASO 1: Pagos Varios / PASO 2: Pago de Servicios / PASO 3: Digital Corporación Peruana SAC<br>
          </div>
          <div class="row" style="padding: 10px 15px; margin-top: 20px;">
            <div class="col-12 text-right">
              <button onclick="window.print(); void 0;" type="button" class="btn btn-success hidden-print">Imprimir</button>
            </div>
          </div>
            --}}

      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/divemotor/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/divemotor/assets/node_modules/popper/popper.min.js"></script>
    <script src="/divemotor/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/divemotor/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="/divemotor/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/divemotor/dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/divemotor/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/divemotor/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/divemotor/dist/js/custom.min.js"></script>
    <!-- Magnific popup JavaScript -->
    <script src="/divemotor/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="/divemotor/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
</body>

</html>
