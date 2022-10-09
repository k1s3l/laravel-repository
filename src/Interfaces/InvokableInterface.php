<?php

namespace Kisel\Laravel\Repository\Interfaces;

interface InvokableInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function __invoke(int $id): mixed;
}
