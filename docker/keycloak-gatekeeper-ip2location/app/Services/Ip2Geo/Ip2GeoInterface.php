<?php

namespace App\Services\Ip2Geo;

interface Ip2GeoInterface
{
    public function getIp(): string;

    public function getGeo(): Ip;
}