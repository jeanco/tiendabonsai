# Orders

## 1. Post a Order

```
[POST] api/orders
```

### Example

#### POST

```
Link: api/orders
```

#### Response

```
Status: 200 OK
```

```json
{
    "is_separated" : true,
    "account_id" : 5,
    "currency_id": 1,
    "person" : {
        "identity_document" : "25875456",
        "first_name" : "My First Name",
        "last_name" : "My Lastname",
        "email" : "miemail@mail.com",
        "birthday": "8 de junio",
        "country_id" : 2,
        "city_id" : 4,
        "whatsapp" : "+51 963258700",
        "address": "Algun lugar",
    },
    "items" : [
        {
            "quantity" : 10,
            "item_id" : 4,
        },
        {
            "quantity" : 5,
            "item_id" : 11,
        },
        {
            "quantity" : 5,
            "item_id" : 9,
        }
    ]
}
```

### Notes:

is_separated = Si es una orden a separar (enviar true), caso contrario false
