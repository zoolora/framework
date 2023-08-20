<?php

namespace Zoolora\Http\Abstract;

use DateTimeInterface;
use Zoolora\Http\Interface\ResponseInterface;

abstract class AbstractResponse implements ResponseInterface {
    /**
     * Set http response header.
     * @param string $id
     * @param string $value
     * @return ResponseInterface
     */
    abstract public function setHeader(string $id, string $value): ResponseInterface;
    public function setHeaders(array $headers): ResponseInterface {
        foreach ($headers as $id => $value) {
            $this->setHeader($id, $value);
        }

        return $this;
    }

    /**
     * Set cookie on the response.
     * @param string $key
     * @param string $value
     * @param int $expire
     * @param string $path
     * @param string $domain
     * @param bool $secure
     * @param bool $httponly
     * @param string $same_site
     * @param string $priority
     * @return ResponseInterface
     */
    public function setCookie(string $key, string $value = "", int $expire = 0, string $path = "/", string $domain = "", bool $secure = false, bool $httponly = false, string $same_site = "", string $priority = ""): ResponseInterface
    {
        $expire_date_time = gmdate(DateTimeInterface::COOKIE, $expire);

        $cookie = sprintf("%s=%s; Expires=%s; Path=%s;", $key, $value, $expire_date_time, $path);

        if($domain) $cookie .= sprintf(" Domain=%s;", $domain);
        if($same_site) $cookie .= sprintf(" SameSite=%s;", $same_site);
        if($priority) $cookie .= sprintf(" Priority=%s;", $priority);
        if($secure) $cookie .= " Secure;";
        if($httponly) $cookie .= " HttpOnly;";

        $this->setHeader("Set-Cookie", $cookie);
        return $this;
    }

    /**
     * Set http response status code.
     * @param int $status
     * @return ResponseInterface
     */
    abstract public function status(int $status): ResponseInterface;

    /**
     * Redirect response.
     * @param string $url
     * @param int $status
     * @return void
     */
    public function redirect(string $url, int $status = 300): void
    {
        $this->status($status);
        $this->setHeader("Location", $url);
    }

    /**
     * Json response.
     * @param array<string, string> $data
     * @return void
     */
    public function json(array $data): void
    {
        $json = json_encode($data);
        $this->setHeader("Content-type", "application/json");

        if (gettype($json) == "string") {
            $this->write($json);
        }
    }

    /**
     * Send content to http response.
     * @param string $raw
     * @param int $status
     * @return void
     */
    public function send(string $raw, int $status = 200): void {
        $this->status($status)->write($raw);
    }
    abstract public function write(string $raw): void;
}