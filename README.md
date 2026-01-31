# Samridhi

Samridhi - Build a Strong Future. Top Steel Pipe Manufacturer website with admin panel.

## Features

- **Website**: Homepage, Products, About, Quality, Investors, Clients, Careers, Blog, Contact
- **Admin Panel**: Login, Website Settings, Blog Management with CKEditor
- **Tech**: Laravel 12, Tailwind CSS

## Admin Access

- URL: `/admin/login`
- Default: `admin@samridhipipes.com` / `password`

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
```

Or visit **`/api/setup`** to run migrations, seeding, and key generation in one go (works before DB tables exist).
