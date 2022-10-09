<?php

namespace Kisel\Laravel\Repository\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed search(int $id)
 * @method static array getStrategies()
 *
 * @see \Kisel\Laravel\Repository
 */
class Repository extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'repository';
    }
}
