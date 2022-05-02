<?php

namespace App\Core\Service;

use Symfony\Component\Cache\Adapter\RedisAdapter;

class RedisCacheService
{
    private \Redis $connect;

    public function __construct(string $dsn)
    {
        $this->connect = RedisAdapter::createConnection($dsn);
    }

    public function get(string $key): mixed
    {
        return igbinary_unserialize($this->connect->get($key));
    }

    public function set(string $key, mixed $value, int $ttl = 60): bool
    {
        return $this->connect->setEx($key, $ttl, igbinary_serialize($value));
    }

    public function keys(string $pattern = '*'): array
    {
        return $this->connect->keys($pattern);
    }

    public function delete(string $key): void
    {
        $this->connect->del($key);
    }

    public function exists(string $key): bool
    {
        return $this->connect->exists($key);
    }

    public function ttl(string $key): int
    {
        return $this->connect->ttl($key);
    }
}