<?php

namespace Kisel\Laravel\Repository;

use Illuminate\Database\Eloquent\Builder;

class Repository
{
    protected $cache;

    protected $client;

    protected $mock;

    public function __construct()
    {
    }

    public function search(Builder $builder)
    {

    }
}