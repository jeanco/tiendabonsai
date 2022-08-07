# Items

## 1. Get items

```
[GET] api/items?category=slug&subcategory=slug&promotion=false
```

### Example

#### GET

```
Link: api/items?page=1&category="catetegory-slug"&subcategory="catetegory-slug"&atributtes[0]=1&pricesRange=1&orderBy=1&promotion=true
```

```json
{
 "params": {
    "category": "catetegory-slug",
    "subcategory": "subcategory-slug",
    "page" : 1,
    "orderBy": 1,
    "pricesRange": 1,
    "atributtes": [2],
 }
}
```
<!-- ### Notes:
page = pagination laravel (9 items).
atributtes = array de atributos que el usuario selecciona para filtrar el catálogo de productos. Ejm. Ver productos en la Marca LG, Capacidad 100 Wats, Color Plomo.
pricesRange = es el rango para filtrar por price products_table
orderBy = son las opciones de ordenamiento para el catálogo de productos a continuación los id:
  1 = Relevancia (listar productos ordenados ASC de los productos destacados más recientes outstanding=true)
  2 = Precio Menor (listar productos ordenados ASC del precio menor al mayor)
  3 = Precio Mayor (listar productos ordenados ASC del precio mayor al menor)
  4 = Marca (listar productos por orden alfabetico de las marcas)
-->

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    ...manyItems, {
      "id": 2,
      "slug": "nombre-del-producto",
      "name": "Nombre del producto",
      "imageUrl": "/static/images/producto1.jpg",
      "imageThumbUrl": "/static/images/producto1.jpg",
      "price": 99.90,
      "stock": 9,
      "promotion": {
        "flag": true,
        "price": 89,
        "imageUrl": "/static/images/etiqueta.jpg"
      }
    }
  ]
}
```

## 2. Get a item

```
[GET] api/items/:slug
```

### Example

#### GET

```
Link: api/items/nombre-del-item
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": {
    "id": 1,
    "description": "Descripción en HTML",
    "categoryName": "Nombre de la categoria",
    "subcategoryName": "Nombre de la subcategoria",
    "itemName": "Nombre del item",
    "price": 99.90,
    "slug": "nombre-del-item",
    "description": "Descripción en HTML",
    "features": "Características en HTML",
    "specifications": "Detalles especificaciones en HTML",
    "stock": 20,
    "video": "YISWRT-A",
    "promotion": {
      "flag": true,
      "price": 89.50,
      "percentage": 30,
      "imageUrl": "/static/images/etiqueta.jpg"
    },
    "images": [
      ...manyImages, {
        "id": 1,
        "urlThumb": "/static/images/producto1.png",
        "url": "/static/images/producto1.png",
      }
    ],
  },
}
```

## 3. Get items related

```
[GET] api/items/:slug/related
```

### Example

#### GET

```
Link: api/items/nombre-del-item/related
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    ...manyItems, {
      "id": 1,
      "imageUrl": "/static/images/producto1.jpg",
      "imageThumbUrl": "/static/images/producto1.jpg",
      "name": "Cocina",
      "slug": "cocina",
      "price": 2000,
      "stock": 2,
      "promotion": {
        "flag": false,
        "price": 1800,
        "imageUrl": "/static/images/etiqueta.jpg"
      },
    }
  ]
}

```
## 4. Get cart items

```
[GET] api/items/cart?q[0]=1&q[1]=2
```

### Example

#### GET

```
Link: api/items/cart?q[0]=1&q[1]=2
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    ...manyItems, {
      "name": "Producto 1",
      "slug": "producto-1",
      "imageUrl": "/static/images/producto1.jpg",
      "price": 20,
      "stock": 10,
      "promotion": {
        "flag": true,
        "price": 10,
        "imageUrl": "/static/images/etiqueta.jpg"
      }
    }
  ]
}
```

## 5. Get items search

```
[GET] api/items/search?q="text"
```

### Example

#### GET


```
Link: api/items/search?q=refrigeradoras
```

```json
{
 "params": {
   "q": "refrigeradoras",
 }
}
```
<!-- ### Notes:
q = texto que debe filtrar por nombre, resumen y descripción del item.
-->

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    ...manyItems, {
      "name": "Princesa Matrona",
      "slug": "princesa-matrona",
      "imageThumbUrl": "/static/images/producto1.jpg",
    }
  ]
}
```

## 6. Get Outstanding Items

```
[GET] api/items/outstanding
```

### Example

#### GET

```
Link: api/items/outstanding
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    {
      "name": "Electrodomesticos",
      "description": "Descubre los Electrodomesticos de calidad",
      "items": [
        {
          "id": 1,
          "imageUrl": "/static/images/producto1.jpg",
          "imageThumbUrl": "/static/images/producto1.jpg",
          "name": "Cocina",
          "slug": "cocina",
          "price": 2000,
          "stock": 2,
          "promotion": {
            "flag": false,
            "price": 1800,
            "imageUrl": "/static/images/etiqueta.jpg"
          },
        }
      ]
    },
    {
      "name": "Cocinas",
      "description": "Descubre las mejores Cocinas de calidad",
      "items": [
        {
          "id": 1,
          "imageUrl": "/static/images/producto1.jpg",
          "imageThumbUrl": "/static/images/producto1.jpg",
          "name": "Cocina",
          "slug": "cocina",
          "price": 2000,
          "promotion": {
            "flag": false,
            "price": 1800,
            "imageUrl": "/static/images/etiqueta.jpg"
          },
        }
      ]
    }
  ]
}
```

<!-- ### Notes:
Se devuelve los 6 ultimos items con outstanding=true, agrupados por categorías.
-->

## 7. Get offer items

```
[GET] api/items/offers
```

### Example

#### GET

```
Link: api/items/offers?screen=1360
```

#### Response

```
Status: 200 OK
```

```json
{
  "data": [
    [
      ...manyItems, {
        "offerTitle": "Refrigeradoras al 20% de descuento solo hoy",
        "itemSlug": "refrigeradora-daewo",
        "imageThumbUrl": "/static/images/offer.jpg",
      }
    ]
  ]
}
```
<!-- ### Notes:
Devolver los 10 últimos productos con ofertas publicadas para el home,
agrupados en 5,
outstanding_promotion = true on products_table and
promotion_available = true as well.
-->
