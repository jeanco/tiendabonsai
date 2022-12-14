<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{-- --}}</title>
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
        background: #2b2b2b;
        color: #fff;
        font-weight: 700;
      }
      .btn-cupon:hover {
        background: #f6d316;
      }
    </style>
  </head>
  <body>
    <div style="margin: 50px 20px; width: 700px; font: 400 13.3333px Arial;">
          <div style="background-color: #e7e7e7; padding: 25px 0px; text-align: center;">
              <img src="{{$logotype}}" alt="images" style="width: 200px;">
          </div>
          <div style="padding: 50px 0px; background: #fff8f8;">


                 <table width="100%">
                  <tr><td colspan="3" style="text-align: center; font-size: 18px;"><h3>¡Muchas Gracias por Elegirnos!</h3></td></tr>
                  <tr>
                    <td width="19%"></td>
                    <td style="font-size: 16px; text-align: center;">Se registró un Nuevo Usuario exitosamente <br>el día {{$date_formatted}}.<br>
                      <p>En breve un asesor comercial se contactará con Usted.</p></td>
                    <td width="19%"></td>
                  </tr>
                </table>

          </div>
          <div style="text-align: center;">
          	<img src="https://dl.dropboxusercontent.com/s/mfax8pez62d1y4j/1592881890-1592881890.png?dl=0" style="width: 100%">
          </div>

    </div>
  </body>
</html>
