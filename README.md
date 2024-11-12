# REST API with Laravel - Repository Pattern

A RESTful API built using Laravel and implementing the Repository design pattern for scalable, clean code. This API includes complete user authentication with registration, login, and logout functionality, utilizing Laravel Sanctum for JWT-based authentication and API versioning.

## Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Configuration](#configuration)
- [Running the Application](#running-the-application)
- [API Endpoints](#api-endpoints)
- [Folder Structure](#folder-structure)
- [Future Improvements](#future-improvements)
- [Contributing](#contributing)
- [License](#license)

## Features

- **Repository Pattern**: Clean separation of business logic and data access layers.
- **Complete Authentication**: Supports registration, login, and logout with Laravel Sanctum JWT authentication.
- **API Versioning**: Uses a versioned route structure (`api/v1/`) for forward compatibility.
- **RESTful Endpoints**: Follows REST principles for predictable API endpoints.
- **Scalable and Modular**: Well-organized folder structure for easy scaling and maintainability.
- **Laravel Best Practices**: Built with industry-standard practices for efficient and maintainable code.

## Tech Stack

- **Backend**: Laravel 10
- **Authentication**: Laravel Sanctum for JWT-based authentication
- **Database**: MySQL or any other database supported by Laravel

## Installation

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL or another supported database
- Node.js and npm (optional, for front-end dependencies)

### Steps

1. **Clone the repository**:
   ```bash
   git clone https://github.com/ronykader/api-repository-architecture.git
   cd api-repository-architecture
2. **Install dependencies:**
    ```bash
    composer install
   ```
3. **Set up your .env file:**
   ```
   cp .env.example .env
4. **Generate application key:** 
    ```
   php artisan key:generate
5. **Run migrations:**
    ```
    php artisan migrate
6. **Seed the database (optional, if there are seeders available):**
    ```
    php artisan db:seed
7. **Serve the application:**
    ```
    php artisan serve
The application should now be running at http://localhost:8000.

### Configuration
*Configure your application settings in the .env file, including:*
- Database: DB_DATABASE, DB_USERNAME, DB_PASSWORD
- App URL: APP_URL (should match the server’s URL)
- Mail (if sending emails for authentication-related tasks)

Sanctum provides secure, stateful authentication for SPAs and simple APIs without requiring OAuth or Passport. Make sure SANCTUM_STATEFUL_DOMAINS is set up if needed.

### Running the Application
After setting up and serving the application, you can interact with the API using tools like Postman or curl commands.

### API Endpoints
#### Authentication
- Register: POST /api/v1/register
  - **Payload**: { "name": "John Doe", "email": "johndoe@example.com", "source": "mobile", "password": "password123" }
- Login: POST /api/v1/login
  - **Payload:** { "email": "johndoe@example.com", "password": "password123" }
- Logout: POST /api/v1/logout
  - **Headers:** Authorization: Bearer {token}
