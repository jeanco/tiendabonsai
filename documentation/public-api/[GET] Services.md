# Service Page

## 1. Get data services Page

```
[GET] api/services
```

### Example

#### GET

```
Link: api/services
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": {
    "cover": {
      "title": "Titulo",
      "subtitle": "subtitle",
      "imageUrl" : "/static/images/cover.jpg",
    },
    "services": [
      ...manyServices, {
        "name": "Soporte técnico",
        "description": "HTML description",
        "imageUrl": "/static/images/img.jpg",
      },
    ]
  }
}
```
