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
//Register
$router->post('/register/pembeli','RegisterController@pembeli');
//Login
//$router->post('/login/admin','LoginController@loginAdmin');
$router->post('/login/pembeli','LoginController@loginPembeli');
//$router->post('/login/grosir','LoginController@loginGrosir');

//Logout
$router->get('/logout/pembeli','PembeliController@logout');

//Grosir
//$router->get('/grosir','GrosirController@showAll');
//$router->post('/grosir','GrosirController@store');
//$router->delete('/grosir','GrosirController@remove');
//$router->put('/grosir','GrosirController@update');

//Pembeli
$router->get('/pembeli','PembeliController@index');
$router->get('/pembeli/barang','PembeliController@showAllBarang');
//$router->get('/pembeli','PembeliController@showAll');
//$router->post('/pembeli','PembeliController@store');
//$router->delete('/pembeli','PembeliController@remove');
//$router->put('/pembeli','PembeliController@update');

//Barang
//$router->get('/barang','BarangController@showAll');
//$router->post('/barang','BarangController@store');
//$router->delete('/barang','BarangController@remove');
//$router->put('/barang','BarangController@update');

//Admin
//$router->get('/admin','AdminController@showAll');
//$router->post('/admin','AdminController@store');
//$router->delete('/admin','AdminController@remove');
//$router->put('/admin','AdminController@update');



$router->get('/', function () use ($router) {
    return "Hello calon pemilik hati q :)";
});
