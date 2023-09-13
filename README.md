# Currency Exchange Rates API

This is a basic API for currency exchange rates, providing rates for USD, EUR, and GBP. You can test this API using [Postman](https://www.postman.com).

## Installation

To run this API, you will need:

- Docker

Start Docker containers:

```bash
docker-compose up
```

Seed the database:

```bash
docker exec -ti kgr-app bash
php artisan db:seed
```

## API Endpoints

### Authentication/Token Generation

```http
POST {url}/api/v1/auth
```

| Parameter  | Type     | Description           |
| :--------- | :------- | :-------------------- |
| `email`    | `string` | **Required**. Email   |
| `password` | `string` | **Required**. Password|

### Add Exchange Rate

```http
POST {url}/api/v1/dodajKurs
```

| Parameter  | Type     | Description              |
| :--------- | :------- | :----------------------- |
| `currency` | `enum`   | **Required**. Currency   |
| `date`     | `string` | **Required**. Date       |
| `amount`   | `string` | **Required**. Amount     |

### Retrieve Exchange Rates

```http
GET /api/v1/pobierzKursy?date={date}&currency={currency}
```

| Parameter  | Type     | Description              |
| :--------- | :------- | :----------------------- |
| `date`     | `string` | **Required**. Date       |
| `currency` | `enum`   | Currency (optional)      |

Please note that all API requests must be authenticated using the token obtained from the `/api/v1/auth` endpoint.

Feel free to replace `{url}` with the actual URL where the API is hosted.
