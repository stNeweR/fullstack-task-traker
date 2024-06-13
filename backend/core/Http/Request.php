<?php 

namespace Core\Http;

class Request 
{
    public function __construct(
        private readonly array $getParams,
        private readonly array $postData,
        private readonly array $cokkies,
        private readonly array $files,
        private readonly array $server,
    ){
    }

    public static function createGlobals(): static
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    public function getParams(): array
    {
        return $this->getParams;
    }

    public function getPostData(): array
    {
        return $this->postData;
    }

    public function getCookies(): array
    {
        return $this->cokkies;
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function getServerValue(string $value)
    {
        return $this->server[strtoupper($value)];
    }
}