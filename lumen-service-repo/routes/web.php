<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    
    // $router->group(['middleware' => ['auth', 'cors']], function() use ($router) {
        
    $router->group([], function() use ($router) {
        $router->get('students', ['uses' => 'StudentController@index']);
        $router->get('students/{id}', ['uses' => 'StudentController@show']);
        $router->post('students', ['uses' => 'StudentController@store']);
        $router->delete('students/{id}', ['uses' => 'StudentController@destroy']);
        $router->patch('students/{id}', ['uses' => 'StudentController@update']);
        $router->get('logout', ['uses' => 'Auth\AuthController@logout']);
    });

    $router->group(['prefix' => 'auth'], function () use ($router) {
        Route::post('register', ['uses' => 'Auth\RegisterController@store']);
    });
});


// Route::middleware('auth:api')->group(function () {
//     Route::resource('students', StudentController::class);
//     Route::get('logout', [AuthController::class, 'logout'])->name('login.logout');
// });

// Route::prefix('auth')->group(function () {
//     Route::post('register', [RegisterController::class, 'store'])->name('register.store');
//     Route::post('login', [AuthController::class, 'login'])->name('login.login');
// });