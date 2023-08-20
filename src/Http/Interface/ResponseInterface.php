<?php

namespace Zoolora\Http\Interface;

interface ResponseInterface
{
    /**
     * Set header http response.
     * @param string $id
     * @param string $value
     * @return ResponseInterface
     */
    public function setHeader(string $id, string $value): ResponseInterface;

    /**
     * @param array<string, string> $headers
     * @return ResponseInterface
     */
    public function setHeaders(array $headers): ResponseInterface;

    /**
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
    public function setCookie(string $key, string $value = "", int $expire = 0, string $path = "/", string $domain = "", bool $secure = false, bool $httponly = false, string $same_site = "", string $priority = ""): ResponseInterface;

    public function status(int $status): ResponseInterface;

    public function redirect(string $url, int $status = 300): void;

    /**
     * @param array<string, string> $data
     * @return void
     */
    public function json(array $data): void;

    public function write(string $raw): void;
    public function send(string $raw, int $status = 200): void;
}
