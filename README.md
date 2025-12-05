# YouZoo E-Commerce Platform

YouZoo is a modern, pet-focused e-commerce application built with Laravel. It connects pet owners with high-quality products for their furry, feathered, or scaled friends.

## Features

-   **User Authentication**: Secure login and registration.
-   **Product Catalog**: Browse products by category (Food, Toys, Accessories, Healthcare, Clothing).
-   **Shopping Cart**: Add items, view cart, and proceed to checkout.
-   **Order History**: Users can view their past orders on the dashboard.
-   **Contact Form**: Users can get in touch with support.
-   **Responsive Design**: Fully responsive layout using Tailwind CSS.
-   **Dark Mode**: Built-in dark/light mode toggle.

## Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & NPM
-   MySQL or SQLite

## Installation

1.  **Clone the repository:**
    ```bash
    git clone <repository_url>
    cd group53
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install Node dependencies:**
    ```bash
    npm install
    ```

4.  **Set up environment variables:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Configure your database credentials in `.env` and email credentials in `.env`*

5.  **Run migrations and seed the database:**
    ```bash
    php artisan migrate:fresh --seed
    ```

6.  **Build frontend assets:**
    ```bash
    npm run build
    ```

7.  **Serve the application:**
    ```bash
    php artisan serve
    ```

## Test User Credentials

To access the platform immediately for testing purposes, use the following credentials (seeded by `UsersTableSeeder`):

| Role  | Email              | Password |
| :---  | :---               | :---     |
| User  | **admin@youzoo.com** | **password** |

*(Note: The default password for seeded users in Laravel factories is typically 'password' unless changed in the factory definition.)*

## Project Structure

-   `app/Http/Controllers`: Contains application logic (ProductController, CartController, etc.).
-   `resources/views`: Blade templates for the UI.
-   `routes/web.php`: Application routes.
-   `database/seeders`: Seeders for populating the database with initial data.

## Contributing

1.  Fork the repository.
2.  Create your feature branch (`git checkout -b feature/AmazingFeature`).
3.  Commit your changes (`git commit -m 'Add some AmazingFeature'`).
4.  Push to the branch (`git push origin feature/AmazingFeature`).
5.  Open a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
