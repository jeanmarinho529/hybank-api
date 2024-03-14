<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Service\AuthService;
use Exception;
use Hyperf\HttpServer\Contract\RequestInterface;

class AuthMiddleware
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly AuthService $authService
    ) {
    }

    /**
     * @throws Exception
     */
    public function process(mixed $request, mixed $handler)
    {
        $token = $this->request->getHeader('Authorization');

        try {
            $this->authService->validateToken($token[0]);
        } catch (Exception) {
            throw new Exception('Unauthorized', 401);
        }

        return $handler->handle($request);
    }
}
