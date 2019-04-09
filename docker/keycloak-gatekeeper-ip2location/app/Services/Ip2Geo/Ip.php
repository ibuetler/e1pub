<?php

namespace App\Services\Ip2Geo;

class Ip
{
    private $Ip;
    private $country;
    private $city;
    private $latitude;
    private $longitude;

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->Ip;
    }

    /**
     * @param mixed $Ip
     */
    public function setIp($Ip)
    {
        $this->Ip = $Ip;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode((object)[
            'IP' => $this->Ip,
            'country' => $this->country,
            'city' => $this->city,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);
    }
}