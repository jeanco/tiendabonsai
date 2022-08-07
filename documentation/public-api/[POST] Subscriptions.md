# Subscriptions

## 1. Post Subscriptions

```
[POST] api/subscriptions
```

### Example

#### POST

```
Link: api/subscriptions
```

#### Body

```json
{
    "receive_offers" : true,
    "email" : "visitante@gmail.com",
}
```

#### Response

```
Status: 201 OK
```
<!-- ### Notes:
Es obligatorio que acepte los términos y condiciones (check=true)
receive_offers: es para saber si desea recibir ofertas (true) o si lo deja vacío es false
email es obligatorio
-->
