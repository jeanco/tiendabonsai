# Attributes

## 1. Get all attributes

```
[GET] api/attributes?category=slug&subcategory=slug
```

### Example

#### GET

```
Link: api/attributes?category="category-slug"&subcategory="subcategory-slug"
```

```json
{
 "params": {
    "category": "catetegory-slug",
    "subcategory": "subcategory-slug",
 }
}
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    {
      "name": "Marca",
      "values": [
        {
          "id": 1,
          "name": "LG"
        },
        {
          "id": 2,
          "name": "Samsung"
        }
      ]
    },
    {
      "name": "Tamaño",
      "values": [
        {
          "id": 3,
          "name": "Pequeño"
        },
        {
          "id": 4,
          "name": "Grande"
        }
      ]
    }
  ]
}
```
