# Countries

## 1. Get Countries

```
[GET] api/countries
```

### Example

#### GET

```
Link: api/countries
```

#### Response

```
Status: 200 OK
```

```json
{
  "countries": [
    ...manyCountries, {
      "id": 1,
      "name": "Perú",
      "cities": [
        ...manyCities, {
          "id": 1,
          "name": "Tacna"
        }
      ]
    }
  ]
}
```


## 2. Get a country

```
[GET] api/countries/:id
```

### Example

#### GET

```
Link: api/countries/1
```

#### Response

```
Status: 200 OK
```

```json
{
  "name": "Perú"
}
```
