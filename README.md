# Todo App

## About App

This is a system that allows you to deposit and manage day-to-day task.

## Backend Usage

First clone this repository

    cd laravel-technical-assignment

Then install a compiler

    composer install
    
Then create and configure .env

    cp .env.example .env
    
   Then create app key

    php artisan key:generate

   Then add MAIL credentials in .env
   
   Add the following credinctional to the .env file to perform a task backup for Google drive
   
    GOOGLE_CLIENT_ID=
    GOOGLE_CLIENT_SECRET=
    GOOGLE_REDIRECT_URL=http://localhost:8000/google-drive/callback
   

Then running migrations

    php artisan migrate
    
or

    php artisan migrate  --seed
    
Then start the server

    php artisan serve
    
Then, Run these commands to automatically send an email reminder and update task status.

    php artisan queue:work
    
and

    php artisan schedule:work

## Api

This To-Do App is Restfull api

## Test

Run test

    php artisan test

Or use the postman collection provided
    
## Security Vulnerabilities

If you discover a security vulnerability within this app, please send an e-mail to Shashika Nuwan via [Shashika Nuwan](mailto:kumararanaweera1999@gmail.com). All security vulnerabilities will be promptly addressed.
