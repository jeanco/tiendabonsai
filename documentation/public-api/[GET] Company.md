# Company

## 1. Get data company

```
[GET] api/company
```

### Example

#### GET

```
Link: api/company
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": {
    "name": "Nombre comercial - Marca",
    "slogan": "Slogan de la Marca",
    "legalName": "Razón Social",
    "logoUrl": "/static/images/logo.png",
    "whiteLogoUrl": "/static/images/logowhite.png",
    "facebookPage": "https://www.facebook.com/NoveltiePeru",
    "twitterPage": "https://twitter.com/NoveltiePeru",
    "googlePage": "https://plus.google.com/NoveltiePeru",
    "youtubePage": "https://www.youtube.com/8NoveltiePeru",
    "instagramPage": "https://instagram.com/NoveltiePeru",
    "address": "Urb. Eduardo Pérez Gamboa Mz. D lote 03 TACNA-PERÚ",
    "schedule": "Todos los días de Lunes a Domingo",
    "cellphone": "+51 952949785",
    "phone": "052 ",
    "email": "servicios@noveltie.la",
    "covers": [
      ...manyCovers, {
        "link": "https://wwww.noveltie.la",
        "isBlank" : true,
        "title": "Título para el Seo",
        "imageUrl": "/static/images/post1.jpg",
        "imageThumbUrl": "/static/images/post1.jpg",
      }
    ]
  }
}
```
