<?php

namespace Kisel\Laravel\Repository\Invokable;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\Http;
use Kisel\Laravel\Repository\Exceptions\NotFilledConfigException;
use Kisel\Laravel\Repository\Interfaces\InvokableInterface;

class Api implements InvokableInterface
{
    protected Factory $client;

    protected $url;

    protected $mock;

    public function __construct()
    {
        $this->url = config('repository.url');

        if (($mockUrl = config('repository.mock')) === null) {
            throw new NotFilledConfigException('Mock url should be filled');
        }

        $this->mock = $mockUrl;

        $this->client = app(Factory::class);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function __invoke(int $id): mixed
    {
        if ($this->url !== null) {
            $url = $this->url;
        } else {
            $url = str_replace(':id', $id, $this->mock);
        }

        return $this->client->get($url)->json();
    }
}
