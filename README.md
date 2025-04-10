# Task Manager API

Task Manager API is a simple RESTful API built with Laravel to manage tasks for authenticated users. It supports creating, listing, updating, and deleting tasks, secured with Laravel Sanctum for token-based authentication.

## Features
- **User Authentication**: Register and login to obtain an API token.
- **Task Management**: CRUD operations for tasks (create, read, update, delete).
- **Secure API**: Protected with Laravel Sanctum using Bearer tokens.
- **Postman Collection**: Automatically generate a Postman collection for testing.

## Prerequisites
- **PHP 8.1+**: Required by Laravel 11 (adjust based on your Laravel version).
- **Composer**: For dependency management.
- **MySQL**: Database for storing users and tasks.
- **Git**: To clone the repository (optional).
- **Postman**: For testing the API (optional).

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/TaskManager.git
cd TaskManager
```
### 2. Install Dependencies
```bash
composer install
```
### 3. Configure Environment
```bash
cp .env.example .env
```
### 4. Generate an application key:
```bash
php artisan key:generate
```
### 4. Run migrations to create tables:
```bash
php artisan migrate
```
## 5. Postman collection in task_manager_collection
    
### you can drop this collection in your postman to test the apis

