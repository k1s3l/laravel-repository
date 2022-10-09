<?php

namespace Kisel\Laravel\Repository\Invokable;

use Illuminate\Support\Facades\Http;
use Kisel\Laravel\Repository\Exceptions\NotFilledConfigException;
use Kisel\Laravel\Repository\Interfaces\InvokableInterface;

class Api implements InvokableInterface
{
    protected $client;

    protected $url;

    protected $mock;

    public function __construct()
    {
        $this->url = config('repository.url');

        if (($mockUrl = config('repository.mock')) === null) {
            throw new NotFilledConfigException('Mock url should be filled');
        }

        $this->mock = $mockUrl;

        $this->client = new Http();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function __invoke(int $id): mixed
    {
        return $this->client->get($this->url ?: $this->mock)->json();
    }
}
