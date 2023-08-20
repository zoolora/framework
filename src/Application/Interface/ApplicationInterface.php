<?php

namespace Zoolora\Application\Interface;

use DI\Container;

interface ApplicationInterface {
    public function __construct(Container $container);
    public function run(): void;
}
