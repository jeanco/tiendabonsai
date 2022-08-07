# About

## 1. Get data about

```
[GET] api/about
```

### Example

#### GET

```
Link: api/about
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": {
    "cover": {
      "title": "[HTML] Kamasa ¡mejora tu casa!",
      "summary": "Brindando una gran variedad de productos",
      "backgroundUrl" : "/static/images/cover.jpg",
      "backgroundUrlThumb" : "/static/images/cover.jpg",
    },
    "aboutUs": {
      "description": "[HTML] Somos una empresa",
      "imageUrl" : "/static/images/image.jpg",
      "backgroundUrl" : "/static/images/image.jpg",
    },
    "visionImageUrl": "/static/images/vision.jpg",
    "vision": "Nuestra vision es...",
    "mission": "Nuestra mision es...",
    "missionImageUrl": "/static/images/vision.jpg",
    "firstHistory": {
      "title": "[HTML] Los inicios!",
      "description": "[HTML] Iniciamos la creación de la empresa",
      "imageUrl" : "/static/images/image.jpg",
      "backgroundUrl" : "/static/images/image.jpg",
    },
    "secondHistory": {
      "title": "[HTML] Seguimos creciendo!",
      "description": "[HTML] Decidimos expandir nuestras tiendas",
      "backgroundUrl" : "/static/images/image.jpg",
    },
    "values": [
      ...manyValues, {
        "name": "Responsabilidad",
        "imageUrl": "/static/images/value.png",
        "description": "[HTML] El Valor es..."
      },
    ],
    "jobsDescription": "Descripción de trabajos",
    "gallery": [
      ...manyGallery, {
        "imageUrl": "/static/images/post1.jpg",
        "imageThumbUrl": "/static/images/post1.jpg",
      }
    ]
  }
}
```
