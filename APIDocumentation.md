# API Documentation

This application does not have any authentication implemented.

## Author 

### Create Author

#### HTTP Request
```
[POST] {baseUrl}/author
```

#### Request body
| Name | Value |
|:-----|:------|
| name | string

#### Sample Response

##### success 
```
{
    "id": 1,
    "name": "TestAuthor",
    "createdAt": "2017-07-31"
}
```
##### error
```
{
    "name": [
        "The name field is required."
    ]
}
```


## Article

### Create Article

#### HTTP Request
```
[POST] {baseUrl}/article
```
#### Request body
| Name | Value |
|:-----|:------|
| title | string
| author_id | int |
| content | string |

#### Sample Response

##### success 
```
{
    "id": 1,
    "title": "Title",
    "author": "John",
    "summary": "Sample content",
    "url": "/article/1",
    "createdAt": "2017-07-31"
}
```
##### error
```
{
    "title": [
        "The title field is required."
    ],
    "author_id": [
        "The author id field is required."
    ],
    "content": [
        "The content field is required."
    ]
}
```

### List All Articles

#### HTTP Request
```
[GET] {baseUrl}/article
```
#### Request body
Do not supply a request body with this method.

#### Sample Response

##### success 
```
[
    {
        "id": 1,
        "title": "Test one",
        "author": "John",
        "summary": "Test content",
        "url": "/article/1",
        "createdAt": "2017-07-31"
    },
    {
        "id": 2,
        "title": "Test two",
        "author": "John",
        "summary": "Test content",
        "url": "/article/2",
        "createdAt": "2017-07-31"
    },
]
```
##### error
```
```