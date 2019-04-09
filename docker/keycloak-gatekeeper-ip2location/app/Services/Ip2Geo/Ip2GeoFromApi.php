<?php

namespace App\Services\Ip2Geo;

class Ip2GeoFromApi implements Ip2GeoInterface
{
    const API_URL = 'http://ip-api.com/json/';

    private $ip;

    /**
     * Ip2GeoFromApi constructor.
     * @param $ip
     */
    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return Ip
     * @throws IpNotFoundException
     * @throws IpApiException
     */
    public function getGeo(): Ip
    {
        $json = $this->getContents(self::API_URL . $this->ip);
        $data = json_decode($json);

        if($data->status == 'fail'){
            throw new IpNotFoundException();
        }

        $IP = new Ip();
        $IP->setIp($this->ip);
        $IP->setLatitude($data->lat);
        $IP->setLongitude($data->lon);
        $IP->setCountry($data->country);
        $IP->setCity($data->city);

        return $IP;
    }

    /**
     * @param $url
     * @return bool|string
     * @throws IpApiException
     */
    private function getContents($url)
    {
        if($content = @file_get_contents($url)){
            return $content;
        }else{
            throw new IpApiException();
        }
    }
}