<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Ramsey\Uuid\Uuid;

class UserController extends AbstractController
{
    #[Inject]
    protected User $user;

    public function show(string $id)
    {
        return $this->user->findOrFail($id);
    }

    public function store(RequestInterface $request)
    {
        $data = $request->all();
        $data['id'] = Uuid::uuid4();
        return $this->user->create($data);
    }
}
