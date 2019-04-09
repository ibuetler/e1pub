<?php

namespace App\Core;

class Response
{
    private $headers = [];
    private $body;

    public function send()
    {
        foreach ($this->headers as $header) {
            header($header);
        }
        echo $this->body;
        exit;
    }

    /**
     * @param $value
     * @return Response
     */
    public function view($value): Response
    {
        $this->body = $value;

        return $this;
    }

    /**
     * @return Response
     */
    public function notFound(): Response
    {
        $this->error(404, 'Not Found');
        return $this;
    }

    /**
     * @param $status
     * @param $message
     * @return Response
     */
    public function error($status, $message): Response
    {
        $this->setHeader('HTTP/1.0 '.$status.' ' . $message);
        $this->body = json_encode([
            'status' => $status,
            'message' => $message,
        ]);
        return $this;
    }

    /**
     * @param $header
     * @return Response
     */
    public function setHeader($header): Response
    {
        $this->headers[] = $header;

        return $this;
    }
}