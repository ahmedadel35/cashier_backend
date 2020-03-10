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

$router->get('/api/all', 'TypeController@index');

// type routes
$router->post('/api/type', 'TypeController@store');
$router->put('/api/type/{id}', 'TypeController@update');
$router->delete('/api/type/{id}', 'TypeController@destroy');

// brand routes
$router->post('/api/type/{id}', 'BrandController@store');
$router->put('/api/brand/{id}', 'BrandController@update');
$router->delete('/api/brand/{id}', 'BrandController@destroy');

// bill routes
// $router->get('/api/bill-code', 'BillController@getLastId');
$router->get('/api/bill', 'BillController@index');
$router->post('/api/bill', 'BillController@store');
$router->put('/api/bill/{id}', 'BillController@update');
$router->delete('/api/bill/{id}', 'BillController@destroy');
