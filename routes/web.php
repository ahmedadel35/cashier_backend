<?php

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

$router->get('/all', 'TypeController@index');

// type routes
$router->post('/type', 'TypeController@store');
$router->put('/type/{id}', 'TypeController@update');
$router->delete('/type/{id}', 'TypeController@destroy');

// brand routes
$router->post('/type/{id}', 'BrandController@store');
$router->put('/brand/{id}', 'BrandController@update');
$router->delete('/brand/{id}', 'BrandController@destroy');
