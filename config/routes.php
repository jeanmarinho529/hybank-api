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
use App\Controller\AuthController;
use App\Controller\UserController;
use App\Middleware\AuthMiddleware;
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::addGroup('/api/v1', function () {
    Router::post('/auth', [AuthController::class, 'auth']);

    Router::post('/users', [UserController::class, 'store']);
});

Router::addGroup('/api/v1', function () {
    Router::get('/users/{id}', [UserController::class, 'show']);
}, ['middleware' => [AuthMiddleware::class]]);
