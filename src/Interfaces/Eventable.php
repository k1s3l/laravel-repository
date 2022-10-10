<?php

namespace Kisel\Laravel\Repository\Interfaces;

interface Eventable
{
    /**
     * Get events array
     * @return array
     */
    public function events(): array;
}
