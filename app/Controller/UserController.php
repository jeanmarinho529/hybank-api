<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use App\Request\UserRequest;
use Hyperf\Di\Annotation\Inject;
use Ramsey\Uuid\Uuid;

class UserController extends AbstractController
{
    #[Inject]
    protected User $user;

    public function show(string $id): User
    {
        return $this->user->findOrFail($id);
    }

    public function store(UserRequest $request): User
    {
        $data = $request->validated();
        $data['id'] = Uuid::uuid4();
        return $this->user->create($data);
    }
}
