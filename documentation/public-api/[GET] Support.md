# Support Page

## 1. Get data support Page

```
[GET] api/support
```

### Example

#### GET

```
Link: api/support
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": {
    "coverImageUrl" : "/static/images/cover.jpg",
    "support": {
      "title": "titulo",
      "description": "[HTML] Soporte consiste en...",
      "imageUrl" : "/static/images/image.jpg",
    },
    "callCenter": {
      "title": "Comunícate con la Marca",
      "info": "[HTML] comunicate...",
      "brands": [
        {
          "name": "LG",
          "imageUrl": "/static/images/logo.png",
          "address" : "Av. Tacna",
          "callCenter" : "0-800",
          "phone" : "052"
        }
      ]
    },
    "services": [
      ...manyServices, {
        "name": "Servicio técnico exclusivo",
        "backgroundColor": "code color hexadecimal",
        "description": "[HTML] El servicio es..."
      },
    ],
    "frequentQuestions": [
      ...manyfrequentQuestions, {
        "question": "Quienes somos?",
        "answer": "[HTML] Somos profesionales de calidad..."
      },
    ]
  }
}
```
