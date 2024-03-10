<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\User;
use Ramsey\Uuid\Uuid;

class UserRepository
{
    public function create(array $data): User
    {
        return User::firstOrCreate([
            'email' => $data['email'],
        ], [
            'id' => Uuid::uuid4(),
            'name' => $data['name'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        ]);
    }

    public function find(string $id): User
    {
        return User::findOrFail($id);
    }
}
