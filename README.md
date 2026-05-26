# Recruitment Backend (Symfony 7.4)

Backend for the recruitment assignment: REST API (API Platform) + admin panel (EasyAdmin).

## Stack

- Symfony 7.4
- API Platform
- EasyAdmin
- Doctrine ORM + Migrations
- MySQL 8.4
- Docker / Docker Compose

## Features

- API for recruitment applications (`Application`)
- Application CRUD via API Platform
- Application list filtering:
  - `position` (partial match)
  - `experienceLevel` (exact match)
- EasyAdmin admin panel:
  - view, edit, and delete applications
- Admin login for the panel

## Data model (`Application`)

- `firstName`
- `lastName`
- `email` (unique)
- `position`
- `experienceLevel` (`junior`, `mid`, `senior`)
- `yearsOfExperience`
- `technologies`
- `motivation`
- `availabilityDate`
- `createdAt`, `updatedAt`

## Run (Docker)

```bash
docker compose up --build
```

After startup:

- API: `http://localhost:8000/api`
- Swagger UI: `http://localhost:8000/api`
- Admin login: `http://localhost:8000/admin/login`
- Admin panel: `http://localhost:8000/admin`

## Admin credentials

- username: `admin`
- password: `admin123`
