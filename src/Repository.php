<?php

namespace Kisel\Laravel\Repository;

use Kisel\Laravel\Repository\Interfaces\Eventable;

class Repository
{
    /**
     * @var array
     */
    protected array $strategies = [];

    public function __construct(array $strategies = [])
    {
        $this->strategies = $strategies;
    }

    /**
     * Search entity by strategies
     * @param int $id
     * @return mixed
     */
    public function search(int $id): mixed
    {
        foreach ($this->strategies as $strategy => $invokable) {
            if (($result = $invokable($id)) !== null) {
                if (is_a($strategy, Eventable::class, true)) {
                    collect($invokable->events())
                        ->each(static fn ($event) => event(new $event($result)));
                }

                return $result;
            }
        }

        return [];
    }

    /**
     * Get strategies from Repository instance
     * @return array
     */
    public function getStrategies(): array
    {
        return $this->strategies;
    }
}
