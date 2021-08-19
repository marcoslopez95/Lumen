<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 */

namespace App\Services\jugador;


use App\Core\CrudService;
use App\Models\jugador;
use App\Repositories\jugador\jugadorRepository;
use Illuminate\Http\Request;

/** @property jugadorRepository $repository */
class jugadorService extends CrudService
{

    protected $name = "jugador";
    protected $namePlural = "jugadors";

    public function __construct(jugadorRepository $repository){
        parent::__construct($repository);
    }

    public function _store(Request $request){        
        if($request->has(['nombre','email'])){
            $jugador = new jugador;

            $jugador->nombre = $request->input('nombre');
            $jugador->email = $request->input('email');
            $jugador->save();

            return response()->json([
                "status"=>"Registrado Correctamente",
                "datos"=>$jugador,
            ]);
        }else{
            return response()->json([
                "status"=>"Datos no encontrados"
            ]);
        }
    }

    public function _update($id, Request $request){
        $jugador = jugador::find($id);

        if(isset($jugador)){
            if($request->has('nombre')){
                $jugador->nombre = $request->input('nombre');
            }
            if($request->has('email')){
                $jugador->email = $request->input('email');
            }
            $jugador->save();
            return response()->json([
                "status"=>"Datos Actualizados",
                "datos"=>$jugador,
            ]);
        }else{
            return response()->json([
                "status"=>"Jugador no encontrado"
            ]);
        }
        
    }

    public function _destroy($id, Request $request, $name_pk = 'deleted'){
        $jugador = jugador::find($id);

        if(isset($jugador)){
            $jugador->delete();
            return response()->json([
                "status"=>"Jugador Eliminado"
            ]);
        }else{
            return response()->json([
                "status"=>"Jugador no encontrado"
            ]);
        }
    }

}