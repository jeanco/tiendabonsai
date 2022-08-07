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
                    <td style="font-size: 16px; text-align: center;">Su Compra se realizó exitosamente <br>el día {{$date_formatted}}.<br>
                      <p>En breve un asesor comercial se contactará con Usted para la entrega de su pedido.</p></td>
                    <td width="19%"></td>
                  </tr>
                </table>

                <table width="100%" style="margin: 30px 0px;">
                	<tr>
                    <td width="50%" style="text-align: center;">
                      Código de la Compra Nº  {{$code}}
                    </td>
                  </tr>
                  <tr>
                    {{--<td width="50%" style="text-align: center;"><img src="data:image/png;base64, {{ base64_encode(SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')->size(200)->generate($code)) }}" alt="images" style="width: 150px;"></td>--}}
                  <td width="50%" style="text-align: center; padding-top: 50px;"><a href="{{ $document_link }}"><button type="button" class="btn btn-cupon">Ver Documento</button></a></td>
                  </tr>
                  
                </table>



                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%">
			    <tbody>
			        <tr>
			            <td style="padding-top:0;padding-right:18px;padding-bottom:18px;padding-left:18px" valign="top" align="center">
			            	<table>
			                    <tbody>
			                    	<tr><td colspan="3" style="text-align: center; font-size: 18px;"><h3>CÓDIGO DE PAGO</h3></td></tr>
			                        
			                    </tbody>
			                </table>
			                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate!important;border-radius:4px;background-color:#ec3137">
			                    <tbody>
			                    	
			                        <tr>
			                        	
			                            <td align="center" valign="middle" style="font-family:Arial;font-size:16px;padding:18px">
			                            	
			                                <a class="m_4527721601376807026mcnButton" title="{{$code_payment}}" style="font-weight:bold;letter-spacing:normal;line-height:100%;text-align:center;text-decoration:none;color:#ffffff">{{$code_payment}}</a>
			                            </td>
			                        </tr>
			                    </tbody>
			                </table>
			            </td>
			        </tr>
			    </tbody>
			</table>




                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%">
    <tbody>
        <tr>
            <td valign="top" style="padding-top:9px">
              	
			    
				
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%" width="100%" class="m_4527721601376807026mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="m_4527721601376807026mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px">
                        	<span class="im">
                        
                            <h4><span style="color:#2b2b2b">Detalle de la orden:&nbsp;</span></h4>
