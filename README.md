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
CREATE: /user
READ: /user/:id
UPDATE: /user/:id
DELETE: /user/:id

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

