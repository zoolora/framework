<?php

namespace Zoolora\Application;

use DI\Container;
use Zoolora\Application\Interface\ApplicationInterface;

abstract class App implements ApplicationInterface {
    public int $port;

    /**
     * Create a Zoolora application.
     * @param Container $container
     */
    public function __construct(protected Container $container) {}

    /**
     * Set port application.
     * @param int $port
     * @return $this
     */
    public function listen(int $port): App {
        $this->port = $port;

        return $this;
    }

    /**
     * Run application.
     * @return void
     */
    abstract public function run(): void;
}