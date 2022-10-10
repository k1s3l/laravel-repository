<?php

namespace Kisel\Laravel\Repository\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Arr;
use Kisel\Laravel\Repository\Events\EntityInDatabase;
use Kisel\Laravel\Repository\Facades\Repository;
use Kisel\Laravel\Repository\Invokable\Database;

class SaveInDatabase
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
        /** @var Database $strategy */
        $strategy = Arr::get(Repository::getStrategies(), Database::class);

        $strategy->getBuilder()->insert($event->result);

        $result = $strategy->getBuilder()->firstWhere($event->result);

        event(new EntityInDatabase($result));
    }
}
