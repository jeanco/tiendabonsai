# Boyfriends Club

## 1. Get data Boyfriends Club

```
[GET] api/boyfriends-club
```

### Example

#### GET

```
Link: api/boyfriends-club
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": {
    "cover": {
      "title": "[HTML] Planeas tu boda?",
      "subtitle": "[HTML] Esto es para ti",
      "backgroundUrl" : "/static/images/cover.jpg",
      "backgroundUrlThumb" : "/static/images/cover.jpg",
    },
    "about": {
      "title": "[HTML] Club de Novios",
      "description": "[HTML] Este programa consiste en...",
      "imageUrl" : "/static/images/image.jpg",
    },
    "inscription": {
      "title": "[HTML] Inscribete en Club de Novios",
      "description": "[HTML] Este programa consiste en...",
      "backgroundUrl" : "/static/images/image.jpg",
    },
    "gallery": [
      ...manyGallery, {
        "imageUrl": "/static/images/post1.jpg",
        "imageThumbUrl": "/static/images/post1.jpg",
      }
    ]
  }
}
```
