<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class jugador extends CrudModel
{
    protected $guarded = ['id'];
}