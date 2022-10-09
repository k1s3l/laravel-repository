<?php

namespace Kisel\Laravel\Repository\Invokable;

use Illuminate\Database\Eloquent\Builder;
use Kisel\Laravel\Repository\Interfaces\InvokableInterface;

class Database implements InvokableInterface
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @param Builder $builder
     * @return void
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function __invoke(int $id): mixed
    {
        return $this->builder->whereId($id)->first();
    }
}
