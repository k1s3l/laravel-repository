<?php

namespace Kisel\Laravel\Repository\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Kisel\Laravel\Repository\Events\EntityApiFound;
use Kisel\Laravel\Repository\Events\EntityInDatabase;
use Kisel\Laravel\Repository\Listeners\SaveInCache;
use Kisel\Laravel\Repository\Listeners\SaveInDatabase;

class RepositoryEventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        EntityApiFound::class => [
            SaveInDatabase::class,
        ],
        EntityInDatabase::class => [
            SaveInCache::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
