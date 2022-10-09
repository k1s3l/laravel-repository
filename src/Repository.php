<?php

namespace Kisel\Laravel\Repository;

use Kisel\Laravel\Repository\Events\EntityFound;

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
                event(new EntityFound($strategy, $result));

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
