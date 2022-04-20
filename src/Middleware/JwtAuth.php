<?php

namespace App\Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

namespace App\Middleware;

use Cake\Http\Cookie\Cookie;
use Cake\I18n\Time;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;

class JwtAuthMiddleware implements MiddlewareInterface
{
    use \Cake\Log\LogTrait;

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface
    {
        // Calling $handler->handle() delegates control to the *next* middleware
        // In your application's queue.
        $response = $handler->handle($request);

        $key = "secret";
        $token = $request->getHeader;
        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        return $response;
    }

    public function __invoke($request, $response, $next)
    {
        $key = "secret";
        $token = $request->getHeader;
        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        $response = $next($request, $response);
        return $response;
    }
}