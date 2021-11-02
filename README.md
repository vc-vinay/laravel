# Laravel

## Required :

PHP ^7.3

Redis

Imagick (PHP extension)

## Installation

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Install all the dependencies using composer

    composer install
    npm install
    npm run dev

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeder 

    php artisan db:seed

To create the symbolic link
    
    php artisan storage:link

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

or you can create virtual host
