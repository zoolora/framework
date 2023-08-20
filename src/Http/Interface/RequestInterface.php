<?php

namespace Zoolora\Http\Interface;

interface RequestInterface {
    /**
     * All body request parameters.s
     * @return array<string, string>
     */
    public function all(): array;


}
