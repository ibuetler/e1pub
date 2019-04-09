<?php

namespace App\Core;

use App\Route;

class Router
{
    private $request;
    private $controller;
    private $action;

    /**
     * Router constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
        @list($this->controller, $this->action) = explode('@', $this->getRoute(), 2);
    }

    /**
     * @return string|null
     */
    public function getRoute()
    {
        return Route::rules()[$this->request->path] ?? null;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getController()
    {
        $controller = 'App\Controllers\\' . $this->controller;

        if ($this->controller && class_exists($controller)) {
            return $controller;
        } else {
            throw new \Exception();
        }
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getAction()
    {
        if ($this->action && method_exists($this->getController(), $this->action)) {
            return $this->action;
        } else {
            throw new \Exception();
        }
    }
}