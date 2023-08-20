<?php

namespace Zoolora\Http;
use ArrayAccess;
use Zoolora\Http\Abstract\AbstractRequest;
use Zoolora\Http\Interface\RequestInterface;

/**
 * @implements ArrayAccess<string, string>
 */
class Request extends AbstractRequest implements RequestInterface, ArrayAccess {

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->body[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->body[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        // Nothing to do.
    }

    public function offsetUnset(mixed $offset): void
    {
        // Nothing to do.
    }

    public function all(): array
    {
        return $this->body;
    }
}
