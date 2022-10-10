## Laravel Repository

Install

```composer install k1s3l/laravel-repository:dev-dev```

Push into ```providers``` ```config/app.php```

```angular2html
    Kisel\Laravel\Repository\Providers\RepositoryServiceProvider::class,
    Kisel\Laravel\Repository\Providers\RepositoryEventServiceProvider::class,
```

Run command
```angular2html
    php artisan vendor:publish --tag=config
```

Call from ```Kisel\Laravel\Repository\Facades\Repository::search()```