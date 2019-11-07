<?php

namespace Fozzy\WinVPS\Api;

interface RequestCreatorInterface
{
    public function createRequest(string $method, string $url, array $headers, $httpBody): object;
}
