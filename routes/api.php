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

    /** routes para Brand **/ 
 
$router->get('brands', 'Brand\BrandController@_index');
$router->get('brands/{id}', 'Brand\BrandController@_show');
$router->post('brands', 'Brand\BrandController@_store');
$router->put('brands/{id}', 'Brand\BrandController@_update');
$router->delete('brands/{id}', 'Brand\BrandController@_delete');

$router->get('brands/find/{brand}', 'Brand\BrandController@findBrand');
 
/** routes para Exemplar (Model)**/
 
$router->get('exemplars', 'Exemplar\ExemplarController@_index');
$router->get('exemplars/{id}', 'Exemplar\ExemplarController@_show');
$router->post('exemplars', 'Exemplar\ExemplarController@_store');
$router->put('exemplars/{id}', 'Exemplar\ExemplarController@_update');
$router->delete('exemplars/{id}', 'Exemplar\ExemplarController@_delete');

$router->get('exemplars/find/{exemplar}','Exemplar\ExemplarController@findExemplar');
 
/** routes para Type **/ 
 
$router->get('types', 'Type\TypeController@_index');
$router->get('types/{id}', 'Type\TypeController@_show');
$router->post('types', 'Type\TypeController@_store');
$router->put('types/{id}', 'Type\TypeController@_update');
$router->delete('types/{id}', 'Type\TypeController@_delete');

$router->get('types/find/{type}', 'Type\TypeController@findType');
 
/** routes para Color **/ 
 
$router->get('colors', 'Color\ColorController@_index');
$router->get('colors/{id}', 'Color\ColorController@_show');
$router->post('colors', 'Color\ColorController@_store');
$router->put('colors/{id}', 'Color\ColorController@_update');
$router->delete('colors/{id}', 'Color\ColorController@_delete');

$router->get('colors/find/{color}', 'Color\ColorController@findColor');
 
/** routes para Tag **/ 
 
$router->get('tags', 'Tag\TagController@_index');
$router->get('tags/{id}', 'Tag\TagController@_show');
$router->post('tags', 'Tag\TagController@_store');
$router->put('tags/{id}', 'Tag\TagController@_update');
$router->delete('tags/{id}', 'Tag\TagController@_delete');

$router->get('tags/find/{tag}', 'Tag\TagController@findTag');
$router->get('tags/notUsed', 'Tag\TagController@tagsNotUsed');
 
/** routes para Container **/ 
 
$router->get('containers', 'Container\ContainerController@_index');
$router->get('containers/{id}', 'Container\ContainerController@_show');
$router->post('containers', 'Container\ContainerController@_store');
$router->put('containers/{id}', 'Container\ContainerController@_update');
$router->delete('containers/{id}', 'Container\ContainerController@_delete');

$router->get('containers/find/{numid}', 'Container\ContainerController@findContainer');
 
/** routes para Vehicle **/ 
 
$router->get('vehicles', 'Vehicle\VehicleController@_index');
$router->get('vehicles/{id}', 'Vehicle\VehicleController@_show');
$router->post('vehicles', 'Vehicle\VehicleController@_store');
$router->put('vehicles/{id}', 'Vehicle\VehicleController@_update');
$router->delete('vehicles/{id}', 'Vehicle\VehicleController@_delete');

$router->get('vehicles/find/{plate}', 'Vehicle\VehicleController@findVehicle');

/** routes para Place **/ 
 
$router->get('places', 'Place\PlaceController@_index');
$router->get('places/{id}', 'Place\PlaceController@_show');
$router->post('places', 'Place\PlaceController@_store');
$router->put('places/{id}', 'Place\PlaceController@_update');
$router->delete('places/{id}', 'Place\PlaceController@_delete');

/** routes para Route **/ 
 
$router->get('routes', 'Route\RouteController@_index');
$router->get('routes/{id}', 'Route\RouteController@_show');
$router->post('routes', 'Route\RouteController@_store');
$router->put('routes/{id}', 'Route\RouteController@_update');
$router->delete('routes/{id}', 'Route\RouteController@_delete');    
});

 
/** routes para Asosiation **/ 
 
$router->get('asosiations', 'Asosiation\AsosiationController@_index');
$router->get('asosiations/{id}', 'Asosiation\AsosiationController@_show');
$router->post('asosiations', 'Asosiation\AsosiationController@_store');
$router->put('asosiations/{id}', 'Asosiation\AsosiationController@_update');
$router->delete('asosiations/{id}', 'Asosiation\AsosiationController@_destroy');
 
/** routes para jugador **/ 
 
$router->get('jugadors', 'jugador\jugadorController@_index');
$router->get('jugadors/{id}', 'jugador\jugadorController@_show');
$router->post('jugadors', 'jugador\jugadorController@_store');
$router->put('jugadors/{id}', 'jugador\jugadorController@_update');
$router->delete('jugadors/{id}', 'jugador\jugadorController@_destroy');
