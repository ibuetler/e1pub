<?php

namespace App\Controllers;

use App\Services\Cache\FileCache;
use App\Services\Ip2Geo\Ip2GeoFromApi;
use App\Services\Ip2Geo\Ip2GeoRepeating;
use App\Services\Ip2Geo\IpApiException;
use App\Services\Ip2Geo\Ip2GeoCaching;
use App\Services\Ip2Geo\IpNotFoundException;
use App\Services\Response;

class HomeController extends Controller
{
    /**
     * Time to live. 30 min
     */
    const CACHE_TTL = 1800;
    const NUMBER_OF_ATTEMPTS = 3;

    /**
     * @return \App\Core\Response
     */
    public function index()
    {
        $ip = new Ip2GeoFromApi($this->request->get['ip']);
        $IpRepeated = new Ip2GeoRepeating($ip, self::NUMBER_OF_ATTEMPTS);
        $IpCached = new Ip2GeoCaching($IpRepeated, new FileCache(), self::CACHE_TTL);

        try {
            return $this->response->view($IpCached->getGeo());
        } catch (IpNotFoundException $exception) {
            return $this->response->notFound();
        } catch (IpApiException $exception) {
            return $this->response->error(503, 'Service Unavailable');
        }
    }
}