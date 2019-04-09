<?php

namespace App\Services\Cache;

class FileCache implements CacheInterface
{
    /**
     * Time To Live. Seconds
     */
    const DEFAULT_TTL = 15;

    /**
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default = null)
    {
        $filename = $this->getFilename($key);

        if(file_exists($filename)){
            $data = unserialize(file_get_contents($filename));

            if($data['date'] > time()){
                return $data['value'];
            }

            unlink($filename);
        }

        return null;
    }

    /**
     * @param $key
     * @param $value
     * @param int $ttl
     * @return bool
     */
    public function set($key, $value, $ttl = self::DEFAULT_TTL)
    {
        $data = [
            'value' => $value,
            'date' => time() + $ttl
        ];
        $filename = $this->getFilename($key);

        if(file_put_contents($filename, serialize($data))){
            return true;
        };

        return false;
    }

    /**
     * @param $key
     * @return string
     */
    private function getFilename($key)
    {
        return CACHE . md5($key);
    }
}