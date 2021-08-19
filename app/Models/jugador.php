<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class jugador extends CrudModel
{
    protected $table = 'jugador';
    protected $guarded = ['id'];

    protected $fillable = [
        'id',
        'nombre',
        'email',
    ];

    public function juegos(){
        return $this->hasMany('App\Models\juego', 'jugador_id', 'id');
    }
}