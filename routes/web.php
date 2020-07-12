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
$router->get('/grosir','GrosirController@showAll');
$router->post('/grosir','GrosirController@store');
$router->delete('/grosir','GrosirController@remove');
$router->put('/grosir','GrosirController@update');

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});
