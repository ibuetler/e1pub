<?php

namespace App\Core;

class Application
{
    protected $request;
    protected $response;
    protected $router;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        try {
            $controller = $this->router->getController();
            $action = $this->router->getAction();
        } catch (\Exception $exception) {
            $this->sendNotFound();
        }

        $controller = new $controller($this->request, $this->response);
        $response = $controller->$action();

        if ($response instanceof Response) {
            $response->send();
        }
    }

    private function sendNotFound()
    {
        $this->response->notFound();
        $this->response->send();
    }
}