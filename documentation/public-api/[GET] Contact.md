# Contact Page

## 1. Get data contact page

```
[GET] api/contact
```

### Example

#### GET

```
Link: api/contact
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": {
    "coverImageUrl" : "/static/images/cover.jpg",
    "info": "[HTML] Info adicional para la pagina contactanos",
    "schedule": "Todos los días de Lunes a Domingo",
    "phone": "052 ",
    "location": {
      "latitude": -20.0235035,
      "longitude" : 20.0235035,
    },
  }
}
```
