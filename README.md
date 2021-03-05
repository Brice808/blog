This is my first personel project : a photo blog with laravel 8.

I am still working on it so it will get more and more updates depending of my free time and new ideas.

If you point out some bugs feel free to tell me !


If you want to launch it:

    Run composer install

    Copy .env.example on the root folder and rename it .env, open it and change the DB_DATABASE to the one you have already created. Enter your credentials in DB_USERNAME and DB_PASSWORD

    Run php artisan key:generate

    Run npm install && npm run dev

*----Display Images----*

    You might need to run these commands to handle your image properly. I didn't find any other way to deal with right now:
    
    composer require unisharp/laravel-filemanager
    php artisan vendor:publish --tag=lfm_config
    php artisan vendor:publish --tag=lfm_public
    php artisan storage:link

*-----------------------*

    Run php artisan migrate
    or to populate your DB
    php artisan migrate:fresh --seed

    Run php artisan serve

    Open your localhost (localhost:8000 by default)
