# Code Challenge: madatech-tasks

## Description

This is a simple task management CRUD application built with CodeIgniter 4. It provides a web interface and a RESTful API for managing tasks. The project is designed to run on XAMPP but can be configured to run on an Apache server with PHP and PostgreSQL support.

## Features

- Create, Read, Update, and Delete (CRUD) tasks
- Web-based interface for task management
- RESTful API with JSON responses
- Designed for PostgreSQL (RDS or local database)

## Installation

#### Prerequisites

- XAMPP or Apache server with PHP and PostgreSQL
- Composer
- PHP 8+
- PostgreSQL (if running the database locally)

#### Instructions

1. Clone the project:

```
git clone https://github.com/luislanga/madatech-tasks.git
cd madatech-tasks
```

2. Install Dependencies:

```
composer install
```

3. Setup `.env` file:

Create a copy of `env` named `.env` and setup your database connection.

4. Run the application:

If using XAMPP, configure your Document Root and Directory to point to the installation directory;

## Web Routes

The application includes web-based CRUD functionality for tasks.

| Method | Route          | Controller Method              | Description      |
| ------ | -------------- | ------------------------------ | ---------------- |
| GET    | `/`            | `TaskController@index`         | List all tasks   |
| GET    | `/create`      | `TaskController@create`        | Show create form |
| POST   | `/create`      | `TaskController@createNewTask` | Create new task  |
| GET    | `/edit/{id}`   | `TaskController@edit`          | Show edit form   |
| POST   | `/edit/{id}`   | `TaskController@editTask`      | Update task      |
| GET    | `/delete/{id}` | `TaskController@delete`        | Delete task      |

## API Endpoints

The application includes a RESTful API for task management.

### Task API Endpoints

| Method | Endpoint         | Controller Method           | Description       |
| ------ | ---------------- | --------------------------- | ----------------- |
| GET    | `/api/tasks`     | `Api\TaskController@index`  | Get all tasks     |
| GET    | `/api/task/{id}` | `Api\TaskController@show`   | Get task by ID    |
| POST   | `/api/task`      | `Api\TaskController@create` | Create a new task |
| PUT    | `/api/task/{id}` | `Api\TaskController@update` | Update a task     |
| DELETE | `/api/task/{id}` | `Api\TaskController@delete` | Delete a task     |

**Payload Example:**
```json
{
	"title": "Title",
	"description": "Task description.",
	"status": "pendente"
}
```

#### You can also use this react client to interact with the api:
- [React Client](https://github.com/luislanga/madatech-client)
