# 📕 Bookine
## 🌟 What is `Bookine` ?
`Bookine`​ is your next Books manager API.

`Bookine` allows you to create, get, modify and delete the books in your own library.

## 📝 How to setup `Bookine` ?
Starts by cloning the repo
```git clone https://www.github.com/code-nuage/bookine && cd bookine```

Starts the docker container with `docker-compose`
```docker-compose up -d```

You can use the API at :80 and PhyMyAdmin at :8090

## 💭 How to use `Bookine` ?
`Bookine` is CRUD complete. Every item types could be Created, Read, Updated and Deleted.

An exemple of each type is listed here : 

#### Users
##### Endpoints
CREATE: /users
READBYID: /users/:id
READALL: /users
UPDATE: /users/:id
DELETE: /users/:id

##### Expected incoming data

```json
{
    "username": "(STRING) username",
    "firstname": "(STRING) firstname",
    "lastname": "(STRING) lastname",
    "role": "(ENUM) (USER | ADMIN)",
    "password": "(STRING) password"
}
```

##### Returned data
```json
{
    "id": "(INTEGER) id",
    "username": "(STRING) username",
    "firstname": "(STRING) firstname",
    "lastname": "(STRING) lastname",
    "role": "(ENUM) (USER | ADMIN)",
    "password": "(STRING) hased password",
    "created_at": "(TIMESTAMP) time where the user was created"             
} 
```

#### Loans
##### Endpoints
CREATE: /loan
READBYID: /loan/:id
READALL: /loans
UPDATE: /loan/:id
DELETE: /loan/:id

##### Expected incoming data

```json
{
    "user_id": "(INT) user id",
    "book_id": "(INT) book id",
    "loaned_at": "(TIMESTAMP) time when the book has been loaned",
    "return_at": "(TIMESTAMP) time when the book should be returned"
}
```

##### Returned data
```json
{
    "id": "(INTEGER) id",
    "user_id": "(INT) user id",
    "book_id": "(INT) book id",
    "loaned_at": "(TIMESTAMP) time when the book has been loaned",
    "return_at": "(TIMESTAMP) time when the book should be returned",
    "returned_at": "(TIMESTAMP) time when the book has been returned (if it is)",
    "created_at": "(TIMESTAMP) time where the loan was created"             
} 
```

#### Books
##### Endpoints
CREATE: /book
READBYID: /book/:id
READALL: /books
UPDATE: /book/:id
DELETE: /book/:id

##### Expected incoming data

```json
{
    "isbn": "(INT) book unique identificator",
    "title": "(STRING) title",
    "author": "(STRING) author",
    "published_at": "(DATE) date when the book was published",
    "category": "(INT) category"
}
```

##### Returned data
```json
{
    "id": "(INTEGER) id",
    "isbn": "(INT) book unique identificator",
    "title": "(STRING) title",
    "author": "(STRING) author",
    "published_at": "(DATE) date when the book was published",
    "category": "(INT) category",
    "created_at": "(TIMESTAMP) time where the book was created"             
} 
```
