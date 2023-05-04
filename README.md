
# Kursy walut API
Podstawowe api dla kursów walut w USD, EUR, GBP.

Narzędzia użyte do testowania to [Postman](https://www.postman.com).



## Instalacja

Uruchomienie wymaga:
- docker

Odpalenie dockera
```bash
  docker-compose up
```

Seedowanie bazy danych
```bash
  docker exec -ti kgr-app bash
  php artisan db:seed
```
    
## API

#### Logowanie/autoryzacji/uzyskania tokenu

```http
  POST {url}/api/v1/auth
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required**. Email |
| `password`      | `string` | **Required**. Hasło |

#### Dodanie kursu

```http
  POST {url}/api/v1/dodajKurs
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `currency` | `enum` | **Required**. Waluta |
| `date` | `string` | **Required**. Data kursu|
| `amount` | `string` | **Required**. Wartość |

#### Pobieranie kursów na podstawie daty oraz daty i waluty

```http
  GET /api/v1/pobierzKursy?date={date}&currency={currency}
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `date` | `string` | **Required**. Data kursu |
| `currency` | `enum` | Waluta |

