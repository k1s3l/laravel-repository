<?php

namespace Kisel\Laravel\Repository\Invokable;

use Illuminate\Database\Eloquent\Builder;
use Kisel\Laravel\Repository\Events\EntityInDatabase;
use Kisel\Laravel\Repository\Interfaces\Eventable;
use Kisel\Laravel\Repository\Interfaces\InvokableInterface;

class Database implements InvokableInterface, Eventable
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
     */
    public function __invoke(int $id): mixed
    {
        return $this->getBuilder()->whereId($id)->first();
    }

    /**
     * Immutable builder instance getting
     * @return Builder
     */
    public function getBuilder(): Builder
    {
        return clone $this->builder;
    }

    /**
     * Get events
     * @return array<class-string>
     */
    public function events(): array
    {
        return [
            EntityInDatabase::class,
        ];
    }
}
