<?php namespace Blog\Api;

use Blog\Api\Http\Controllers\CategoryController;
use Blog\Api\Http\Controllers\PostController;
use Blog\Api\Http\Middleware\ExceptionsMiddleware;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Route;

Route::group([
    'prefix' => 'api/v1',
    'middleware' => [ExceptionsMiddleware::class, SubstituteBindings::class]],
    function () {
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('categories.posts', PostController::class)->shallow();
        Route::apiResource('posts', PostController::class);
});
