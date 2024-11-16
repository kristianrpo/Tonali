# Tonali

Tonali is a Laravel-based web application for a Colombian makeup store. It features an integrated ordering system, inventory management, product recommendations, and user registration, providing a streamlined shopping experience while promoting local products.

## Requirements

Before setting up the project, make sure you have the following installed:

-   **PHP 8.x**
-   **Composer**
-   **MySQL**
-   **Node.js and npm** (for asset compilation)

## Installation

To set up the application locally, follow the steps below:

### 1. Clone the Repository

Clone the project to your local machine using the following command:

```bash
git clone https://github.com/kristianrpo/Tonali.git
cd Tonali
```

### 2. Install PHP Dependencies

Install the necessary PHP packages using Composer:

```bash
composer install
```

### 3. Set Up Environment Variables

Create a copy of the .env.example file and rename it to .env:

```bash
cp .env.example .env
```

Edit the .env file to configure your database and other environment settings, such as:

DB_HOST
DB_DATABASE
DB_USERNAME
DB_PASSWORD

### 4. Generate Application Key

Generate the Laravel application key for encryption purposes:

```bash
php artisan key:generate
```

### 5. Run Migrations

Run the database migrations to set up the required tables:

```bash
php artisan migrate
```

### 6. Install Node.js Dependencies

For managing frontend assets, install Node.js dependencies with npm:

```bash
npm install
```

Then, compile the assets using Laravel Mix:

```bash
npm run dev
```

### 7. Link Storage

To allow public access to the storage files (e.g., uploaded images), create a symbolic link to the storage folder:

```bash
php artisan storage:link
```

### 8. Start the Local Development Server

Now you can start the development server:

```bash
php artisan serve
```

### 9. Navigate to the Products Page

Once the server is running and assets are compiled, navigate to the main products page:

```bash
http://localhost:8000/products
```
