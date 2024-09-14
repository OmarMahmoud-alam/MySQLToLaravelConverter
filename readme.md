# MySQL to Laravel Migration Converter

The **MySQL to Laravel Migration Converter** is a tool to convert MySQL dump files into Laravel migration and seed files, making it easier to integrate existing MySQL databases into Laravel projects.

## Features
- Converts MySQL dump files into Laravel migration and seed files.
- Automatically generates the necessary migration and seeder folders and files.

## Prerequisites
- PHP 7.4 or later
- Laravel 8.x or later (if you plan to use the generated migration and seed files in your Laravel project)

## Installation
1. Clone or download this repository.
2. Place your MySQL dump file in the project directory.

## Usage

### Create Folder Structure

Upon running the converter, an `output` folder will be created with two subdirectories:
- `migrate`: contains the Laravel migration files.
- `seeds`: contains the Laravel seed files.

### Set the Path to Your MySQL Dump File

Open `MySQLToLaravelConverter.php` and replace the path to the MySQL dump file:

```php
$converter = new MySQLToLaravelConverter('./booksell.sql', './output');
```

## Command
Run the converter using the following command:
```sh
 php MySQLToLaravelConverter.php
```