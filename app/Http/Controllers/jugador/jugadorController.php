<?php

namespace App\Http\Controllers\jugador;

use Illuminate\Http\Request;
use App\Core\CrudController;
use App\Services\jugador\jugadorService;
/** @property jugadorService $service */
class jugadorController extends CrudController
{
    public function __construct(jugadorService $service)
    {
        parent::__construct($service);
    }
}