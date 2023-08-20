<?php

namespace Zoolora\Http\Abstract;
abstract class AbstractRequest {
    public string $method;
    public string $ip;
    /**
     * @var array<string, string>
     */
    public array $headers;
    /**
     * @var array<string, string>
     */
    public array $cookies;
    public string $user_agent;
    public string $request_uri;
    /**
     * @var array<string, string>
     */
    public array $body;
    /**
     * @var array<string, string>
     */
    public array $query;
    public string $hostname;
    public string $protocol;

    /**
     * Create http request object.
     * @param string $method
     * @param string $ip
     * @param array<string, string> $query
     * @param array<string> $headers
     * @param array<string, string> $body
     * @param array<string, string> $cookies
     * @param string $request_uri
     * @param string $hostname
     * @param string $protocol
     * @param string $user_agent
     */
    public function __construct(
        string $method,
        string $ip,
        array $query,
        array $headers,
        array $body,
        array $cookies,
        string $request_uri,
        string $hostname,
        string $protocol,
        string $user_agent,
    ) {
        $this->method = $method;
        $this->ip = $ip;
        $this->query = $query;
        $this->headers = $headers;
        $this->body = $body;
        $this->cookies = $cookies;
        $this->request_uri = $request_uri;
        $this->hostname = $hostname;
        $this->protocol = $protocol;
        $this->user_agent = $user_agent;
    }

}
