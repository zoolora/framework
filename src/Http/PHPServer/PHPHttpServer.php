<?php

namespace Zoolora\Http\PHPServer;

use Zoolora\Application\App;
use Zoolora\Http\Request;

class PHPHttpServer extends App
{
    /**
     * Run php http server.
     * @return void
     */
    public function run(): void
    {
        // Request: Zoolora\Http\Request.
        $this->container->set(Request::class, new Request(
            method: $_SERVER["REQUEST_METHOD"],
            ip: $_SERVER["REMOTE_ADDR"],
            query: $_GET,
            headers: headers_list(),
            body: $_POST,
            cookies: $_COOKIE,
            request_uri: $_SERVER["REQUEST_URI"],
            hostname: $_SERVER["HTTP_HOST"],
            protocol: $_SERVER["SERVER_PROTOCOL"],
            user_agent: $_SERVER["HTTP_USER_AGENT"]
        ));

        $this->container->set(Response::class, new Response());
    }
}
