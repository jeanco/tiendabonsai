# Accounts

## 1. Get Accounts

```
[GET] api/accounts
```

### Example

#### GET

```
Link: api/accounts
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    {
      "id": 1,
      "name": "En Efectivo",
      "entities": [
        {
          "id": 1,
          "currencyId": 1,
          "title": "Pago Contra Entrega en Tienda",
          "logoUrl": "",
          "accountInfo": "[HTML] ",
          "instructions":"[HTML] Acercarse a la Tienda Av. San Martin",
          "propietary": "",
          "propietaryDocument": "",
        }
      ]
    },
    {
      "id": 2,
      "name": "Depósito o Transferencia Bancaria",
      "entities": [
        {
          "id": 2,
          "currencyId": 1,
          "title": "Cuenta Corriente BCP",
          "logoUrl": "static/images/bank-logo.png",
          "accountInfo": "[HTML] Nro: 540-303460235 <br>",
          "instructions":"[HTML] Al realizar depósito debe enviar voucher al correo..",
          "propietary": "",
          "propietaryDocument": "",
        }
      ]
    },
    {
      "id": 3,
      "name": "Por Giros o Envíos de Dinero",
      "entities": [
        {
          "id": 3,
          "currencyId": 1,
          "title": "Western Union",
          "logoUrl": "static/images/logo.png",
          "accountInfo": "",
          "instructions":"[HTML] Al realizar el giro debe enviar voucher al correo..",
          "propietary": "Datos de la Persona",
          "propietaryDocument": "99999999",
        }
      ]
    }
  ]
}
```

#### Notes
```
id = 1 En Efectivo, sólo mostrar el title, instructions
id = 2 Depósito, debe mostrar el title, logoUrl, accountInfo, instructions
id = 3 Giros o Envíos de Dinero, debe mostrar, title, logoUrl, instructions, propietary, propietaryDocument

```
