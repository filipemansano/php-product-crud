---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost:8000/docs/collection.json)

<!-- END_INFO -->

#Category management


APIs for managing categorys
<!-- START_6a107a131f853e92450ac742beba0e7f -->
## Display a listing of categorys.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 2,
        "name": "ff"
    },
    {
        "id": 1,
        "name": "limpeza"
    }
]
```

### HTTP Request
`GET categories`


<!-- END_6a107a131f853e92450ac742beba0e7f -->

<!-- START_cb37a009c57f6e054e721aada4d9664b -->
## Store a newly Category.

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Limpeza"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Limpeza"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST categories`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Name of Category.
    
<!-- END_cb37a009c57f6e054e721aada4d9664b -->

<!-- START_2faf9b4a45fb74aaab67aee0839bbe8c -->
## Display the specified Category.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "limpeza"
}
```

### HTTP Request
`GET categories/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the Category.

<!-- END_2faf9b4a45fb74aaab67aee0839bbe8c -->

<!-- START_f68062911e1d728f653468f66bc25c41 -->
## Update the specified Category.

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Limpeza"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Limpeza"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT categories/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | required The ID of the Category.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Name of Category.
    
<!-- END_f68062911e1d728f653468f66bc25c41 -->

<!-- START_eb72a31926ee8d34b59fc879305045af -->
## Remove the specified Category.

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE categories/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | required The ID of the Category.

<!-- END_eb72a31926ee8d34b59fc879305045af -->

#Product management


APIs for managing products
<!-- START_fcdf2da1997bd4d8d126f782bc06524c -->
## Display a listing of products.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "name": "Sabão em Po",
        "quantity": 2,
        "category_id": 1,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "name": "xxxxx",
        "quantity": 10,
        "category_id": 2,
        "created_at": "2021-05-04T04:09:21.000000Z",
        "updated_at": "2021-05-04T04:57:26.000000Z"
    }
]
```

### HTTP Request
`GET products`


<!-- END_fcdf2da1997bd4d8d126f782bc06524c -->

<!-- START_e69e3804fa0af1eb523e480d661362b7 -->
## Store a newly product.

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Sab\u00e3o em P\u00f3","quantity":2,"category_id":1}'

```

```javascript
const url = new URL(
    "http://localhost:8000/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Sab\u00e3o em P\u00f3",
    "quantity": 2,
    "category_id": 1
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST products`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Name of product.
        `quantity` | integer |  required  | The id of the user.
        `category_id` | integer |  required  | The id of category.
    
<!-- END_e69e3804fa0af1eb523e480d661362b7 -->

<!-- START_547b29e3a8539bdfabf82483c7e38d0c -->
## Display the specified product.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "Sabão em Po",
    "quantity": 2,
    "category_id": 1,
    "created_at": null,
    "updated_at": null
}
```

### HTTP Request
`GET products/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the product.

<!-- END_547b29e3a8539bdfabf82483c7e38d0c -->

<!-- START_e97aede38211ba5ab994d5e2ffccbf0e -->
## Update the specified product.

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Sab\u00e3o em P\u00f3","quantity":2,"category_id":1}'

```

```javascript
const url = new URL(
    "http://localhost:8000/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Sab\u00e3o em P\u00f3",
    "quantity": 2,
    "category_id": 1
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT products/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | required The ID of the product.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Name of product.
        `quantity` | integer |  required  | The id of the user.
        `category_id` | integer |  required  | The id of category.
    
<!-- END_e97aede38211ba5ab994d5e2ffccbf0e -->

<!-- START_d353bf81f5bc72b2ddb5406dc319f4eb -->
## Remove the specified product.

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE products/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | required The ID of the product.

<!-- END_d353bf81f5bc72b2ddb5406dc319f4eb -->


