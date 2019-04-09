<?php

namespace App;

class Route
{
    public static function rules()
    {
        return [
            '/ip2geo' => 'HomeController@index',
        ];
    }
}