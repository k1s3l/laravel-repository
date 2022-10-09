<?php

namespace Kisel\Laravel\Repository\Invokable;

use Illuminate\Support\Facades\Cache as CacheManager;
use Kisel\Laravel\Repository\Interfaces\InvokableInterface;

class Cache implements InvokableInterface
{
    /**
     * @var string
     */
    protected string $store;

    /**
     * @param string $store
     */
    public function __construct(string $store = 'redis')
    {
        $this->store = $store;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function __invoke(int $id): mixed
    {
        return CacheManager::store($this->store)->get((string) $id);
    }
}
