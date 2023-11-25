# Bookstore Web App using Laravel

## Features covered

Bookstore features covered :
 * Searching data
 * Data pagination for min 100 records with 12 records in each page
 * Add/update/delete book records control
 * Add data using csv sheet
 * Dial Pad with alert on calling phone number

## Technologies

 * Laravel 10
 * Alpine Js
 * Bootstrap 5
 * MySQL
 * Redis
 * Livewire (Laravel Full Stack framework)
 * Meilisearch - port 7700
 * Horizon - horizon/dashboard

## Database Table Schema

```
Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('genre');
            $table->longText('description');
            $table->string('author');
            $table->string('image');
            $table->date('published');
            $table->string('publisher');
            $table->string('account_type')->default('user');
            $table->timestamps();
        });
```
Note : Considering no column is nullable


## Code review and testing :
 * I used laravel debugbar and sonarqube for queries optimization and code review
 * All my coding is according to PSR-4 (PHP Standard Recommendation)
 * By using Meilisearch, Caching, Pagination, & Queues, I have enormously improved the performance (by reducing the database hit rate, improving fetching speed & performing async background operations)

## Commands ran :
```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan make:model Books
npm install
npm run dev
php artisan serve
php artisan make:livewire Book
php artisan scout:import "App\Models\Books"
php artisan horizon
meilisearch
```

In case of any doubt or clarification please give me an opportunity to give explanation. Thank you.

