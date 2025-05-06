# Laravel Docker Setup

## 🚀 Getting Started

1. Clone the repository
2. Make sure Docker & Docker Compose are installed
3. Copy `.env.example` to `.env` and update DB credentials if needed
4. Run:

```bash
docker-compose up -d --build
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
