Prerequisites

Before installing Laravel, ensure your system meets the following requirements:

PHP >= 8.0

Composer (Dependency Manager for PHP)

MySQL or any other supported database

Web server (Apache, Nginx, or built-in PHP server)

Installation

1. Install Composer

If you haven't installed Composer, download and install it from Composer's official website.

2. Install Laravel

Run the following command to create a new Laravel project:

composer create-project --prefer-dist laravel/laravel my_project

Or install Laravel globally using:

composer global require laravel/installer

Then create a new Laravel project using:

laravel new my_project

3. Set Up Environment

Navigate to the project directory:

cd my_project

Copy the .env.example file to .env:

cp .env.example .env

Generate the application key:

php artisan key:generate

4. Configure Database

Edit the .env file and set your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_database
DB_USERNAME=root
DB_PASSWORD=secret

Then, run the migrations:

php artisan migrate

5. Start Development Server

Run the built-in development server:

php artisan serve

Your Laravel application is now accessible at http://127.0.0.1:8000/.

Usage

1. Routing

Define routes in routes/web.php:

Route::get('/', function () {
    return view('welcome');
});

2. Controllers

Create a new controller:

php artisan make:controller MyController

Define a method inside app/Http/Controllers/MyController.php:

public function index() {
    return view('home');
}

3. Models and Migrations

Create a model with migration:

php artisan make:model Post -m

Define table schema in database/migrations/xxxx_xx_xx_xxxxxx_create_posts_table.php:

public function up() {
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->timestamps();
    });
}

Run the migration:

php artisan migrate

4. Running Tests

Run tests using:

php artisan test

Deployment

For production, configure .env with production credentials and use a web server like Nginx or Apache. Run the following commands:

php artisan config:cache
php artisan route:cache
php artisan view:cache

Additional Resources

Laravel Documentation

Laracasts Video Tutorials

Laravel News
