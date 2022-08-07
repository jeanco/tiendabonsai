# Orders

## 1. Get a order

```
[GET] api/orders/:uuid
```

### Example

#### GET

```
Link: api/orders/4444-4444-4444
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    "order": {
      "code": "OP-001",
      "date": "2017-02-05",
      "status": "Pendiente",
      "operation": "Pedido",  
    },
    "items": [
      ...manyItems {
        "name": "V-Mariposa",
        "currencyId": 1,
        "price": 10,
        "quantity": 10
      }
    ],
    "person": {
      "cellphone": "995 321 632",
      "email": "correo@gmail.com",
      "name": "Maria Espinoza Ramos",
      "region": "Tacna",
      "address": "Tacna Centro X-28, Tacna-Perú"
    }
  ]
}
```
