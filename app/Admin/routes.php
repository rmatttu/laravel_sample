<?php

use Illuminate\Routing\Router;
use App\Http\Controllers\Api\TagApiController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('images', ImageController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('tags', TagController::class);

    $router->get('/api/tags', [TagApiController::class, 'getTags']);
});
