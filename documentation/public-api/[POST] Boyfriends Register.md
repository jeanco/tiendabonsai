# BOYFRIENDS REGISTER
----

## 1. [POST] BOYFRIENDS REGISTER

### PATH

  ```javascript
  `/api/boyfriends-register`
  ```

  * #### Method: `POST`

### REQUEST

  * #### Content:

  ```json
    {
      "recaptcha": ,
      "girlfriend": {
        "fullname": "*requerido",
        "identityDocument": "*requerido",
        "cellphone": "*requerido",
        "email": "*requerido",
        "address": "(opcional)",
        "birthday": "(opcional)",
      },
      "boyfriend": {
        "fullname": "*requerido",
        "identityDocument": "*requerido",
        "cellphone": "*requerido",
        "email": "*requerido",
        "address": "(opcional)",
        "birthday": "(opcional)",
      },
      "address": "Dirección de la boda (opcional)",
      "hour": "Hora de la Boda (opcional)",
      "date": "Fecha de la Boda *requerido",
    }
  ```



### RESPONSE

  * #### Success:

    __Code:__ 200 OK <br />
    __Content:__

    ```json
    {
      "success": true,
      "title": "Bienvenid@s",
      "message": "Ya se encuentran registrados en el Club de Novios, nos pondremos en contato. Gracias",
    }
    ```


  * #### Error:

    __Code:__ 403 - FORBIDDEN <br />
    __Description:__ Si el usuario esta deshabilitado


<!-- ### Notes: -->

### Notes:

  girlfriend son los datos de la novia
  boyfriend son los datos del novio
