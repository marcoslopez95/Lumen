<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 */

namespace App\Repositories\jugador;

use App\Core\CrudRepository;
use App\Models\jugador;

/** @property jugador $model */
class jugadorRepository extends CrudRepository
{

    public function __construct(jugador $model)
    {
        parent::__construct($model);
    }

}