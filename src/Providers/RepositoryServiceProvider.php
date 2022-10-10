<?php

namespace Kisel\Laravel\Repository\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Kisel\Laravel\Repository\Invokable\Api;
use Kisel\Laravel\Repository\Invokable\Cache;
use Kisel\Laravel\Repository\Invokable\Database;
use Kisel\Laravel\Repository\Repository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('repository', static function ($app) {
            $strategies = [
                Cache::class => new Cache(),
                Database::class => new Database(User::query()),
                Api::class => new Api(),
            ];

            return new Repository($strategies);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/repository.php' => config_path('repository.php')
        ], 'config');
    }
}
