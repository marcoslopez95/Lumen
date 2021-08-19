<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 */

namespace App\Services\juego;


use App\Core\CrudService;
use App\Models\juego;
use App\Models\jugador;
use App\Repositories\juego\juegoRepository;
use Illuminate\Http\Request;

/** @property juegoRepository $repository */
class juegoService extends CrudService
{

    protected $name = "juego";
    protected $namePlural = "juegos";

    public function __construct(juegoRepository $repository)
    {
        parent::__construct($repository);
    }

    public function _store(Request $request){
        if($request->has(['jugador_id','nombre','descripcion'])){
            
            $jugador = jugador::find($request->jugador_id);
            $juego = new juego;

            $juego->nombre = $request->input('nombre');
            $juego->descripcion = $request->input('descripcion');
            $jugador->juegos()->save($juego);

            return response()->json([
                "status"=>"Jugada Registrada Correctamente",
                "datos"=>$jugador->juegos()->get(),
            ]);
        }else{
            return response()->json([
                "status"=>"Datos no encontrados"
            ]);
        }
    }
}