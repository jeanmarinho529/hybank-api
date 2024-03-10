<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;

class UserController extends AbstractController
{
    #[Inject]
    protected UserRepository $userRepository;

    public function show(string $id)
    {
        return $this->userRepository->find($id);
    }

    public function store(RequestInterface $request)
    {
        return $this->userRepository->create($request->all());
    }
}
