# reservation-app


#postman link :

https://documenter.getpostman.com/view/35189636/2sA3QwaUVd

#packages : 

https://spatie.be/docs/laravel-medialibrary/v11/introduction (please note that it requires gd extention enaled and APP_URL=http://localhost:8000)

https://spatie.be/docs/laravel-permission/v6/introduction


#installation : 
composer instll 

cp .env.example .env

php artisan key:genenrate

php artisan migrate --seed

#test users : 
admin : superadmin@mail.com , pass : password
employee : employee@mail.com , pass : password
