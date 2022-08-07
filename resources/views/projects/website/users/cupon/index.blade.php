<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $company_main->name_company }}</title>
    <style type="text/css">
      .btn {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      }
      @media (prefers-reduced-motion: reduce) {
        .btn {
          transition: none;
        }
      }
      .btn:hover {
        color: #212529;
        text-decoration: none;
      }
      .btn:focus, .btn.focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
      }
      .btn.disabled, .btn:disabled {
        opacity: 0.65;
      }
      .btn-cupon {
        background: #fd6e00;
        color: #fff;
        font-weight: 700;
      }
      .btn-cupon:hover {
        background: #ffd4b5;
      }
    </style>
  </head>
  <body>
    <div style="margin: 50px 20px; width: 600px; font: 400 13.3333px Arial;">
          <div style="background-color: #ffd4b5; padding: 25px 0px; text-align: center;">
              <img src="{{ $company_main->logotype_thumb }}" alt="images">
          </div>
          <div style="padding: 50px 0px; background: #fff8f8;">

                <table width="100%" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="25%"></td>
                    <td style="background: #ffd4b5; font-size: 18px; text-align: center; padding: 10px;">Tu código es:</td>
                    <td style="background: #ffd4b5; font-size: 18px; text-align: center; font-weight: 700; padding: 10px;">{{ $code }}</td>
                    <td width="25%"></td>
                  </tr>
                </table>

                <table width="100%">
                  <tr><td colspan="3" style="text-align: center;"><h3>¡Muchas Gracias por Elegirnos!</h3></td></tr>
                  <tr>
                    <td width="19%"></td>
                    <td style="font-size: 14px; text-align: center;">Aquí tienes tu codigo de descuento para tu próxima compra. Puedes canjearlo hasta el próximo 13 de enero del 2020.</td>
                    <td width="19%"></td>
                  </tr>
                </table>

                <table width="100%" style="margin: 30px 0px;">
                  <tr>
                    <td width="50%" style="text-align: center;"><img src="data:image/png;base64, {{ base64_encode(SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')->size(200)->generate($code)) }}" alt="images" style="width: 150px;"></td>
                    <td width="50%" style="text-align: center;"><button type="button" class="btn btn-cupon">Descargar</button></td>
                  </tr>
                </table>

                <div style="background: #fff; margin: 0px 40px;">
                  <table width="100%">
                    <tr>
                      <td width="20%" style="text-align: center; padding: 10px;"><img src="/images/boyfriend.png" alt="images" class="img-reponsive" style="width: 50px;"></td>
                      <td width="80%" style="text-align: center;">{{ $customer }}</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="font-weight: 700; padding: 20px;">
                        @foreach($products as $key => $product)
                          &#8226;       Descuento de <span>{{ $product }}</span><br>
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align: center; font-style: italic; padding: 0px 20px 10px 20px;">
                        Para realizar el canje, sirvase a pasar a la tienda respectiva con este cupon impreso y la identificación (DNI) del beneficiario.
                      </td>
                    </tr>
                  </table>
                </div>
          </div>
          <div style="margin: 40px 0px;"><button onclick="window.print(); void 0;" type="button" class="btn btn-cupon">Imprimir</button></div>
    </div>
  </body>
</html>
