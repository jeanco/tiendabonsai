# Currencies

## 1. Get currencies

```
[GET] api/currencies
```

### Example

#### GET

```
Link: api/currencies
```

#### Response

```
Status: 200 OK
```

```json
{
  "currencies": [
    ...manyCurrencies, {
      "id": 1,
      "name": "Soles",
      "code": "PEN",
      "symbol": "S/.",
      "exchangeRate": 1,
      "default": true,
      "decimal": false
    }
  ]
}
```

<!-- ### Notes:
default = moneda por defecto que usará la tienda online
-->
