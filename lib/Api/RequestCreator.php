<?php

namespace Fozzy\WinVPS\Api;

use GuzzleHttp\Psr7\Request as PsrRequest;

class RequestCreator implements RequestCreatorInterface
{
    public function createRequest(string $method, string $url, array $headers, $httpBody): object
    {
        return new PsrRequest(
            $method,
            $url,
            $headers,
            $httpBody
        );
    }
}