<br>
<strong>Monto:</strong> S/. {{$total_payment}}<br>
<strong>Empresa recaudadora:</strong> PagoEfectivo <br>
<strong>Nombre del servicio</strong> PagoEfectivo Nuevo Sol<br>
&nbsp;
    <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
          <tbody>
            <tr>
              <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;text-align:center;vertical-align:top">
                
            
      <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
        
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
        
            <tbody><tr>
              <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word">
                
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
        <tbody>
          <tr>
            <td style="width:150px">
              
      <img height="auto" src="https://ci5.googleusercontent.com/proxy/dNpAuaG7l9N3YmrbOfdiUFrC8xVDGuTpyubPKGkPMHAS1CnK9wn32ZaoreBKs0rJmcc=s0-d-e1-ft#https://i.imgur.com/VwtuoES.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%" width="150" class="CToWUd">
    
            </td>
          </tr>
        </tbody>
      </table>
    
              </td>
            </tr>
          
            <tr>
              <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word">
                
      <div style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;line-height:22px;text-align:left;color:#5f676b">
        <strong>Nota:</strong> El código de pago (CIP) es solo informativo y no una constancia de pago confirmado hasta la realización del mismo a través de los canales mencionados abajo.
      </div>
    
              </td>
            </tr>
          
      </tbody></table>
    
      </div>
    
          
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
    
      
      
    
      
      <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
          <tbody>
            <tr>
              <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;text-align:center;vertical-align:top">
                
            
      <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
        
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
        
            <tbody><tr>
              <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word">
                
      <div style="font-family:Helvetica,Arial,sans-serif;font-size:15px;font-weight:600;line-height:22px;text-align:left;color:#5f676b">
       ¿Dónde puedo pagarlo?
      </div>
    
              </td>
            </tr>
          
            <tr>
              <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word">
                
      <div style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;line-height:22px;text-align:left;color:#5f676b">
        Puedes pagar tu compra en los <strong>Bancos o Agentes</strong> afiliados que se encuentran mostrados abajo. Además, también podrás usar la banca movil via celular o web. ¡Recuerda que debes pagar este código antes que expire!
      </div>
    
              </td>
            </tr>
          
            <tr>
              <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word">
                
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
        <tbody>
          <tr>
            <td style="width:450px">
              
      <img height="auto" src="https://ci4.googleusercontent.com/proxy/LxzltqoeQE5Blpekv4qWog30Mju-TFOmiemvitRvXOZ1zvoatR9kl4YcAe8D1JE2_Ak=s0-d-e1-ft#https://i.imgur.com/mbjYqem.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%" width="450" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 552px; top: 1216px;"><div id=":1hq" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Descargar el archivo adjunto " data-tooltip-class="a1V" data-tooltip="Descargar"><div class="aSK J-J5-Ji aYr"></div></div></div>
    
            </td>
          </tr>
        </tbody>
      </table>
    
              </td>
            </tr>
          
      </tbody></table>
    
      </div>
    
          
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
    
      
      
    
      
      <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
          <tbody>
            <tr>
              <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;text-align:center;vertical-align:top">
                
            
      <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
        
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
        
            <tbody><tr>
              <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word">
                
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
        <tbody>
          <tr>
            <td style="width:50px">
              
        <a href="https://u6700811.ct.sendgrid.net/ls/click?upn=npLKSMv6TcdP1grfw2sKU4W9IncRJNJWvef4e8KU1IOT-2BFLfv8MZOvWlVrl-2BA88Fm-2FwswwNpeqmfmWPb-2F3qISXL-2BY0Vt3lVFsqBcq8BJR2h1GCVhVaL54Y9MSz69eHD7mcGsIgVTXa6ZVr5tEy7iFA-3D-3DOaAC_frf0KE1tz8eJDNoOqjH5Xp9w8am-2BUs2I5hT-2BANAMJGELco6IsBOL5CyRET1Rdf08Su3C-2BhEuVK-2FWigUIF95G6qxcuS46mhykB8RtAf-2FVzb9F0mZGfMoMsqiEifrGo4RkNy0lLgep-2FnKkfxxjKxX1YMiA7lbpdyto-2FZ9ev-2Bt7278g83WFR6H4DYsSG9UD7p-2FQx0oIQYPux4YhkR5XOSE1yNuhNXRMEiBHseTJU1csntbBUsrvcujpYYJpXK4gR9eN" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://u6700811.ct.sendgrid.net/ls/click?upn%3DnpLKSMv6TcdP1grfw2sKU4W9IncRJNJWvef4e8KU1IOT-2BFLfv8MZOvWlVrl-2BA88Fm-2FwswwNpeqmfmWPb-2F3qISXL-2BY0Vt3lVFsqBcq8BJR2h1GCVhVaL54Y9MSz69eHD7mcGsIgVTXa6ZVr5tEy7iFA-3D-3DOaAC_frf0KE1tz8eJDNoOqjH5Xp9w8am-2BUs2I5hT-2BANAMJGELco6IsBOL5CyRET1Rdf08Su3C-2BhEuVK-2FWigUIF95G6qxcuS46mhykB8RtAf-2FVzb9F0mZGfMoMsqiEifrGo4RkNy0lLgep-2FnKkfxxjKxX1YMiA7lbpdyto-2FZ9ev-2Bt7278g83WFR6H4DYsSG9UD7p-2FQx0oIQYPux4YhkR5XOSE1yNuhNXRMEiBHseTJU1csntbBUsrvcujpYYJpXK4gR9eN&amp;source=gmail&amp;ust=1596667446595000&amp;usg=AFQjCNFYmdhdwQmF25OObZwjqaDqCxAthA">
          
      <img height="auto" src="https://ci5.googleusercontent.com/proxy/ab7L8JOD1bZ2naveYOFyai5-gYGkO1v5g0LBt4hbAScw7mDS7l5Ag9zHFsPafr5q22k=s0-d-e1-ft#https://i.imgur.com/40YUzHE.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%" width="50" class="CToWUd">
    
        </a>
      
            </td>
          </tr>
        </tbody>
      </table>
    
              </td>
            </tr>
          
      </tbody></table>
    
      </div>
    
          
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
    
      
      
    
      
      <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
          <tbody>
            <tr>
              <td style="direction:ltr;font-size:0px;padding:0px;text-align:center;vertical-align:top">
                
            
      <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
        
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
        
            <tbody><tr>
              <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word">
                
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
        <tbody>
          <tr>
            <td style="width:217px">
              
        <a href="https://u6700811.ct.sendgrid.net/ls/click?upn=npLKSMv6TcdP1grfw2sKU4W9IncRJNJWvef4e8KU1IOT-2BFLfv8MZOvWlVrl-2BA88Fm-2FwswwNpeqmfmWPb-2F3qISXL-2BY0Vt3lVFsqBcq8BJR2h1GCVhVaL54Y9MSz69eHD7mcGsIgVTXa6ZVr5tEy7iFA-3D-3DBtIu_frf0KE1tz8eJDNoOqjH5Xp9w8am-2BUs2I5hT-2BANAMJGELco6IsBOL5CyRET1Rdf08Su3C-2BhEuVK-2FWigUIF95G6h4FLO09FKRGMOuML4Lk74tucrVKjLOFmzjWDRYRk4svTg61ik8yqJu062jvl5PbJNgvCLTGsUwZQoOC8866KXQ5dV8qfNOgJcYEylu4jSBxh4GBcVElvrDTEVAdtzcfPP-2FiaqJrdS32zjpR38gglz8ad208PF4yq80gE47xSKKt" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://u6700811.ct.sendgrid.net/ls/click?upn%3DnpLKSMv6TcdP1grfw2sKU4W9IncRJNJWvef4e8KU1IOT-2BFLfv8MZOvWlVrl-2BA88Fm-2FwswwNpeqmfmWPb-2F3qISXL-2BY0Vt3lVFsqBcq8BJR2h1GCVhVaL54Y9MSz69eHD7mcGsIgVTXa6ZVr5tEy7iFA-3D-3DBtIu_frf0KE1tz8eJDNoOqjH5Xp9w8am-2BUs2I5hT-2BANAMJGELco6IsBOL5CyRET1Rdf08Su3C-2BhEuVK-2FWigUIF95G6h4FLO09FKRGMOuML4Lk74tucrVKjLOFmzjWDRYRk4svTg61ik8yqJu062jvl5PbJNgvCLTGsUwZQoOC8866KXQ5dV8qfNOgJcYEylu4jSBxh4GBcVElvrDTEVAdtzcfPP-2FiaqJrdS32zjpR38gglz8ad208PF4yq80gE47xSKKt&amp;source=gmail&amp;ust=1596667446595000&amp;usg=AFQjCNEEhp4UFKwOYJN1dr0ia8ErYethWg">
          
      <img height="auto" src="https://ci5.googleusercontent.com/proxy/44_xp9O1kNq1BOE6CtyCcA9XwQl8Bl1v8t72PRXfUA06jOyM0IZzQQjvquBYZnuESKE=s0-d-e1-ft#https://i.imgur.com/eFKjxZQ.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%" width="217" class="CToWUd">
    
        </a>
      
            </td>
          </tr>
        </tbody>
      </table>
    
              </td>
            </tr>
          
      </tbody></table>
    
      </div>
    
          
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
    
      
      
    
      
    
      
    
      
      </span>

   
      <span class="im">
    
      
      
    
      
      <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
          <tbody>
            <tr>
              <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;text-align:center;vertical-align:top">
                
            
      <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
        
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
        
            <tbody><tr>
              <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word">
                
      <div style="font-family:Helvetica,Arial,sans-serif;font-size:15px;font-weight:600;line-height:22px;text-align:left;color:#5f676b">
        Preguntas frecuentes
      </div>
    
              </td>
            </tr>
          
            <tr>
              <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word">
                
      <div style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:300;line-height:22px;text-align:left;color:#5f676b">
        ¿Dudas? Consulta en las siguientes preguntas:
      </div>
    
              </td>
            </tr>
          
            <tr>
              <td style="font-size:0px;padding:10px 25px;padding-top:5;padding-right:0px;padding-bottom:0px;padding-left:0px;word-break:break-word">
                
      <p style="border-top:solid 1px #f8f8f8;font-size:1;margin:0px auto;width:100%">
      </p>
      
      
    
    
              </td>
            </tr>
          
      </tbody></table>
    
      </div>
    
          
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
    
      
      
    
      
      </span><div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
          <tbody>
            <tr>
              <td style="direction:ltr;font-size:0px;padding:20px;text-align:center;vertical-align:top">
                
            
      <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
        
      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="background-color:#dededd;vertical-align:top" width="100%">
        
            <tbody><tr>
              <td style="font-size:0px;padding:1px;word-break:break-word">
                
      <table style="width:100%;border-collapse:collapse;border:none;border-bottom:none;font-family:Ubuntu,Helvetica,Arial,sans-serif">
        <tbody>
          
      <tr>
        <td style="padding:0px">
          <label style="font-size:13px">
            
    
    
              <input type="checkbox" style="display:none">
            
    
  
            <div><span class="im">
              
      <div>
        <table style="width:100%;border-bottom:none">
          <tbody>
            <tr>
              
      <td style="width:100%;background-color:#ffffff;color:#031017;font-size:15px;font-family:Roboto,Open Sans,Helvetica,Arial,sans-serif;padding:15px">
        ¿Cómo puedo pagar por Banca por internet o móvil?
      </td>
    

    
    
      <td style="padding:16px;background:#ffffff;vertical-align:middle">
        <img src="https://ci4.googleusercontent.com/proxy/GrqwG5MXW_M4bnVtTDCcKckH7VS5vvrU6HqDwecQ6i3nCJ9NaUbNsPIipHTTakmJ-A=s0-d-e1-ft#http://i.imgur.com/Xvw0vjq.png" alt="+" style="display:none;width:24px;height:24px" class="CToWUd">
        <img src="https://ci5.googleusercontent.com/proxy/AELgmMtS0HyWC9k2D3lnH4Fmlap9n6nbNk0TaJB6Glo-c-Ig0QHHbcI4D7w2dfGQVQ=s0-d-e1-ft#http://i.imgur.com/KKHenWa.png" alt="-" style="display:none;width:24px;height:24px" class="CToWUd">
      </td>
    
    
  
            </tr>
          </tbody>
        </table>
      </div>
    
      </span><div>
        <table style="width:100%;border-bottom:none">
          <tbody>
            <tr>
              
      <td style="background:#fafafa;font-size:14px;font-family:Open Sans,Helvetica,Arial,sans-serif;color:#505050;padding:15px">
        <span style="line-height:20px">
                  <b>Instrucciones por banco</b>        
                   <p>
                     <b style="font-size:13px">Banco BBVA Continental</b>
                     </p><ol><span class="im">
                     <li>Seleccione la opción Pago de Servicios &gt; De Instituciones y Empresas &gt; Busca por nombre PAGOEFECTIVO &gt; PAGOEFECTIVO Nuevo Sol.</li>
                       
                       </span><li>Ingresa tu código CIP: {{$code_payment}} y sigue los pasos.</li>
                     
                     </ol>
                     
                     
                   <p></p>
                
                
                <p>
                     <b style="font-size:13px">Banco BCP</b>
                     </p><ol><span class="im">
                     <li>Selecciona la opción Pago de servicios &gt; Empresas &gt; PAGOEFECTIVO &gt; PAGOEFECTIVO Nuevo Sol.</li>
                       
                       </span><li>Ingresa tu código CIP: {{$code_payment}} y sigue los pasos.</li>
                     
                     </ol>
                     
                     
                 <p></p>
                
                
                  <p>
                     <b style="font-size:13px">Banco Interbank</b>
                     </p><ol><span class="im">
                     <li>Selecciona la opción de Pago a Instituciones o Empresa &gt; Empresa: PAGOEFECTIVO &gt; Servicio: PAGOEFECTIVO.</li>
                       
                       </span><li>Ingresa tu código CIP: {{$code_payment}} y sigue los pasos.</li>
                     
                     </ol>
                     
                     
                 <p></p>
                
                
                <p>
                     <b style="font-size:13px">Banco Scotiabank</b>
                     </p><ol><span class="im">
                     <li>Selecciona la opción Pagos &gt; Otras Instituciones &gt; Otros &gt; Busca por Empresa/Servicio: PAGOEFECTIVO &gt; Selecciona: PAGOEFECTIVO Nuevo Sol.</li>
                       
                       </span><li>Ingresa tu código CIP: {{$code_payment}} y sigue los pasos.</li>
                     
                     </ol>
                     
                     
                 <p></p>
                
                
                <p>
                     <b style="font-size:13px">Banco BanBif</b>
                     </p><ol><span class="im">
                     <li>Selecciona la opción Pago de servicios &gt; Busca por Empresa y escribe PAGOEFECTIVO &gt; Selecciona la empresa PAGOEFECTIVO.</li>
                       
                       </span><li>Ingresa tu código CIP: {{$code_payment}} y sigue los pasos.</li>
                     
                     </ol>
                     
                     
                 <p></p>
                
                
                <p>
                     <b style="font-size:13px">Caja Arequipa</b>
                     </p><ol><span class="im">
                     <li>Selecciona la opción Pago de servicios &gt; Busca la entidad PAGOEFECTIVO &gt; Elige la moneda.</li>
                       
                       </span><li>Ingresa tu código CIP: {{$code_payment}} y sigue los pasos.</li>
                     
                     </ol>
                     
                     
                 <p></p>
                
                
                
                
                
                
              </span>
      </td>
    
            </tr>
          </tbody>
        </table>
      </div>
    
            </div>
          </label>
        </td>
      </tr>
    
      <tr>
        <td style="padding:0px">
          <label style="font-size:13px">
            
    
    
              <input type="checkbox" style="display:none">
            
    
  
            <div><span class="im">
              
      <div>
        <table style="width:100%;border-bottom:none">
          <tbody>
            <tr>
              
      <td style="width:100%;background-color:#ffffff;color:#031017;font-size:15px;font-family:Roboto,Open Sans,Helvetica,Arial,sans-serif;padding:15px">
        ¿Cómo puedo pagar por agentes y bodegas?
      </td>
    

    
    
      <td style="padding:16px;background:#ffffff;vertical-align:middle">
        <img src="https://ci4.googleusercontent.com/proxy/GrqwG5MXW_M4bnVtTDCcKckH7VS5vvrU6HqDwecQ6i3nCJ9NaUbNsPIipHTTakmJ-A=s0-d-e1-ft#http://i.imgur.com/Xvw0vjq.png" alt="+" style="display:none;width:24px;height:24px" class="CToWUd">
        <img src="https://ci5.googleusercontent.com/proxy/AELgmMtS0HyWC9k2D3lnH4Fmlap9n6nbNk0TaJB6Glo-c-Ig0QHHbcI4D7w2dfGQVQ=s0-d-e1-ft#http://i.imgur.com/KKHenWa.png" alt="-" style="display:none;width:24px;height:24px" class="CToWUd">
      </td>
    
    
  
            </tr>
          </tbody>
        </table>
      </div>
    
      </span><div>
        <table style="width:100%;border-bottom:none">
          <tbody>
            <tr>
              
      <td style="background:#fafafa;font-size:14px;font-family:Open Sans,Helvetica,Arial,sans-serif;color:#505050;padding:15px">
        <span style="line-height:20px"><span class="im">
                 Los agentes asociados son los siguientes: 
                
                <ul>
                 <li>Express BBVA Continental</li>
                 <li>Agente BCP (*)</li>
                 <li>Agente Interbank (**)</li>
                 <li>Agente Scotiabank</li>
                 <li>Agente Kasnet</li>
                 <li>Western Union</li>
                 <li>Full Carga (***)</li>
                 <li>Agente Red Digital (****)</li>
                 <li>Perú Express-MoneyGram (*****)</li>
                 <li>Disashop (******)</li>
                </ul>
                
                  <ul style="list-style:none;font-size:13px">
                <li>(*) Agentes BCP: Brinda el código de empresa 02186.</li>
                <li>(**) Agentes Interbank: Brinda el siguiente código 2735001.</li>
                 <li>(***) Encuentra a FullCarga en Bodegas, Farmacias, Cabinas de Internet y Locutorios.</li> 
                 <li>(****) Agente Red Digital: Pagos solo en soles, horarios en función a la tienda. Comisión de S/1.00.</li>
                 <li>(*****) Perú Expres-MoneyGram: Pagos en soles y doláres, atención en Lima y Provincias </li>
                
                </ul>
                
                
                <b>Instrucciones</b> 
                
                </span><ol><span class="im">
                <li>Indica que vas realizar un pago a la empresa PAGOEFECTIVO.</li>
                </span><li>Indica el Código de Pago (CIP): <strong>{{$code_payment}}</strong> y entrega el importe a pagar.</li><span class="im">
                <li>¡Listo! Tu orden ha sido pagada.</li>
                
                </span></ol>
                
                
                
                
              </span>
      </td>
    
            </tr>
          </tbody>
        </table>
      </div>
    
            </div>
          </label>
        </td>
      </tr>
    
      <tr>
        <td style="padding:0px">
          <label style="font-size:13px">
            
    
    
              <input type="checkbox" style="display:none">
            
    
  
            <div><span class="im">
              
      <div>
        <table style="width:100%;border-bottom:none">
          <tbody>
            <tr>
              
      <td style="width:100%;background-color:#ffffff;color:#031017;font-size:15px;font-family:Roboto,Open Sans,Helvetica,Arial,sans-serif;padding:15px">
        ¿Cómo puedo pagar por banco?
      </td>
    

    
    
      <td style="padding:16px;background:#ffffff;vertical-align:middle">
        <img src="https://ci4.googleusercontent.com/proxy/GrqwG5MXW_M4bnVtTDCcKckH7VS5vvrU6HqDwecQ6i3nCJ9NaUbNsPIipHTTakmJ-A=s0-d-e1-ft#http://i.imgur.com/Xvw0vjq.png" alt="+" style="display:none;width:24px;height:24px" class="CToWUd">
        <img src="https://ci5.googleusercontent.com/proxy/AELgmMtS0HyWC9k2D3lnH4Fmlap9n6nbNk0TaJB6Glo-c-Ig0QHHbcI4D7w2dfGQVQ=s0-d-e1-ft#http://i.imgur.com/KKHenWa.png" alt="-" style="display:none;width:24px;height:24px" class="CToWUd">
      </td>
    
    
  
            </tr>
          </tbody>
        </table>
      </div>
    
      </span><div>
        <table style="width:100%;border-bottom:none">
          <tbody>
            <tr>
              
      <td style="background:#fafafa;font-size:14px;font-family:Open Sans,Helvetica,Arial,sans-serif;color:#505050;padding:15px">
        <span style="line-height:20px"><span class="im">
                Los bancos asociados son los siguientes: 
                
                <ul>
                <li>Banco BBVA Continental</li>
                <li>Banco BCP (*)</li>
                <li>Banco Interbank (**)</li>
                <li>Banco Scotiabank</li>
                <li>Banco BanBif</li> 
                <li>Caja Arequipa (***)</li>  

                
                </ul> 
                  
               <ul style="list-style:none;font-size:13px">
                <li>(*) Agencias BCP: Costo adicional S/ 1.00.</li>
                <li>(**) Agencias Money Market de Interbank: Costo adicional S/ 2.00</li> 
                 <li>(***) Caja Arequipa: Pagos en soles y doláres en horarios de L-V de 9:00 am - 6:00 pm y sábados de 9:00 am  1:00pm.</li>
                
                </ul>
                
                <b>Instrucciones</b> 
                
                </span><ol><span class="im">
                <li>Indica que vas realizar un pago a la empresa PAGOEFECTIVO.</li>
                </span><li>Indica el Código de Pago (CIP): <strong>{{$code_payment}}</strong> y entrega el importe a pagar.</li><span class="im">
                <li>¡Listo! Tu orden ha sido pagada.</li>
                
                </span></ol>
                
              </span>
      </td>
    
            </tr>
          </tbody>
        </table>
      </div>
    
            </div>
          </label>
        </td>
      </tr>
    
        </tbody>
      </table>
    
              </td>
            </tr>
          
      </tbody></table>
    
      </div>
    
          
              </td>
            </tr>
          </tbody>
        </table>
        
      </div>
      
  </td></tr></tbody></table></td></tr></tbody></table>






                <div style="background: #fff; margin: 0px 40px;">
                  <table width="100%">
                    {{--<tr>
                      <td width="20%" style="text-align: center; padding: 10px;"><img src="/images/boyfriend.png" alt="images" class="img-reponsive" style="width: 50px;"></td>
                      <td width="80%" style="text-align: center;"></td>
                    </tr>--}}
                    <tr>
                      {{--<td colspan="2" style="font-weight: 700; padding: 20px;">
                        @foreach($products as $key => $product)
                          &#8226;       Descuento de <span>{{ $product }}</span><br>
                        @endforeach
                      </td>--}}
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align: center; font-style: italic; padding: 0px 20px 10px 20px;">
                        Para realizar consultas contáctenos a {{$email}} .
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align: center; font-style: italic; padding: 0px 20px 10px 20px;">
                        Términos y Condiciones<br><br>
                        {!! $company_main->terms_and_conditions !!}
                      </td>
                    </tr>
                  </table>
                </div>
          </div>
          <div style="text-align: center;">
          	<img src="https://dl.dropboxusercontent.com/s/d8lt5e9c6acexwu/1594313884-1594313884.png?dl=0" style="width: 100%">
          </div>
         {{-- <div style="background-color: #2b2b2b; padding: 10px 0px; text-align: center;">
             
          </div>
          <div style="margin: 40px 0px;">
          	<button onclick="window.print(); void 0;" type="button" class="btn btn-cupon">Imprimir</button>
          </div>--}}
    </div>
  </body>
</html>
