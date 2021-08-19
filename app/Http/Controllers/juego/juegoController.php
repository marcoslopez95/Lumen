<?php

namespace App\Http\Controllers\juego;

use Illuminate\Http\Request;
use App\Core\CrudController;
use App\Services\juego\juegoService;
/** @property juegoService $service */
class juegoController extends CrudController
{
    public function __construct(juegoService $service)
    {
        parent::__construct($service);
    }
}