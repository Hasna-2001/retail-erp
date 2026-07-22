# Retail ERP

A Retail Enterprise Resource Planning (ERP) system built with **Laravel**, for managing products, customers, sales, and inventory reports through a secure, authenticated web interface.

## Features

- 🔐 User authentication (login/register) via Laravel UI
- 📦 Product & inventory management
- 👥 Customer management
- 💰 Sales recording with line-item sale details
- 📊 Sales and inventory reports
- 🎨 Frontend built with Bootstrap 5 + Tailwind CSS, bundled via Vite

## Tech Stack

- **Backend:** PHP 8.2+, Laravel 12
- **Frontend:** Blade templates, Bootstrap 5, Tailwind CSS, Vite
- **Database:** SQLite by default (MySQL supported — see Configuration)
- **Testing:** PHPUnit

## Project Structure

```
app/
  Http/Controllers/     # Auth, Dashboard, Product, Customer, Sale, Report controllers
  Models/                # Customer, Product, Sale, SaleDetail, User
database/
  migrations/            # products, customers, sales, sale_details tables
resources/views/         # Blade views (dashboard, products, customers, sales, reports)
routes/web.php           # Application routes
```

## Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & npm
- SQLite (default) or MySQL

### Installation

```bash
# Clone the repository
git clone https://github.com/Hasna-2001/retail-erp.git
cd retail-erp

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy the environment file
cp .env.example .env
php artisan key:generate

# Run database migrations
php artisan migrate

# Build frontend assets
npm run build
```

### Running the app

```bash
php artisan serve
```

Then visit `http://localhost:8000` in your browser.

For frontend development with hot-reloading:

```bash
npm run dev
```

## Configuration

By default the app uses **SQLite** (`DB_CONNECTION=sqlite`). To use MySQL instead, update your `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=retail_erp
DB_USERNAME=root
DB_PASSWORD=
```

Then run `php artisan migrate` again.

## Routes Overview

| Route | Description |
|---|---|
| `/` | Dashboard |
| `/products` | Product management (CRUD) |
| `/customers` | Customer management (CRUD) |
| `/sales` | Sales listing, creation & details |
| `/reports/sales` | Sales report |
| `/reports/inventory` | Inventory report |

All routes above require authentication.

## Testing

```bash
php artisan test
```

## License

This project was built as an academic submission and is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
