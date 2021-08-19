<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 */

namespace App\Services\jugador;


use App\Core\CrudService;
use App\Repositories\jugador\jugadorRepository;

/** @property jugadorRepository $repository */
class jugadorService extends CrudService
{

    protected $name = "jugador";
    protected $namePlural = "jugadors";

    public function __construct(jugadorRepository $repository)
    {
        parent::__construct($repository);
    }

}