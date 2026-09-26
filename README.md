# Personal Task Manager

## Project Information

**Project Code:** WST21-PM-2026-SF  
**Student Name:** Nikenji Louis Peñas  
**Course & Year:** BSIT 2nd Year  
**Database Used:** MySQL

## Project Description

Personal Task Manager is a simple Laravel web application for managing personal tasks. It allows users to add, view, edit, delete, and update the status of tasks.

## Features

- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status

## Task Information

Each task contains:

- Task ID
- Task Name
- Description
- Status
- Due Date

## Status Options

- Pending
- Completed

## Technologies Used

- Laravel 12
- PHP 8.2
- MySQL
- XAMPP
- Blade
- HTML
- CSS

# Development Tools
- Visual Studio
- Composer
- Git 
- Github

## Laravel Components

### Routes

The project uses Laravel routes to connect URLs to the Task Controller.

### Controller

`TaskController` handles adding, viewing, editing, updating, and deleting tasks.

### Model

The `Task` model uses Laravel Eloquent to communicate with the MySQL database.

### Database

The project uses MySQL with a database named `personal_task_manager`.

### Blade Views

The project contains:

- `index.blade.php`
- `create.blade.php`
- `edit.blade.php`

## CRUD Operations

**Create:** Add a new task.

**Read:** View all saved tasks.

**Update:** Edit task information and change its status.

**Delete:** Remove a task from the database.

## How to Run

### 1. Open the Deployed Application

The project is available online through Railway:

https://laravel-app-production-0385.up.railway.app

Open the link in a web browser to use the application directly.