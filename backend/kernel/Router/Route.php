<?php 

namespace Kernel\Router;

class Route
{
    public function __construct(
        private string $method,
        private string $uri,
        private array $action,
    ) {
    }
    
    public static function get(string $uri, array $action): static
    {
        return new static('GET', $uri, $action);
    }

    public static function post(string $uri, array $action): static
    {
        return new static('POST', $uri, $action);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getAction(): array
    {
        return $this->action;
    }
}