# Posts

## 1. Get Posts

```
[GET] api/posts
```
```json
{
  "params": {
    "page": 1,
    "postTagId": 1
  }
}
```

### Example

#### GET

```
Link: api/posts?page=1&postTagId=0
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    ...manyPosts, {
      "slug": "titulo-del-post",
      "title": "titulo del post",
      "content": "contenido del post solo 150 caracteres",
      "imageUrl": "/static/images/producto1.png",
      "date": "2016-12-12",
      "tagName": "Eventos"
    }
  ]
}
```


### 2. Get a post

```
[GET] api/posts/:slug
```

### Example

#### GET

```
Link: api/posts/titulo-del-post
```

#### Response

```
Status: 200 OK
```

```json
{
  "post": {
    "slug": "titulo-del-post",
    "title": "titulo del post",
    "content": "contenido del post",
    "date": "2016-12-12",
    "videoId": "30BrqzGavjQ",
    "tagName": "Eventos",
    "images": [
      {
        "url": "/static/images/producto1.png",
        "urlThumb": "/static/images/producto1.png"
      }
    ]
  }
}
```


### 3. Get post related

```
[GET] api/posts/:slug/related
```

### Example

#### GET

```
Link: api/posts/post-x/related
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    ...manyPosts, {
      "slug": "titulo-del-post",
      "title": "titulo del post",
      "tagName": "Eventos",
      "date": "2016-12-12",
      "content": "contenido del post solo 150 caracteres",
      "imageUrl": "/static/images/producto1.png",
    }
  ]
}
```


### 4. Get last posts

```
[GET] api/posts/last
```

### Example

#### GET

```
Link: api/posts/last
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    ...manyPosts, {
      "slug": "titulo-del-post",
      "title": "titulo del post",
      "tagName": "Eventos",
      "date": "2016-12-12",
      "content": "contenido del post solo 150 caracteres",
      "imageUrl": "/static/images/producto1.png",
    }
  ]
}
```
