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


$router->group(['prefix'=>'api'], function() use ($router){

    $router->get('/unidades', 'UnidadeController@index');
    $router->get('/propostas', 'PropostaController@index');
    $router->get('/propostas/totalPorUnidade', 'PropostaController@getTotalPorUnidade');
    $router->get('/propostas/contratadasMes', 'PropostaController@getContratadasMes');
    $router->get('/propostas/{unidadeId}', 'PropostaController@getPropostasUnidade');
    $router->get('/propostas/{unidadeId}/total', 'PropostaController@getTotalUnidade');
    $router->get('/{unidadeId}/propostas', 'UnidadeController@getPropostasUnidade');
    
});