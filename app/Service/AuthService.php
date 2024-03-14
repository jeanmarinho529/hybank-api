<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\User;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use stdClass;

use function Hyperf\Support\env;

class AuthService
{
    /**
     * @throws Exception
     */
    public function auth(array $request): array
    {
        $user = User::where('email', $request['email'])->first();

        if (! $user || ! password_verify($request['password'], $user->password)) {
            throw new Exception('Unauthorized', 401);
        }

        $tokenPayload = [
            'uuid' => $user->id,
            'email' => $user->email,
            'iat' => time(),
            'exp' => time() + (24 * 3600),
        ];
        $token = JWT::encode($tokenPayload, env('JWT_SECRET_KEY'), 'HS256');

        return ['user' => $user->toArray(), 'token' => $token];
    }

    public function validateToken(string $token): stdClass
    {
        $token = str_replace('Bearer ', '', $token);
        return JWT::decode($token, new Key(env('JWT_SECRET_KEY'), 'HS256'));
    }
}
