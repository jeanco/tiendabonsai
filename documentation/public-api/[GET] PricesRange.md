# Prices Range

## 1. Get all Prices Range

```
[GET] api/prices-range?category=slug&subcategory=slug
```

### Example

#### GET

```
Link: api/prices-range?category=category-slug&subcategory=subcategory-slug
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    {
      "id": 1,
      "name": "1 - 199",
      "startingPrice": 1,
      "endingPrice": 199,
    },
    {
      "id": 2,
      "startingPrice": 199,
      "endingPrice": 999,
      "name": "199 - 999"
    },
  ]
}
```
