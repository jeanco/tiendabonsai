<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $company_main->name_company }} - Orden de Pedido</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="/template_2/img/logo-hoja.ico" type="image/x-icon">

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
        <div class="col-6"><img src="{{ $company_main->logotype_thumb }}" alt="images" style="width: 190px;" class="img-reponsive"></div>
        <div class="col-6 text-right">
          <div>{{ $company_main->name_company }}</div>
          <div>{{ $company_main->address }}</div>
          <div>{{ $company_main->phone }}</div>
          <div>{{ $company_main->email }}</div>
        </div>
      </div>
      <div class="row" style="border-top: solid 1px #d2d2d2; border-bottom: solid 1px #d2d2d2; padding: 15px;">
        <div class="col-6" style="font-size: 20px; font-weight: 700;">
          N° <span style="color: #00549d;">{{ $t['code'] }}</span>
        </div>
        <div class="col-6 text-right" style="font-size: 20px; font-weight: 700;">
          Estado: <span style="color: #00549d;">{{ $t['status_text'] }}</span>
        </div>
      </div>
      <div style="padding: 15px 35px;">
        <table width="100%">
          <tr>  <td width="20%">Operación:</td> <td>Pedido</td>                         </tr>
          <tr>  <td>Sucursal:</td>               <td>{{ ($t['place']) ? $t['place']['name'] : '' }}</td>
          <tr>  <td>Cliente:</td>               <td>{{ $t['customer']['name'] }}</td>                   </tr>
          <tr>  <td>Doc. Identidad:</td>        <td>{{ $t['customer']['document'] }}</td>                      </tr>
          <tr>  <td>E-mail:</td>                <td>{{ $t['customer']['email'] }}</td>  </tr>
          <tr>  <td>Celular:</td>               <td>{{ $t['customer']['cel'] }}</td>                  </tr>

          @if($t['alternative_direction'])
          <tr>  <td>Provincia:</td>               <td>{{ $t['alternative_direction']['province']['name']  }}</td>                  </tr>

          <tr>  <td>Distrito:</td>               <td> {{ $t['alternative_direction']['district']['name']  }} </td>                  </tr>

          <tr>  <td>Ciudad:</td>               <td>{{ $t['alternative_direction']['city']['name'] }} </td>                  </tr>
          <tr>  <td>Dirección de Entrega:</td>                <td>{{ $t['alternative_direction']['address'] }}</td>               </tr>
          <tr>  <td>Referencia:</td>                <td>{{ $t['alternative_direction']['reference'] }}</td>               </tr>
          <tr>  <td>Referencia Adicional:</td>                <td>{{ $t['alternative_direction']['additional_reference'] }}</td>               </tr>
          @else
          <tr>  <td>Dirección de Entrega:</td>               <td>Recoger en tienda, {{ $t['tienda']['name'] }}</td>
          @endif
          <tr>  <td>Forma de Pago:</td>        <td>{{ $t['payment_way_name'] }}</td>       </tr>
          <tr>  <td>Tipo de moneda:</td>        <td>{{ $t['currency_name'] }}</td>       </tr>
          <tr>  <td>Registrado:</td>            <td>{{ $t['date'] }}</td>                     </tr>
        </table>
      </div>
      <table width="100%">
        <thead>
          <tr>
            <th class="pdf-table" style="color: #00549d; font-weight: 700;">#</th>
            <th class="pdf-table" style="color: #00549d; font-weight: 700;">CANTIDAD</th>
            <th class="pdf-table" style="color: #00549d; font-weight: 700;">PRODUCTO</th>
            <th class="pdf-table" style="color: #00549d; font-weight: 700;">PRECIO UNITARIO</th>
            <th class="pdf-table" style="color: #00549d; font-weight: 700;">DSCTO.</th>
            <th class="pdf-table" style="color: #00549d; font-weight: 700;">TOTAL</th>
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
            <td class="pdf-table">{{ $t['symbol'] }}{{ $product['price'] }}</td>
            <td class="pdf-table">{{ $t['symbol'] }}{{ $product['discount'] }}</td>
            <td class="pdf-table" style="color: #00549d; font-weight: 700;">{{ $t['symbol'] }}{{ $product['sub_total'] }}</td>
          </tr>
          @endforeach
<!--           <tr>
            <td class="pdf-table">2</td>
            <td class="pdf-table">65418541</td>
            <td class="pdf-table">01-12-2019</td>
            <td class="pdf-table">Redmi Note 8 Pro EU 64GB 6GB RAM</td>
            <td class="pdf-table text-right">2</td>
            <td class="pdf-table text-right" style="color: #00549d; font-weight: 700;">1400</td>
          </tr> -->
        </tbody>
         <tfoot>
           <tr>
            <td class="pdf-foot-table text-right" colspan="5">SUBTOTAL:</td>

            <td class="pdf-foot-table">{{ $t['symbol'] }}{{ $t['total'] }}</td>
          </tr>
          {{--<tr>

            <td class=" text-right" colspan="5">COSTO DE ENVÍO:</td>
            <td class="">{{ $t['symbol'] }}{{ $t['shipping_cost'] }}</td>
          </tr>--}}
          <tr>

            <td class=" text-right" colspan="5">DSCTO. GLOBAL:</td>
            <td class="">{{ $t['symbol'] }}{{ $t['global_discount'] }}</td>
          </tr>

          <tr>
            <td class=" text-right" colspan="5">DSCTO CUPÓN:</td>

            <td class="">{{ $t['symbol'] }}{{ $t['discount'] }}</td>
          </tr>

          <tr>
            <td class="pdf-foot-table"></td>
            <td class="pdf-foot-table text-right" colspan="2">TOTAL UNIDADES:</td>
            <td class="pdf-foot-table">{{ $quantity_total }} UND.</td>
            <td class="pdf-foot-table text-right" >TOTAL:</td>
            <td class="pdf-foot-table">{{ $t['symbol'] }}{{ $t['total'] }}</td>
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

    <div class="content-margin" style="margin-top: 50px;">
      <div class="row">
        <div class="col-md-8">
           <ul class="u-list-reset">
            <li class="u-mt3">
              <div class="c-entity">
                <div class="u-color-text">
                  <p class="u-mt0 u-mb1"><span style="font-weight: bold;">Forma de Pago:</span>  {{ $t['account_name'] }}</p>
                <img src="{{ $t['account_logo'] }}" width="80" class="c-entity__image">

                <p class="u-mt0 u-mb1"><span style="font-weight: bold;">Más información:</span>  {!! $t['account_description'] !!}</p>
                <br>
                <p class="u-mt0 u-mb1">{!! $t['account_instructions'] !!}</p>
                  <p class="u-mt0 u-mb1"></p>
                  <p class="u-mt0 u-mb1"></p>
                  <p class="u-mt0 u-mb1"></p>
                </div>
              </div>
            </li>
            <li class="u-mt3">
              <div class="c-entity">
                <div class="u-color-text" style="padding-top: 30px; padding-bottom: 60px;">
                  <h5 style="font-weight: bold;">Términos y Condiciones</h5>
                  <br>


                {!! $company_main->terms_and_conditions !!}
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-md-4 text-center">
           @if($t['account_logo_path'])
           <h5>Escanea con tu Yape para poder pagar</h5>
           <br>
                <img src="{{ $t['account_logo_path'] }}" width="60%" class="c-entity__image">
                @endif
        </div>

      </div>


    </div>

    <div>


    </div>

  </body>
</html>
