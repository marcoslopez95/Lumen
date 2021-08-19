<?php

/*
|--------------------------------------------------------------------------
| Application $router->|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Router;

/*
* ALL THE METHODS WITH A _ BEFORE THOSE NAME GOES DIRECTLY TO REPOSITORY THROUGH TATUCO METHODS
* TODOS LOS METODOS CON UN _ EN EL PREFIJO DEL NOMBRE VAN DIRECTAMENTE AL REPOSITORIO POR MEDIO DE LOS METODOS DE TATUCO
*/

$router->group(['prefix' => 'api'], function (Router $router) {

    $router->get('/', function () use ($router) {

        return response()->json([
            "version"=> $router->app->version(),
            "time"   => Carbon::now()->toDateTime(),
            "php"    =>  phpversion()
        ]);
    });

    /*
     *routes with report prefix
     * rutas con el prefijo report
    */
    $router->group(['prefix' => 'report'], function () use ($router) {
        $router->post('/automatic', 'ReportController@automatic');

    });



    $router->group(['middleware' => ['auth']],function () use ($router) {
        
        $router->group(['middleware' => ['authorize']],function () use ($router) {

            $router->group(['namespace' => '\Rap2hpoutre\LaravelLogViewer'], function() use ($router){
                $router->get('logs', 'LogViewerController@index');
            });
        });
    });

 
/** routes para jugador **/ 
 
$router->get('jugadors', 'jugador\jugadorController@_index');
$router->get('jugadors/{id}', 'jugador\jugadorController@_show');
$router->post('jugadors', 'jugador\jugadorController@_store');
$router->put('jugadors/{id}', 'jugador\jugadorController@_update');
$router->delete('jugadors/{id}', 'jugador\jugadorController@_destroy');

/** routes para juego **/ 
 
$router->get('juegos', 'juego\juegoController@_index');
$router->get('juegos/{id}', 'juego\juegoController@_show');
$router->post('juegos', 'juego\juegoController@_store');
$router->put('juegos/{id}', 'juego\juegoController@_update');
$router->delete('juegos/{id}', 'juego\juegoController@_destroy');

});

 
/** routes para Asosiation **/ 
 
$router->get('asosiations', 'Asosiation\AsosiationController@_index');
$router->get('asosiations/{id}', 'Asosiation\AsosiationController@_show');
$router->post('asosiations', 'Asosiation\AsosiationController@_store');
$router->put('asosiations/{id}', 'Asosiation\AsosiationController@_update');
$router->delete('asosiations/{id}', 'Asosiation\AsosiationController@_destroy');
 
