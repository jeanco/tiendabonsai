<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $company_main->name_company }}</title>
    <link rel="stylesheet" href="/website/css/bootstrap.css">
    <link rel="stylesheet" href="/website/css/style.css">
    <link rel="stylesheet" href="/website/css/oyeepe.css">
    <link rel="stylesheet" href="/website/pluging/materialize/css/materialize.css">
    <link rel="stylesheet" href="/admin/css/website.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
    <script type="text/javascript" src="/website/js/jquery.js"></script>
  </head>
  <body>
    <div class="content-margin" style="margin-top: 50px;">
      <div class="row" style="align-items: center; display: flex; margin-bottom: 40px">
        <div class="col-6"><img src="{{ $company_main->logotype_thumb }}" alt="images" class="img-reponsive"></div>
        <div class="col-6 text-right">
          <div>{{ $company_main->name_company }}</div>
          <div>{{ $company_main->address }}</div>
          <div>{{ $company_main->phone }}</div>
          <div>{{ $company_main->email }}</div>
        </div>
      </div>
      <div class="row" style="border-top: solid 1px #d2d2d2; border-bottom: solid 1px #d2d2d2; padding: 15px;">
        <div class="col-6" style="font-size: 20px; font-weight: 700;">
          Código de Orden: <span style="color: #ff6600;">{{ $t['code'] }}</span>
        </div>
        <div class="col-6 text-right" style="font-size: 20px; font-weight: 700;">
          Estado: <span style="color: #ff6600;">{{ $t['status_text'] }}</span>
        </div>
      </div>
      <div style="padding: 15px 35px;">
        <table width="100%">
          <tr>  <td width="20%">Operación:</td> <td>Pedido</td>                         </tr>
          <tr>  <td>Cliente:</td>               <td>{{ $t['customer']['name'] }}</td>                   </tr>
          <tr>  <td>Doc. Identidad:</td>        <td>{{ $t['customer']['document'] }}</td>                      </tr>
          <tr>  <td>E-mail:</td>                <td>{{ $t['customer']['email'] }}</td>  </tr>
          <tr>  <td>Celular:</td>               <td>{{ $t['customer']['cel'] }}</td>                  </tr>
          <tr>  <td>Ciudad:</td>                <td>{{ $t['customer']['origin'] }}</td>               </tr>
          <tr>  <td>Forma de Envio:</td>        <td>Envío a agencia en Chile</td>       </tr>
          <tr>  <td>Registrado:</td>            <td>{{ $t['date_other_format'] }}</td>                     </tr>
        </table>
      </div>
      <table width="100%">
        <thead>
          <tr>
            <th class="pdf-table" style="color: #ff6600; font-weight: 700;">#</th>
            <th class="pdf-table" style="color: #ff6600; font-weight: 700;">CANTIDAD</th>
            <th class="pdf-table" style="color: #ff6600; font-weight: 700;">PRODUCTO</th>
            <th class="pdf-table" style="color: #ff6600; font-weight: 700;">PRECIO UNITARIO</th>
            <th class="pdf-table" style="color: #ff6600; font-weight: 700;">DESCUENTO</th>
            <th class="pdf-table" style="color: #ff6600; font-weight: 700;">TOTAL</th>
          </tr>
        </thead>
        @php
          $quantity_total = 0;
        @endphp

        <tbody>
          @foreach($t['products'] as $i => $product)
            @php
              $quantity_total += $product['quantity'];
            @endphp

          <tr>
            <td class="pdf-table">{{ $i+1 }}</td>
            <td class="pdf-table">{{ $product['quantity'] }}</td>
            <td class="pdf-table">{{ $product['name'] }}</td>
            <td class="pdf-table">{{ $product['price'] }}</td>
            <td class="pdf-table text-right">{{ $product['discount'] }}</td>
            <td class="pdf-table text-right" style="color: #ff6600; font-weight: 700;">{{ $product['sub_total'] }}</td>
          </tr>
          @endforeach
<!--           <tr>
            <td class="pdf-table">2</td>
            <td class="pdf-table">65418541</td>
            <td class="pdf-table">01-12-2019</td>
            <td class="pdf-table">Redmi Note 8 Pro EU 64GB 6GB RAM</td>
            <td class="pdf-table text-right">2</td>
            <td class="pdf-table text-right" style="color: #ff6600; font-weight: 700;">1400</td>
          </tr> -->
        </tbody>
        <tfoot>
          <tr>
            <td class="pdf-foot-table text-right" colspan="4">TOTAL:</td>
            <td class="pdf-foot-table text-right">{{ $quantity_total }}</td>
            <td class="pdf-foot-table text-right">{{ $t['total'] }}</td>
          </tr>
        </tfoot>
      </table><br>
      <div class="row" style="border: solid #d2d2d2; border-width: 1px 0px; padding: 10px 15px; margin-top: 20px;">
        <div class="col-12 text-right">
          <button onclick="window.print(); void 0;" type="button" class="btn btn-success hidden-print">Imprimir</button>
        </div>
      </div>
      <div style="padding: 15px;">
        {{ $company_main->name_company }} | {{ $company_main->email }} | {{ $company_main->phone }} | {{ $company_main->address }}
      </div>
    </div>
  </body>
</html>
