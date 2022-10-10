<?php

namespace Kisel\Laravel\Repository\Listeners;

use Illuminate\Support\Arr;
use Kisel\Laravel\Repository\Facades\Repository;
use Kisel\Laravel\Repository\Invokable\Cache;
use Illuminate\Support\Facades\Cache as CacheManager;

class SaveInCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        /** @var Cache $strategy */
        $strategy = Arr::get(Repository::getStrategies(), Cache::class);

        CacheManager::store($strategy->getStore())->add($event->result['id'], $event->result);
    }
}
