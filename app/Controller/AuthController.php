<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\AuthService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;

class AuthController extends AbstractController
{
    #[Inject]
    protected AuthService $authService;

    public function auth(RequestInterface $request): array
    {
        return $this->authService->auth($request->all());
    }
}
