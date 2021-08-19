<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class juego extends CrudModel
{
    protected $table = 'juego';
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'jugador_id',
        'nombre',
        'descripcion',
    ];
 
    public function jugador(){
        return $this->belongsTo('App\Models\jugador', 'id', 'jugador_id');
    }

}