## How this project works  
We use laravel reverb to detect realtime change of todo list item status 

## Installation  
Install Packages and Start Laravel / Reverb Servers  
```
$ npm install
$ composer install
$ php artisan migrate
$ npm run dev
$ php artisan server
$ php artisan reverb:start --debug
```
Route file has the route to change todo status.
```
/todo/todo-item-id
```
