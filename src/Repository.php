<?php

namespace Kisel\Laravel\Repository;

use Kisel\Laravel\Repository\Interfaces\Eventable;

class Repository
{
    protected array $strategies = [];

    public function __construct(array $strategies = [])
    {
        $this->strategies = $strategies;
    }

    public function search(int $id): mixed
    {
        foreach ($this->strategies as $strategy => $invokable) {
            if (($result = $invokable($id)) !== null) {
                if (is_a($strategy, Eventable::class, true)) {
                    $events = collect($invokable->events())->map(static fn ($event) => new $event($result));

                    event(...$events);
                }

                return $result;
            }
        }

        return [];
    }

    public function getStrategies(): array
    {
        return $this->strategies;
    }
}
