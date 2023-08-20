<?php

namespace Zoolora\Http\PHPServer;

use Zoolora\Http\Abstract\AbstractResponse;
use Zoolora\Http\Interface\ResponseInterface;

class Response extends AbstractResponse {

    /**
     * Set header response in application.
     * @param string $id
     * @param string $value
     * @return ResponseInterface
     */
    public function setHeader(string $id, string $value): ResponseInterface
    {
        header(sprintf("%s: %s", $id, $value));
        return $this;
    }

    /**
     * Set http response status code in application.
     * @param int $status
     * @return ResponseInterface
     */
    public function status(int $status): ResponseInterface
    {
        http_response_code($status);

        return $this;
    }

    /**
     * Set http response content in application.
     * @param string $raw
     * @return void
     */
    public function write(string $raw): void
    {
        echo $raw;
    }
}