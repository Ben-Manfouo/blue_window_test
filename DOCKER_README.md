# Laravel Docker Setup

## 🚀 Getting Started

1. Clone the repository:
   git clone https://github.com/Ben-Manfouo/blue_window_test.git
   cd blue_window_test

2. Copy `.env.example` to `.env` with command: cp .env.example .env
3. Make sure Docker & Docker Compose are installed. Check the output of this command  : docker info
4. Run:

    docker-compose up -d --build
    docker-compose exec app composer install
    docker-compose exec app php artisan key:generate
    docker-compose exec app php artisan migrate:fresh --seed

5. Open browser and visit http://localhost:8000
6. To close instance run : docker-compose down
