# Laravel Product Excel Importer

This Laravel project facilitates the import of products from an Excel file into your database.

## Installation

Clone the repository to your local machine, navigate into the project directory, and follow these steps:

```bash
git clone https://github.com/your/repository.git
cd project-directory
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Importing Products from Excel

To import products from an Excel file, use the following command:

```bash
php artisan app:product-import --path="/path/to/excel.xlsx"
```

Replace `"/path/to/excel.xlsx"` with the actual path to your Excel file containing the product data.

Enjoy importing your products effortlessly with Laravel!
