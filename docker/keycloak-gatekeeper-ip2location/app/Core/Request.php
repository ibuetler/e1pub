<?php

namespace App\Core;

class Request
{
    public $get;
    public $post;
    public $path;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}