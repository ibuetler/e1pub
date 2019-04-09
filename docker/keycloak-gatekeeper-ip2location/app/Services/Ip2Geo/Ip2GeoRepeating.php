<?php

namespace App\Services\Ip2Geo;

class Ip2GeoRepeating implements Ip2GeoInterface
{
    /**
     * @var Ip2GeoInterface
     */
    private $ip2Geo;

    /**
     * @var int
     */
    private $numberOfRequests;

    /**
     * @var int
     */
    private $count = 0;

    /**
     * Ip2GeoRepeating constructor.
     * @param Ip2GeoInterface $ip2Geo
     * @param int $numberOfRequests
     */
    public function __construct(Ip2GeoInterface $ip2Geo, int $numberOfRequests)
    {
        $this->ip2Geo = $ip2Geo;

        $this->numberOfRequests = $numberOfRequests;
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
     * @throws IpApiException
     */
    public function getGeo(): Ip
    {
        try {

            return $this->ip2Geo->getGeo();

        } catch (IpApiException $exception) {

            ++$this->count;

            if ($this->count < $this->numberOfRequests) {
                return $this->getGeo();
            }

            throw new IpApiException();
        }
    }
}