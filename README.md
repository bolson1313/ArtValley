# ArtValley
ArtValley is a web-based platform for buying and selling artworks of various types. It is built using Laravel (PHP) and Vue.js with Tailwind CSS and Flowbite for styling. The application allows users to register, log in, view available artworks, and manage their own listings. Administrators have full access to all data and can manage system content and view statistics with visual charts.

## Requirements
To run this project locally, make sure you have the following installed:
- PHP >= 8.2
- Composer
- Node.js & npm
- XAMPP (for MySQL server)

## Installation and Setup
You can set up the application quickly using the provided start.bat script. This script performs the following steps automatically:
- Creates a MySQL database named artvalley.
- Copies the .env.example file to .env.
- Installs PHP dependencies via Composer.
- Runs Laravel database migrations.
- Seeds the database with test data.
- Generates the application key.
- Creates a symbolic link for storage.
- Installs npm dependencies.
- Installs Tailwind CSS, PostCSS, Autoprefixer, Flowbite, ApexCharts.

## To run the script:
1. Start XAMPP and ensure the MySQL server is running.
2. Double-click the start.bat file or run it via the command line.

## Manual Setup (Optional)

``` bash
# Create database manually (or use phpMyAdmin):
# CREATE DATABASE artvalley;

# Copy .env file
php -r "copy('.env.example', '.env');"

# Install PHP dependencies
composer install

# Run migrations and seeders
php artisan migrate
php artisan db:seed

# Generate application key
php artisan key:generate

# Create symbolic link for storage
php artisan storage:link

# Install Node dependencies
npm install
npm install -D tailwindcss postcss autoprefixer flowbite
npm install apexcharts
```

## Running the Application
``` bash
php artisan serve
npm run dev
```

## Additional info
- Default MySQL user: root (no password assumed)
- Make sure .env file has correct database credentials.
- For the admin panel and statistics, log in with an account seeded during db:seed.
