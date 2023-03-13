#install the project

**is required**

"php": "^8.1" for "laravel/framework": "^10.0",
Node.js 18
MySQL 8

I recommend you install the latest version of laragon.
https://github.com/leokhoa/laragon/releases/download/6.0.0/laragon-wamp.exe

***Laragon Full (64-bit): Apache 2.4, Nginx, MySQL 8, PHP 8, Redis, Memcached, Node.js 18, npm, git
**^**

*******
use the laragon terminal
*******

***install npm packages, -> you can consult package.json
-   npm install

***from laragon open database 
- create the "examen" database

*<*
-in your .env take the settings from .env.example
*>*


*******
use the laragon terminal
*******

*run the following migration
  - php artisan migrate

*run the following seed
  - php artisan db:seed

admin@gmail.com   regular@gmail.com
password: 12345678

*******
use the laragon terminal
*******
*important run for api. -> vue is used
- npm run dev


***********************************************************************************
the routes are api and web

* you must have executed  "npm run dev" in laragon terminal
api -> http://examen.test/vue/login
* rutas
routes/api.php
* consume api
resources/js/vue
* routes
resources/js/vue/routes.js
* you can see the general implementation of technologies
resources/views/vue.blade.php
resources/js/vue/main.js
resources/js/vue/components

* controllers
app/Http/Controllers/Api
* strong token implementation,   token generated in backend and returned by frontend
app/Http/Controllers/Api/UserController.php    
->login   checkToken from frontend
* example of a token returned by frontend
resources/js/vue/components/Save.vue
this.$axios.post('/api/posts',this.form, config
* crud backend
app/Http/Controllers/Api/PostController.php 


* migration
database/migrations
* seeder
database/seeders/DatabaseSeeder.php
* Models
app/Models

* form validations
app/Http/Requests




web -> http://examen.test/login
routes/web.php
* classic use in laravel
