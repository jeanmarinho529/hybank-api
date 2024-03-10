<?php

declare(strict_types=1);

namespace App\Model;

use Carbon\Carbon;
use Hyperf\DbConnection\Model\Model;

/**
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property ?string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Model
{
    public string $keyType = 'string';

    public bool $incrementing = false;

    protected ?string $table = 'users';

    protected array $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    protected array $hidden = [
        'password',
        'remember_token',
    ];
}
