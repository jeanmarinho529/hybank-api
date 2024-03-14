<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Repository;

use App\Model\User;
use Ramsey\Uuid\Uuid;

class UserRepository
{
    public function create(array $data)
    {
        $data['id'] = Uuid::uuid4();
        return User::create($data);
    }

    public function find(string $id): User
    {
        return User::findOrFail($id);
    }
}
