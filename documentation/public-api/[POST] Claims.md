# CLAIMS
----

## 1. [POST] CLAIMS

### PATH

  ```javascript
  `/api/claims`
  ```

  * #### Method: `POST`

### REQUEST

  * #### Content:

  ```json
    {
      "person": {
        "fullname": " *requerido ",
        "phone": " *requerido",
        "otherPhone": "(opcional)",
        "address": "(opcional)",
        "reference": "Referencia (opcional)",
        "district": "*requerido",
        "province": "*requerido",
        "region": "*requerido",
        "documentType": "(opcional)",
        "identityDocument": "*requerido",
        "email": "",
      },
      "amount": "(opcional) Monto del bien objeto de Reclamo",
      "itemOptionId": 1,
      "descriptionItem": "*requerido",
      "paymentVoucher": "Comprobante de Pago (opcional)",
      "claimOptionId": 1,
      "details": "*requerido Detalle del Reclamo",
      "order": "(opcional) Pedido del Consumidor",
      "aboutProvider": "(opcional) Sobre las acciones del proveedor",
    }
  ```



### RESPONSE

  * #### Success:

    __Code:__ 200 OK <br />
    __Content:__

    ```json
    {
      "success": true,
      "title": "Reclamación realizada",
      "message": "Se envió correctamente su reclamo, nos pondremos en contato. Gracias",
    }
    ```


  * #### Error:

    __Code:__ 403 - FORBIDDEN <br />
    __Description:__ Si el usuario esta deshabilitado


<!-- ### Notes: -->

### Notes:

  claimOptionId es la opción de reclamo, 1=Reclamo, 2=Queja, 3=Consulta
  itemOptionId es el tipo de bien contratado, 1=Producto, 2=servicios
