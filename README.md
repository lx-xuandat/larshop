## About
- create laravel project
- edit .env file
- make article migrations
    php artisan make:migration  create_articles_table --create=articles
- fix string length - AppServiceProvider.php
    mariadb, mysql co 1 so loi ve leng cua kieu du lieu: 
    Schema::defaultStringLength(191);

- make article model
    larticles_api_2 php artisan make:model Article
- create article seeder
    php artisan make:seeder ArticlesTableSeeder
- generate factory
    artisan make:factory ArticleFactory
- seed data
    artisan db:seed

- make article controller - resource api
    ➜  larticles_api_2 php artisan make:controller api/ArticleController --api
    // chi tao cac action chuc nang crud, khong co cac action create, edit tra ve view la cac form de tao va form update du lieu

- create api route - route/api.php
    [route/api.php] 
        Route::apiResource('articles', Article::class);

- make article resource file
- customize API (article.php)
- data wrapping
- JSON api spec
