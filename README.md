# sas-backend-task

1. Make a copy from the `.env.example` and rename it as `.env`.
2. Create an empty file within the `database` directory named `database.sqlite`.
3. Update `.env` with database absolute path.
4. Install the dependencies:

    ```composer install```
5. Create the database tables:

    ```php artisan migrate```
6. Run the database seeder:

    ```php artisan db:seed```
7. Start the application:

    ``` php artisan serve ```

## Authentication
### Login:
```bash
curl 'http://localhost:8000/api/login' -H 'Content-type:application/json' -d '{"email": "test@example.com", "password": "password"}'
```
### Logout:
```bash
curl 'http://localhost:8000/api/logout' -H 'Content-type:application/json'
```
## Books
### Create a book:
```bash
curl 'http://localhost:8000/api/books' -H 'Accept: application/json' -H 'Content-type:application/json' -H 'Authorization: Bearer 1|ljgfAJKlJbLc6viEq799lTtDCnP1zx4uEI9YbIh4bb1a2b6c' -d '{"name": "book 1", "isbn": 123, "value": 10}'
```
### Read a book:
```bash
curl 'http://localhost:8000/api/books/66140236697da' -H 'Accept: application/json' -H 'Content-type:application/json' -H 'Authorization: Bearer 1|ljgfAJKlJbLc6viEq799lTtDCnP1zx4uEI9YbIh4bb1a2b6c'
```
### Update a book:
```bash
curl -X 'PUT' 'http://localhost:8000/api/books/66140236697da' -H 'Accept: application/json' -H 'Content-type:application/json' -H 'Authorization: Bearer 1|ljgfAJKlJbLc6viEq799lTtDCnP1zx4uEI9YbIh4bb1a2b6c' -d '{"name": "book edit"}'
```
### Delete a book:
```bash
curl -X 'DELETE' 'http://localhost:8000/api/books/66140236697da' -H 'Accept: application/json' -H 'Content-type:application/json' -H 'Authorization: Bearer 1|ljgfAJKlJbLc6viEq799lTtDCnP1zx4uEI9YbIh4bb1a2b6c'
```
## Stores
### Create a store:
```bash
curl 'http://localhost:8000/api/stores' -H 'Accept: application/json' -H 'Content-type:application/json' -H 'Authorization: Bearer 1|ljgfAJKlJbLc6viEq799lTtDCnP1zx4uEI9YbIh4bb1a2b6c' -d '{"name": "store A", "address": "123 Street Avenue"}'
```
### Read a store:
```bash
curl 'http://localhost:8000/api/stores/66140e9760c89' -H 'Accept: application/json' -H 'Content-type:application/json' -H 'Authorization: Bearer 1|ljgfAJKlJbLc6viEq799lTtDCnP1zx4uEI9YbIh4bb1a2b6c'
```
### Update a store:
```bash
curl -X 'PUT' 'http://localhost:8000/api/stores/66140e9760c89' -H 'Accept: application/json' -H 'Content-type:application/json' -H 'Authorization: Bearer 1|ljgfAJKlJbLc6viEq799lTtDCnP1zx4uEI9YbIh4bb1a2b6c' -d '{"name": "store edit"}'
```
### Delete a store:
```bash
curl -X 'DELETE' 'http://localhost:8000/api/stores/66140e9760c89' -H 'Accept: application/json' -H 'Content-type:application/json' -H 'Authorization: Bearer 1|ljgfAJKlJbLc6viEq799lTtDCnP1zx4uEI9YbIh4bb1a2b6c'
```
## Stores' books
### Link a book to a store:
```bash
curl -X 'POST' 'http://localhost:8000/api/stores/66140e9760c89/661401d463b38' -H 'Accept: application/json' -H 'Content-type:application/json' -H 'Authorization: Bearer 1|ljgfAJKlJbLc6viEq799lTtDCnP1zx4uEI9YbIh4bb1a2b6c'
```
### Unlink a book from a store
```bash
curl -X 'DELETE' 'http://localhost:8000/api/stores/66140e9760c89/661401d463b38' -H 'Accept: application/json' -H 'Content-type:application/json' -H 'Authorization: Bearer 1|ljgfAJKlJbLc6viEq799lTtDCnP1zx4uEI9YbIh4bb1a2b6c'
```
