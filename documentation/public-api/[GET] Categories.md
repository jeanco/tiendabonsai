# Categories

## 1. Get categories

```
[GET] api/categories
```

### Example

#### GET

```
Link: api/categories
```

#### Response

```
Status: 200 OK
```

```json
{
  "categories": [
    ...manyCategories, {
      "id": 1,
      "description": "category description",
      "name": "name category",
      "slug": "name-category",
      "iconUrl": "/static/images/icon1.png",
      "whiteIconUrl": "/static/images/icon1.png",
      "subcategories": [
        ...manySubCategories, {
          "id": 1,
          "description": "subcategory description",
          "name": "name subcategory",
          "slug": "name-subcategory",
          "imageUrl": "/static/images/oferta1.png",
        }
      ]
    }
  ]
}
```
<!-- ### Notes:
Devolver las categorías públicas con subcategorías públicas e items públicos
-->

## 2. Get Outstanding Categories

```
[GET] api/categories/outstanding
```

### Example

#### GET

```
Link: api/categories/outstanding
```

#### Response

```
Status: 200 OK
```

```json
{
  "categories": [
    ...manyCategories, {
      "id": 1,
      "name": "name category..",
      "slug": "name-category",
      "whiteIconUrl": "/static/images/icon1.png",
      "iconUrl": "/static/images/icon1.png",
    }
  ]
}
```
<!-- ### Notes:
Se devuelve los 8 ultimos categories con outstanding=true.
Frontend: el name devolver recortado a 12 caracteres, si supera la cantidad debe cortarse a 10 caracteres y concatenar ..
-->
