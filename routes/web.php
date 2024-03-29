<?php
use Illuminate\Support\Str;

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
    return $router->app->version() . "<br>"." Key_app => " . Str::random(32);
});

$router->get('/post', 'TodoController@index');
$router->get('/post/{id}', 'TodoController@show');
$router->post('/post/store', 'TodoController@store');
$router->put('/post/update/{id}', 'TodoController@update');
$router->delete('/post/delete/{id}', 'TodoController@destroy');

$router->get('getInformation', 'InformationController@index');
$router->post('getInformation/store', 'InformationController@store');
$router->delete('getInformation/destroy/{id}', 'InformationController@destroy');
$router->delete('getInformation/deleteAll', 'InformationController@deleteAll');

$router->get('getInformation/portofolio', 'InformationController@getPortofolio');