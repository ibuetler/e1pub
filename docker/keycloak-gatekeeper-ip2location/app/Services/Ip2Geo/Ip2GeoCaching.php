<?php

namespace App\Services\Ip2Geo;

use App\Services\Cache\CacheInterface;

class Ip2GeoCaching implements Ip2GeoInterface
{
    /**
     * @var $ip2Geo Ip2GeoInterface
     */
    private $ip2Geo;

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * @var int
     */
    private $ttl;

    /**
     * Ip2GeoCaching constructor.
     * @param Ip2GeoInterface $ip2Geo
     * @param CacheInterface $cache
     */
    public function __construct(Ip2GeoInterface $ip2Geo, CacheInterface $cache, int $ttl)
    {
        $this->ip2Geo = $ip2Geo;
        $this->cache = $cache;
        $this->ttl = $ttl;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip2Geo->getIp();
    }

    /**
     * @return Ip
     */
    public function getGeo(): Ip
    {
        if ($cache = $this->cache->get($this->getIp())) {
            return $cache;
        } else {
            $IP2Geo = $this->ip2Geo->getGeo();
            $this->cache->set($this->getIp(), $IP2Geo, $this->ttl);
            return $IP2Geo;
        }
    }
}